<?php
/**
 * Файл обработчик для экспорта данных тестирования по олимпиадам
 *
 * @author BadWolf
 * @date 27.02.2019 10:07
 */

require_once '../../config.php';
global $CFG, $PAGE, $OUTPUT, $USER, $DB;
require_once $CFG->libdir . '/custom/autoload.php';
require_once $CFG->libdir . '/tablelib.php';
require_once 'block_export.php';
Core::factory( 'Olympiad' );

require_login();

//Доступ только для администраторов
if ( User::current()->getRoleId() != 1 )
{
    redirect( '/my/' );
}

$PAGE->set_url( '/blocks/export/olympiad_test.php' );
$PAGE->set_pagelayout( 'standard' );
$PAGE->set_cacheable( false );
$PAGE->set_context( context_system::instance() );


$olympiadId =   optional_param( 'olid', null, PARAM_INT );
$report_type =  optional_param( 'report_type', null, PARAM_TEXT );

//Возможные значения для GET-параметра report_type
define( 'REPORT_TYPE_HTML', 'html' );
define( 'REPORT_TYPE_EXCEL', 'excel' );

$QueryBuilder = new Orm();


//Страница со списком олимпиад
if ( is_null( $olympiadId ) && is_null( $report_type ) )
{
    $PAGE->set_title( block_export::BLOCK_TITLE_FULL );
    $PAGE->navbar->add( block_export::BLOCK_TITLE_SHORT . ': Олимпиады' );
    echo $OUTPUT->header();

    $Olympiads = Olympiad::getShortList();

    $table = new html_table();
    $table->head = ['Логотип', 'Название', 'Уровень', 'Участники<br><small>(за всё время)</small>', 'Кол-во тестов'];

    foreach ( $Olympiads as $Olympiad )
    {
        $Olympiad->counttests > 0
            ?   $courseTd = '<a href="olympiad_tests.php?olid=' . $Olympiad->id . '">' . $Olympiad->fullname . '</a>'
            :   $courseTd = $Olympiad->fullname;

        $img = '<img src="' . $Olympiad->src . '" alt="' . $Olympiad->shortname . '" width="50" height="50" />';
        $table->data[] = [$img, $courseTd, $Olympiad->level, $Olympiad->countusr, $Olympiad->counttests];
    }

    echo html_writer::table($table);

    echo $OUTPUT->footer();
    exit;
}


//Список тестов для определенной олимпиады
if ( !is_null( $olympiadId ) && is_null( $report_type ) )
{
    $Olympiad = Core::factory( 'Olympiad', $olympiadId );

    $PAGE->set_title( block_export::BLOCK_TITLE_SHORT . ': ' . $Olympiad->shortname );
    $PAGE->navbar->add( block_export::BLOCK_TITLE_SHORT . ': Олимпиады', $CFG->wwwroot . '/blocks/export/olympiad_tests.php' );
    $PAGE->navbar->add( $Olympiad->shortname );
    echo $OUTPUT->header();

    Core::factory( 'Core_Entity' )
        ->addEntity( $Olympiad )
        ->addEntities( $Olympiad->getTests(), 'test' )
        ->addSimpleEntity( 'report-type', REPORT_TYPE_HTML )
        ->xsl( 'tables/export/test_list.xsl' )
        ->show();

    echo $OUTPUT->footer();
    exit;
}


//Формирование отчета
if ( is_null( $olympiadId ) && !is_null( $report_type ) )
{
    $testIds = $_GET['testid'];
    Core::factory( 'Test' );

    foreach ( $testIds as $id )
    {
        $id = intval( $id );
    }

    //Core::factory( 'Olympiad_Application' );
    debug( Test::getReport( $testIds ) );
}