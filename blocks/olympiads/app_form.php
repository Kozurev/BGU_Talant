<?
/**
* Created by PhpStorm.
*
* @author: Bad Wolf
* @date 24.10.2018 13:30
*/

require_once "../../config.php";
global $PAGE, $CFG, $USER, $OUTPUT, $DB;
require_once $CFG->libdir . "/custom/autoload.php";

require_login();

$action = Core_Array::Post( "action", null );


/**
 * Обработчик сохранения формы
 */
if( $action === "save_app_data" )
{
    $applicationId = Core_Array::Post( "id", 0 );
    $Application = Core::factory( "Olympiad_Application", $applicationId );

    unset( $_POST["id"] );
    unset( $_POST["agreement"] );
    unset( $_POST["correct"] );
    unset( $_POST["action"] );

    foreach ( $_POST as $field => $value )
    {
        if( $value == "" )  continue;
        $setterName = $Application->PropTo( $field, Olympiad_Application::SETTER );
        $Application->$setterName( $value );
    }

    $Application->save();

    $User = Core::factory( "User" )->getCurrent();
    $User->courseSubscribe( $Application->getOlympiadId(), 5 );

    header( "Location: " . $CFG->wwwroot . "/my/" );
    exit;
}


/**
 * Форса создания/редактирования заявки
 */

$olympiadId = Core_Array::Get( "olid", null );

if( $olympiadId === null )
{
    $PAGE->set_title( "Ошибка" );
    echo $OUTPUT->header() . "Отсутствует обязательный GET-параметр 'olid'" . $OUTPUT->footer();
}

if( $DB->get_record( "course", ["id" => $olympiadId] ) == false )
{
    $PAGE->set_title( "Ошибка" );
    echo $OUTPUT->header() . "Олимпиады с id <b>$olympiadId</b> не существует" . $OUTPUT->footer();
}


$output = Core::factory( "Core_Entity" );

$User = Core::factory( "User" )->getCurrent();

$Application = Core::factory( "Olympiad_Application" )
    ->queryBuilder()
    ->where( "user_id", "=", $User->getId() )
    ->where( "olympiad_id", "=", $olympiadId )
    ->find();

$PAGE->set_url('/blocks/olympiads/app_form.php' );
$PAGE->set_pagelayout('standard');
$PAGE->set_cacheable(false);
$context = context_user::instance( $USER->id );
$PAGE->set_context( $context );
$PAGE->set_title( "Заявка на участие" );
echo $OUTPUT->header();

if( $Application !== false )
    $output->addEntity( $Application, "app" );

$output
    ->addSimpleEntity( "olid", $olympiadId )
    ->addSimpleEntity( "user_id", $User->getId() )
    ->xsl( "forms/olympiad_application.xsl" )
    ->show();

echo $OUTPUT->footer();