<?php
/**
 * Файл для обработки AJAX-запросов
 * тут собраны обработчики для формирования форм редактирования и сохранения данных программ/уровней
 *
 * @author Bad Wolf
 * @date 12.09.2018 11:13
 */

require_once "../../config.php";
global $CFG;
require_once $CFG->libdir . "/custom/autoload.php";

$action = Core_Array::getRequest( "action", null );



if( $action === "level_edit" )
{
    $id = Core_Array::getRequest( "id", 0 );
    $Level = Core::factory( "Level", $id );


    $aEntities = Level::getEntities();
    $aoEntities = [];

    foreach ( $aEntities as $id => $title )
    {
        $LevelEntity = new stdClass();
        $LevelEntity->id = $id;
        $LevelEntity->title = $title;
        $aoEntities[] = $LevelEntity;
    }


    Core::factory( "Core_Entity" )
        ->addEntity( $Level )
        ->addEntities( $aoEntities, "entity" )
        ->xsl( "forms/admin/level_edit.xsl" )
        ->show();

    exit;
}


if( $action === "level_save" )
{
    $id = Core_Array::Post( "id", 0 );
    $Level = Core::factory( "Level", $id );

    /**
     * Костыль для исправления ошибки кодировки передачи русских символов из формы enctype="multipart/form-data"
     */
    $recodeTitle = iconv( "utf-8", "ISO-8859-1", $_POST["title"] );
    //$recodeTitle = Core_Array::Post( 'title', '' );

    $Level
        ->setTitle( $recodeTitle )
        ->setEntityId( Core_Array::Post( "entity_id", 0 ) );

    $LogoFile = Core::factory( "File", $Level->getLogoId() )
        ->setPublic( 1 )
        ->setFileTypeId( 6 )    //type_id = 6 - изображение
        ->upload( "logo" );

    if( $LogoFile->getId() )
    {
        $Level->setLogoId( $LogoFile->getId() );
    }

    $Level->save();
    exit;
    //header( "Location: " . $CFG->wwwroot . "/my/" );
}


if( $action === "program_edit" )
{
    $id = Core_Array::getRequest( "id", 0 );

    if( $id !== 0 ) $Program = Core::factory( "Program", $id );
    else            $Program = Core::factory( "Program" );

    $Types = Core::factory( "Program_Type" )->findAll();
    $Forms = Core::factory( "Program_Form" )->findAll();

    //Уровни программ
    Core::factory( "Level" );
    $Levels = Level::getLevelsList( Level::LVL_PROGRAM );

    //Курсы
    $Courses = Core::factory( "Orm" )
        ->select( ["id", "fullname", "shortname"] )
        ->from( "mdl_course" )
        ->where( "visible", "=", 1 )
        ->where( "category", "=", 2 )
        ->where( "id", "<>", 1 )
        ->orderBy( "sortorder" )
        ->findAll();

    //Связи программы с курсами
    $CourseAssignments = Core::factory( "Program_Course_Assignment" )
        ->queryBuilder()
        ->where( "program_id", "=", $id )
        ->findAll();

    //Периоды
    $Periods = Core::factory( "Program_Period" )
        ->queryBuilder()
        ->where( "program_id", "=", $id )
        ->findAll();

    Core::factory( "Core_Entity" )
        ->addEntity( $Program )
        ->addEntities( $Courses, "course" )
        ->addEntities( $Types )
        ->addEntities( $Forms )
        ->addEntities( $Periods )
        ->addEntities( $Levels, "level" )
        ->addEntities( $CourseAssignments )
        ->xsl( "forms/admin/program_edit.xsl" )
        ->show();

    exit;
    //header( "Location: " . $CFG->wwwroot . "/my/" );
}


if( $action === "program_save" )
{
    /**
     * Сохранение основных данных программы
     */
    $id = Core_Array::Post( "id", null );
    $logo = Core_Array::File( "logo", null );

    /**
     * Костыль для исправления ошибки кодировки передачи русских символов из формы enctype="multipart/form-data"
     */
    $recodeTitle = iconv( "utf-8", "ISO-8859-1", Core_Array::Post( "title", "" ) );
    $recodeDescription = iconv( "utf-8", "ISO-8859-1", Core_Array::Post( "description", "" ) );
    $recodeDocumentType = iconv( "utf-8", "ISO-8859-1", Core_Array::Post( "document_type", "" ) );
    $recodeCode = iconv( "utf-8", "ISO-8859-1", Core_Array::Post( "code", "" ) );

//    $recodeTitle = Core_Array::Post( "title", "" );
//    $recodeDescription = Core_Array::Post( "description", "" );
//    $recodeDocumentType = Core_Array::Post( "document_type", "" );
//    $recodeCode = Core_Array::Post( "code", "" );

    $Program = Core::factory( "Program", $id )
        ->setTitle( $recodeTitle )
        ->setDescription( $recodeDescription )
        ->setHours( Core_Array::Post( "hours", 0 ) )
        ->setDocumentType( $recodeDocumentType )
        ->setCode( $recodeCode )
        ->setPrice( Core_Array::Post( "price", 0 ) )
        ->setTypeId( Core_Array::Post( "type_id", 0 ) )
        ->setFormId( Core_Array::Post( "form_id", 0 ) )
        ->setLevelId( Core_Array::Post( "level_id", 0 ) );

    $Program->save();

    if( $logo["name"] != "" )
    {
        $LogoFile = Core::factory( "File", $Program->getLogoId() )
            ->setProgramId( $Program->getId() )
            ->setFileTypeId( 6 )
            ->setPublic( 1 )
            ->upload( "logo" );

        $Program
            ->setLogoId( $LogoFile->getId() )
            ->save();
    }

    /**
     * Сохранение связей программы с курсами
     */
    $courses = Core_Array::Post( "course", null );

    //Удаление всех предыдущих связей
    if( $courses === null || count( $courses ) == 0 )
    {
        Core::factory( "Orm" )->executeQuery( "DELETE * FROM mdl_Program_Course_Assignment WHERE program_id = " . $id );
    }

    //Очистка переданного массива идентификаторов курсов от нулевых значений и дубликатов
    $newCourses = [];
    foreach ( $courses as $key => $id )
    {
        if( $id == 0 || in_array( $id, $newCourses ) )  continue;
        else $newCourses[] = intval( $id );
    }

    //Список существующих связей
    $assignments = $Program->getCourseAssignments( Program::RETURN_ARR_OBJECT ); //Список существующих связей программы с курсами

    //Поиск удаленных связей модератором и их удаление
    foreach ( $assignments as $assignment )
    {
        if( !in_array( $assignment->getCourseId(), $newCourses ) ) $assignment->delete();
    }

    //Список id курсов из существующих связей
    $assignmentsCoursesIds = [];
    foreach ( $assignments as $assignment ) $assignmentsCoursesIds[] = $assignment->getCourseId();

    //Поиск новых связей и их создание
    foreach ( $newCourses as $id )
    {
        if( !in_array( $id, $assignmentsCoursesIds ) )
            Core::factory( "Program_Course_Assignment" )
                ->setProgramId( $Program->getId() )
                ->setCourseId( $id )
                ->save();
    }


    /**
     * Сохранение периодов проведения программы
     */
    $datesFrom = Core_Array::Post( "date_start", null );
    $datesTo = Core_Array::Post( "date_end", null );
    $visibleFrom = Core_Array::Post( "visible_start", null );
    $visibleTo = Core_Array::Post( "visible_end", null );
    $ids = Core_Array::Post( "period_id", null );

    if( $datesFrom === null )   $countPeriods = 0;
    else $countPeriods = count( $datesFrom );

    //Поиск существующих периодов программы и удаление лишних
    $Periods = $Program->getPeriods( Program::RETURN_ARR_OBJECT );
    foreach ( $Periods as $Period )
    {
        if( !in_array( $Period->getId(), $ids ) )   $Period->delete();
    }

    for( $i = 0; $i < $countPeriods; $i++ )
    {
        $period_id = Core_Array::getValue( $ids, $i, 0 );
        $Period = Core::factory( "Program_Period", $period_id )
            ->setDateStart( Core_Array::getValue( $datesFrom, $i, "" ) )
            ->setDateEnd( Core_Array::getValue( $datesTo, $i, "" ) )
            ->setVisibleStart( Core_Array::getValue( $visibleFrom, $i, "" ) )
            ->setVisibleEnd( Core_Array::getValue( $visibleTo, $i, "" ) )
            ->setProgramId( $Program->getId() );

        $Period->save();
    }

    exit;
}


if( $action === "delete" )
{
    $id =       Core_Array::Get( "id", null );
    $model =    Core_Array::Get( "model_name", null );

    if( $id === null )      die( "Удаление объекта невозможно так как не указан id" );
    if( $model === null )   die( "Кдаление объекта невозможно так как не указано название модели" );

    Core::factory( $model, $id )->delete();

    exit;
}


if( $action === "refresh_block" )
{
    $blockName = Core_Array::Get( "block", null );
    $className = "block_" . $blockName;

    //Обновление содержимого блока
    require_once $CFG->dirroot . "/blocks/$blockName/block_$blockName.php";
    $ProgramsBlock = new $className();
    $blockContent = $ProgramsBlock->get_content();

    if( isset( $blockContent->header ) )echo $blockContent->header;
    if( isset( $blockContent->text ) )  echo $blockContent->text;
    if( isset( $blockContent->footer ) )echo $blockContent->footer;
}