<?php
/**
 * Форма для создания/редактирования заявки на курс
 *
 * @author Bad Wolf
 * @date 14.09.2018 17:01
 */

require_once "../../config.php";
global $PAGE, $CFG, $USER, $OUTPUT;
require_once $CFG->libdir . "/custom/autoload.php";

require_login();

$PAGE->set_url('/blocks/programs/app_form.php' );
$PAGE->set_pagelayout('standard');
$PAGE->set_cacheable(false);
$context = context_user::instance($USER->id);
$PAGE->set_context( $context );


$action = Core_Array::Post( "action", null );


if( $action === "upload_app_docs" )
{
    $User = Core::factory( "User" )->getCurrent();
    $periodId = Core_Array::Post( "period_id", 0 );
    $programId = Core_Array::Post( "program_id", 0 );

    $ApplicationFiles = Core::factory( "File" )
        ->queryBuilder()
        ->where( "user_id", "=", $User->getId() )
        ->where( "program_id", "=", $programId )
        ->where( "period_id", "=", $periodId )
        ->open()
            ->where( "file_type_id", "=", 3 )
            ->where( "file_type_id", "=", 4, "OR" )
            ->where( "file_type_id", "=", 5, "OR" )
            ->where( "file_type_id", "=", 7, "OR" )
        ->close()
        ->orderBy( "id" )
        ->findAll();

    if( count( $ApplicationFiles ) == 4 )
    {
        $FileApplication = $ApplicationFiles[0];
        $FileContract = $ApplicationFiles[1];
        $FileTicket = $ApplicationFiles[2];
        $FilePassport = $ApplicationFiles[3];
    }
    else
    {
        $FileApplication = Core::factory( "File" )
            ->setFileTypeId( 7 )
            ->setUserId( $User->getId() )
            ->setProgramId( $programId )
            ->setPeriodId( $periodId );

        $FileContract = Core::factory( "File" )
            ->setFileTypeId( 3 )
            ->setUserId( $User->getId() )
            ->setProgramId( $programId )
            ->setPeriodId( $periodId );

        $FileTicket = Core::factory( "File" )
            ->setFileTypeId( 4 )
            ->setUserId( $User->getId() )
            ->setProgramId( $programId )
            ->setPeriodId( $periodId );

        $FilePassport = Core::factory( "File" )
            ->setFileTypeId( 5 )
            ->setUserId( $User->getId() )
            ->setProgramId( $programId )
            ->setPeriodId( $periodId );
    }

    $FileApplication->upload( "application" );
    $FileContract->upload( "contract" );
    $FileTicket->upload( "ticket" );
    $FilePassport->upload( "passport" );

    header( "Location: ". $CFG->wwwroot ."/my" );
}


/**
 * Сохранение данных заявки
 */
if( $action === "save_app_data" )
{
    $fields = ["surname" => "Surname", "surname1" => "Surname1", "name" => "Name", "name1" => "Name1", "patronymic" => "Patronymic", "patronymic1" => "Patronymic1", "birthday" => "Birthday",
        "address" => "Address", "passport_number" => "PassportNumber", "passport_author" => "PassportAuthor", "passport_date" => "PassportDate", "phone" => "Phone",
        "country_id" => "CountryId", "region_id" => "RegionId", "city_id" => "CityId"];

    $appId = Core_Array::Post( "id", 0 );
    $Application = Core::factory( "Program_Application", $appId );
    if( $Application === false )    die( "Ошибка. Заявка под номером $appId не существует" );

    $Application
        ->setPeriodId( Core_Array::Post( "period_id", 0 ) )
        ->setUserId( Core_Array::Post( "user_id", 0 ) );

    foreach ( $fields as $post => $setter )
    {
        $setterName = "set" . $setter;

        //Сеттер для данных потребителя
        $Application->$setterName(
            Core_Array::Post( $post . "1", null ), Program_Application::TYPE_CONSUMER
        );

        //Сеттер для данных заказчика
        $Application->$setterName(
            Core_Array::Post( $post . "2", null ), Program_Application::TYPE_CLIENT
        );
    }

    $Application->save();

    header( "Location: ". $CFG->wwwroot ."/my" );
}


/**
 * Создание / редактирование заявки для записи на программу
 */
$PAGE->set_title( "Заявка для записи на программу" );
echo $OUTPUT->header();

$periodId = Core_Array::Get( "period_id", null );
if( $periodId === null )   die( "Отсутствует обязательный GET-параметр" );

$Period = Core::factory( "Program_Period", $periodId );
if( $Period === false )     die( "Период с id $periodId не существует" );

$User = Core::factory( "User" )->getCurrent();

$birth = new DateTime( date( "Y-m-d", $User->birthday ) );
$today = new DateTime();
$fullYears = $birth->diff( $today );
$fullYears = $fullYears->format( '%y' );

//$birthday = date( "Y-m-d", $User->birthday );
//$User->birthday = $birthday;

$Application = Core::factory( "Program_Application" )
    ->queryBuilder()
    ->where( "user_id", "=", $User->getId() )
    ->where( "period_id", "=", $periodId )
    ->find();

$output = Core::factory( "Core_Entity" );

if( $Application !== false )    $output->addEntity( $Application, "app" );


try
{
    //Список стран
    $Countries = $DB->get_records( "address_country" );

    //Список регионов для страны по умолчанию (Россия)
    $Regions1 = [];
    $Regions2 = [];

    //Список городов для региона
    $Cities1 = [];
    $Cities2 = [];

    if( $Application !== false && $Application->getId() != 0 )
    {
        $Regions1 = $DB->get_records( "address_region", ["country_id" => $Application->getCountryId( Program_Application::TYPE_CONSUMER )] );
        $Cities1  = $DB->get_records( "address_city", ["region_id" => $Application->getRegionId( Program_Application::TYPE_CONSUMER )] );


        if( $Application->getCountryId( Program_Application::TYPE_CONSUMER ) === $Application->getCountryId( Program_Application::TYPE_CLIENT ) )
        {
            $Regions2 = $Regions1;
        }
        else
        {
            $Regions2 = $DB->get_records( "address_region", ["country_id" => $Application->getCountryId( Program_Application::TYPE_CLIENT )] );
        }

        if( $Application->getRegionId( Program_Application::TYPE_CONSUMER ) === $Application->getRegionId( Program_Application::TYPE_CLIENT ) )
        {
            $Cities2 = $Cities1;
        }
        else
        {
            $Cities2 = $DB->get_records( "address_city", ["region_id" => $Application->getRegionId( Program_Application::TYPE_CLIENT )] );
        }
    }
}
catch ( dml_exception $e )
{
    die( $e->getMessage() );
}


$output
    ->addSimpleEntity( "wwwroot", $CFG->wwwroot )
    ->addEntity( $User )
    ->addEntity( $Period )
    ->addEntities( $Countries, "country" )
    ->addEntities( array_merge( $Regions1, $Regions2 ), "region" )
    ->addEntities( array_merge( $Cities1, $Cities2 ), "city" )
    ->addSimpleEntity( "user_id", $User->getId() )
    ->addSimpleEntity( "fill_years", $fullYears )
    ->xsl( "forms/program_application.xsl" )
    ->show();



echo $OUTPUT->footer();