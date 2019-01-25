<?php
/**
 * Раздел с олимпиадами
 *
 * @author: Bad Wolf
 * @date 23.10.2018 15:12
 */

require_once "../../config.php";
global $CFG, $PAGE, $OUTPUT, $USER, $DB;
require_once $CFG->libdir . "/custom/autoload.php";

$olympiadId = Core_Array::Get( "olid", null );  //id олимпиады (курса)
$levelId = Core_Array::Get( "lvlid", null );    //id уровня искомой олимпиады

$User = Core::factory( "User" )->getCurrent();
$roleId = $User->getRoleId();   //id роли текущего авторизованного пользователя из таблицы mdl_role

$PAGE->set_url( '/blocks/programs/' );
$PAGE->set_pagelayout( 'standard' );
//$PAGE->set_pagelayout( 'admin' );
$PAGE->set_cacheable( false );
$PAGE->set_context( context_system::instance() );
$PAGE->navbar->add( "Главная", $CFG->wwwroot . "?redirect=0" );


/**
 * Страница со списком олимпиад
 */
if ( $olympiadId === null && $levelId !== null )
{
    $Level = Core::factory( "Level", $levelId );
    if( $Level === false )  die( "Уровень №" . $levelId . " не существует" );

    $PAGE->navbar->add( STR_OLYMPIADS, $CFG->wwwroot . "/blocks/olympiads/" );
    $PAGE->navbar->add( $Level->getTitle() );
    $PAGE->set_title( "Олимпиады" );
    echo $OUTPUT->header();

    $sql = "SELECT cour.id, shortname, startdate, enddate, logo
            FROM mdl_course as cour
            WHERE cour.category = $CFG->olympiadsCategoryId
              AND (enddate > ". time() ." OR enddate = 0) 
              AND cour.visible = 1 ";


    /**
     * Фильтрация по типу
     */
    if( $levelId != 0 )
    {
        $sql .= "AND level_id = $levelId ";
    }

    $sql .= "ORDER BY startdate";

    try
    {
        $Olympiads = $DB->get_records_sql( $sql );
    }
    catch( dml_exception $e )
    {
        debug($sql);
        die( $e->getMessage() );
    }


    /**
     * Преобразование формата дат начала и конца проведения курса
     */
    foreach ( $Olympiads as $Olympiad )
    {
        $Olympiad->startdate_string = "";
        $Olympiad->enddate_string = "";

        if ( $Olympiad->startdate != 0 )
        {
            $Olympiad->startdate_string = date( "d.m.Y", $Olympiad->startdate );

            if ( date( "H:i", $Olympiad->startdate ) !== "00:00:00" )
            {
                $Olympiad->startdate_string .= " " . date( "H:i", $Olympiad->startdate );
            }
        }

        if ( $Olympiad->enddate != 0 )
        {
            $Olympiad->enddate_string = date( "d.m.Y", $Olympiad->enddate );

            if ( date( "H:i:s", $Olympiad->enddate ) !== "00:00:00" )
            {
                $Olympiad->enddate_string .= " " . date( "H:i", $Olympiad->enddate );
            }
        }


        /**
         * Поиск файла логотипа олимпиады и формирование пути к нему
         * Если такого файла не существует то указывается ссылка на изображение по умолчанию
         */
        $sql = "SELECT * FROM mdl_files WHERE filesize <> 0 and itemid = " . $Olympiad->logo;

        try
        {
            $LogoFile = $DB->get_record_sql( $sql );
        }
        catch( dml_exception $e )
        {
            echo "<br/>По запросу: <b>" . $sql . "</b> не найдено. <br/>";
            debug( $Olympiad );
            echo $e->getMessage();
            exit;
        }

        $LogoFile !== false
            ?   $Olympiad->src = $CFG->wwwroot . "/draftfile.php/5/user/draft/" . $Olympiad->logo . "/" . $LogoFile->filename
            :   $Olympiad->src = $CFG->wwwroot . "/theme/klass/pix/boxes/default.png";
    }

    echo "
        <div id=\"table_content\" align=\"center\">
            <div class=\"s-menu\">";
            foreach ( $Olympiads as $Olympiad )
            {?>
                <div class="box">
                    <a href="<?php echo $CFG->wwwroot; ?>/blocks/olympiads?olid=<?php echo $Olympiad->id; ?>">
                        <img width="260" height="260" src="<?php echo $Olympiad->src?>" />
                        <b><?php echo $Olympiad->shortname; ?></b>
                    </a>
                </div>
            <?php } echo
            "</div>
        </div>
        ";
}


/**
 * Страница с детальной информацией о конкретной олимпиаде
 */
elseif( $olympiadId !== null )
{
    try
    {
        $Olympiad = $DB->get_record( "course", ["id" => $olympiadId] );
    }
    catch( dml_exception $e )
    {
        die( $e->getMessage() );
    }

    if ( $Olympiad === false )
    {
        $PAGE->set_title( "Ошибка" );
        echo $OUTPUT->header();
        echo "<h3>Олимпиады (курса) с идентификаторо <b>$olympiadId</b> не существует</h3>";
        echo $OUTPUT->footer();
        exit;
    }

    $Level = Core::factory( "Level", $Olympiad->level_id );
    if( $Level === false )  die( "Уровень №" . $levelId . " не существует" );

    $PAGE->navbar->add( STR_OLYMPIADS, $CFG->wwwroot . "/blocks/olympiads/" );
    $PAGE->navbar->add( $Level->getTitle(), $CFG->wwwroot . "/blocks/olympiads?lvlid=" . $Level->getId() );
    $PAGE->navbar->add( $Olympiad->shortname );


    /**
     * Проверка на то, не закончился ли период проведения олимпиады
     */
    if( $Olympiad->enddate < time() && $Olympiad->enddate != 0 )
    {
        $PAGE->set_title( "Ошибка" );
        echo $OUTPUT->header();
        echo "<h3>Срок проведения данной олимпиады уже прошел.</h3>";
        echo "<p><a href='". $CFG->wwwroot ."/blocks/olympiads'>Вернуться назад</a></p>";
        echo $OUTPUT->footer();
    }


    /**
     * Поиск файла логотипа олимпиады и формирование пути к нему
     * Если такого файла не существует то указывается ссылка на изображение по умолчанию
     */
    $sql = "SELECT * FROM mdl_files WHERE filesize <> 0 and itemid = " . $Olympiad->logo;

    try
    {
        $LogoFile = $DB->get_record_sql( $sql );
    }
    catch( dml_exception $e )
    {
        echo "<br/>По запросу: <b>" . $sql . "</b> не найдено. <br/>";
        debug( $Olympiad );
        echo $e->getMessage();
        exit;
    }

    $LogoFile !== false
        ?   $src = $CFG->wwwroot . "/draftfile.php/5/user/draft/$Olympiad->logo/$LogoFile->filename"
        :   $src = $CFG->wwwroot . "/theme/klass/pix/boxes/default.png";

    $Olympiad->startdate_string = date( "d.m.Y", $Olympiad->startdate );
    $Olympiad->enddate_string   = date( "d.m.Y", $Olympiad->enddate );
    if ( date( "H:i:s", $Olympiad->startdate ) !== "00:00:00" )  $Olympiad->startdate_string .= " " . date( "H:i", $Olympiad->startdate );
    if ( date( "H:i:s", $Olympiad->enddate ) !== "00:00:00" )    $Olympiad->enddate_string .= " " . date( "H:i", $Olympiad->enddate );

    $PAGE->set_title( $Olympiad->shortname );
    echo $OUTPUT->header();


    /**
     * Из-за странных символов в названиях изображений, которые XSLT шаблонизатор обрабатывает некорректно
     * так что приходится формировать HTML код прямо тут
     */
    ?>
    <div class="olympiad">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <img width="100%" src="<?php echo $src ?>">
            </div>

            <div class="col-md-8 col-sm-12">
                <h2><?php echo  $Olympiad->fullname ?></h2>
                <p>Дата проведения: с <?php echo  $Olympiad->startdate_string ?> по <?php echo  $Olympiad->enddate_string ?></p>
                <?php
                    $context = context_course::instance($Olympiad->id);
                    $Olympiad->summary = file_rewrite_pluginfile_urls( $Olympiad->summary, 'pluginfile.php', $context->id, 'course', 'summary', NULL );
                    echo format_text($Olympiad->summary, $Olympiad->summaryformat);
                ?>
            </div>
        </div>

        <?php if ( $roleId === 5 ) { ?>
            <div class="row right">
                <a href="<?php echo $CFG->wwwroot . '/blocks/olympiads/app_form.php?olid=' . $olympiadId ?>"
                   class="btn btn-primary">Подать заявку</a>
            </div>
        <?php } ?>
    </div>
    <?php
}


/**
 * Страница со списком уровней олимпиады
 */
elseif( $levelId === null )
{
    $PAGE->navbar->add( STR_OLYMPIADS );
    $PAGE->set_title( "Олимпиады: уровни" );
    echo $OUTPUT->header();

    $ProgramsLevels = Core::factory( "Level" )->getLevelsList( Level::LVL_OLYMPIAD );

    Core::factory( "Core_Entity" )
        ->addEntities( $ProgramsLevels )
        ->addSimpleEntity( "href", $CFG->wwwroot . "/blocks/olympiads" )
        ->addSimpleEntity( "wwwroot", $CFG->wwwroot )
        ->xsl( "levels.xsl" )
        ->show();
}

echo $OUTPUT->footer();
