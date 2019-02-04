<?php
/**
* Файл для работы с заявкой на участие в олимпиаде:
* Формированмие формы и создание / редактирование заявки в таблице
*
* @author: Bad Wolf
* @date 24.10.2018 13:30
*/

require_once "../../config.php";
global $PAGE, $CFG, $USER, $OUTPUT, $DB;
require_once $CFG->libdir . "/custom/autoload.php";

//define( "DEFAULT_COUNTRY_ID", 1 );   //По умолчанию загружаются регионы для России

require_login();
$PAGE->set_url('/blocks/olympiads/app_form.php' );
$PAGE->set_pagelayout('standard');
$PAGE->set_cacheable(false);
$context = context_user::instance( $USER->id );
$PAGE->set_context( $context );


$action = Core_Array::getRequest( "action", null );


//Получение списка регионов для страны
if( $action === "get_countries_list" )
{
    $Countries = $DB->get_records( "address_country" );
    echo json_encode( $Countries );
    exit;
}

//Получение списка регионов для страны
if( $action === "get_regions_list" )
{
    $countryId = Core_Array::Get( "country_id", 0 );

    $countryId == 0
        ?   $Regions = $DB->get_records( "address_region" )
        :   $Regions = $DB->get_records( "address_region", ["country_id" => $countryId] );

    echo json_encode( $Regions );
    exit;
}

//Получение списка городов для региона
if( $action === "get_cities_list" )
{
    $regionId = Core_Array::Get( "region_id", 0 );

    $regionId == 0
        ?   $Cities = $DB->get_records( "address_city" )
        :   $Cities = $DB->get_records( "address_city", ["region_id" => $regionId] );

    echo json_encode( $Cities );
    exit;
}


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

    if( $applicationId === 0 )
    {
        $User = Core::factory( "User" )->getCurrent();
        $User->courseSubscribe( $Application->getOlympiadId(), 5 );
    }

    if ( $applicationId === 0 )
    {
        header( 'Location: ' . $CFG->wwwroot . '/blocks/olympiads/intermediate_page.php' );
    }
    else
    {
        header( "Location: " . $CFG->wwwroot . "/my/" );
    }

    exit;
}



/**
 * Форма создания/редактирования заявки
 */
$olympiadId = Core_Array::Get( "olid", null );

if( $olympiadId === null )
{
    $PAGE->set_title( "Ошибка" );
    echo $OUTPUT->header() . "Отсутствует обязательный GET-параметр 'olid'" . $OUTPUT->footer();
}


try
{
    $Course = $DB->get_record( "course", ["id" => $olympiadId] );
}
catch ( dml_exception $e )
{
    die( $e->getMessage() );
}


if( $Course == false )
{
    $PAGE->set_title( "Ошибка" );
    echo $OUTPUT->header() . "Олимпиады с id <b>$olympiadId</b> не существует" . $OUTPUT->footer();
}


$output = Core::factory( "Core_Entity" );   //Объект формирующий HTML код

$User = Core::factory( "User" )->getCurrent();  //Текущий пользователь

$Application = Core::factory( "Olympiad_Application" )  //Существующая заявка
    ->queryBuilder()
    ->where( "user_id", "=", $User->getId() )
    ->where( "olympiad_id", "=", $olympiadId )
    ->find();


$PAGE->set_title( "Заявка на участие" );
echo $OUTPUT->header();

if( $Application === null )
{
        $Application = Core::factory( "Olympiad_Application" )
            ->setSurname( $User->lastname )
            ->setName( $User->firstname )
            ->setPatronymic( $User->patronymic )
            ->setSex( $User->sex )
            ->setEmail( $User->email )
            ->setPhone( $User->phone1 )
            ->setAdditionalPhone( $User->phone2 );
}


try
{
    //Список стран
    $Countries = $DB->get_records( "address_country" );

    //Список регионов для страны по умолчанию (Россия)
    $Regions = [];

    //Список городов для региона
    $Cities = [];

    if( $Application->getId() != 0 )
    {
        $Regions = $DB->get_records( "address_region", ["country_id" => $Application->getCountryId()] );
        $Cities  = $DB->get_records( "address_city", ["region_id" => $Application->getRegionId()] );
    }
}
catch ( dml_exception $e )
{
    die( $e->getMessage() );
}


$output
    ->addSimpleEntity( "olid", $olympiadId )
    ->addSimpleEntity( "user_id", $User->getId() )
    ->addEntity( $Application, "app" )
    ->addEntities( $Countries, "country" )
    ->addEntities( $Regions, "region" )
    ->addEntities( $Cities, "city" )
    ->xsl( "forms/olympiad_application.xsl" )
    ->show();

echo $OUTPUT->footer();