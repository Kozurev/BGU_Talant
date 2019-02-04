<?php
/**
 * Раздел с программами
 *
 * @author Bad Wolf
 * @date 14.09.2018 11:03
 */

require_once "../../config.php";
global $CFG, $PAGE, $OUTPUT, $USER;
require_once $CFG->libdir . "/custom/autoload.php";

$programId = Core_Array::Get( "prid", null );   //id программы
$levelId = Core_Array::Get( "lvlid", null );    //id уровня искомой программы

$PAGE->set_url('/blocks/programs/' );
$PAGE->set_pagelayout( 'standard' );
$PAGE->set_cacheable( false );
$PAGE->set_context( context_system::instance() );


/**
 * Страница со списком программ
 */
if( $programId === null && $levelId !== null )
{
    $Level = Core::factory( "Level", $levelId );
    if( $Level === null )   die( "Уровень №" . $levelId . " не существует" );

    $PAGE->navbar->add( STR_PROGRAMS, $CFG->wwwroot . "/blocks/programs/" );
    $PAGE->navbar->add( $Level->getTitle() );
    $PAGE->set_title( "Программы" );
    echo $OUTPUT->header();

    $Programs = Core::factory( "Program" )->queryBuilder();
    if( $levelId != 0 ) $Programs->where( "level_id", "=", $levelId );
    $Programs = $Programs->findAll();

    Core::factory( "Core_Entity" )
        ->addEntities( $Programs )
        ->addSimpleEntity( "wwwroot", $CFG->wwwroot )
        ->xsl( "program_list.xsl" )
        ->show();
}


/**
 * Страница с детальной информацией о программе
 */
elseif( $programId !== null )
{
    $Program = Core::factory( "Program", $programId );
    if( $Program === null )    die( "Программы с таким идентификатором не существует" );

    $date = date( "Y-m-d" );

    $Periods = Core::factory( "Program_Period" )
        ->queryBuilder()
        ->where( "program_id", "=", $programId )
        ->where( "visible_start", "<=", $date )
        ->where( "visible_end", ">=", $date )
        ->findAll();


    /**
     * Преобразование формата дат проведения проведения программы
     */
    foreach ( $Periods as $Period )
    {
        $Period->setDateStart( date( "d.m.Y", strtotime( $Period->getDateStart() ) ) );
        $Period->setDateEnd( date( "d.m.Y", strtotime( $Period->getDateEnd() ) ) );
    }


    $Level = Core::factory( "Level", $Program->getLevelId() );
    if( $Level === null )  die( "Уровень №" . $Level->getId() . " не существует" );

    $PAGE->navbar->add( STR_PROGRAMS, $CFG->wwwroot . "/blocks/programs/" );
    $PAGE->navbar->add( $Level->getTitle(), $CFG->wwwroot . "/blocks/programs?lvlid=" . $Level->getId() );
    $PAGE->navbar->add( $Program->getTitle() );
    $PAGE->set_title( $Program->getTitle() );
    echo $OUTPUT->header();

    $User = Core::factory( "User" )->getCurrent();

    if( $User === false || $User->getId() == 1 )
    {
        $issetAgreement = 0;
    }
    else
    {
        $issetAgreement = Core::factory( "File" )
            ->queryBuilder()
            ->where( "user_id", "=", $User->getId() )
            ->where( "file_type_id", "=", 1 )
            ->getCount();
    }

    Core::factory( "Core_Entity" )
        ->addSimpleEntity( "wwwroot", $CFG->wwwroot )
        ->addEntity( $Program )
        ->addEntity( $Program->getType() )
        ->addEntity( $Program->getForm() )
        ->addEntities( $Periods )
        ->addSimpleEntity( "isset_agreement", $issetAgreement )
        ->addSimpleEntity( "wwwroot", $CFG->wwwroot )
        ->xsl( "program.xsl" )
        ->show();
}


/**
 * Страница со списком уровней олимпиады
 */
elseif( $levelId === null )
{
    $PAGE->navbar->add( STR_PROGRAMS );
    $PAGE->set_title( "Программы: уровни" );
    echo $OUTPUT->header();

    $ProgramsLevels = Core::factory( "Level" )->getLevelsList( Level::LVL_PROGRAM );

    Core::factory( "Core_Entity" )
        ->addEntities( $ProgramsLevels )
        ->addSimpleEntity( "href", $CFG->wwwroot . "/blocks/programs" )
        ->addSimpleEntity( "wwwroot", $CFG->wwwroot )
        ->xsl( "levels.xsl" )
        ->show();
}




echo $OUTPUT->footer();


