<?php
/**
 * Файл для формирования шаблонов заявления, договора и квитанции об оплате
 *
 * @author Bad Wolf
 * @date 24.09.2018 9:46
 */

require_once "../../config.php";
global $CFG;
require_once $CFG->libdir . "/custom/autoload.php";

require_login();

$action = Core_Array::Get( "template_type", "" );   //Тип запрашиваемого шаблона
$File = Core::factory( "File" );

$applicationId = Core_Array::Get( "appid", 0 );
//if( $applicationId === 0 )  die( "Отсутствует обзятельный GET-параметр" );

//$Application = Core::factory( "Program_Application", $applicationId );
//if( $Application === false )    die( "Программы с id $applicationId не существует" );

if( $applicationId !== 0 )
{
    $Application = Core::factory( "Program_Application", $applicationId );

    $User = $Application->getUser();
    $Period = $Application->getPeriod();
    $Program = $Application->getProgram();

    $templateParams = [
        "user" => $User,
        "period" => $Period,
        "program" => $Program,
        "application" => $Application
    ];
}


switch( $action )
{

    //Получение шаблона квитанции об оплате (QR-код)
    case "ticket":
        {
            File::downloadTemplate( File::TEMPLATE_TICKET );
            break;
        }

    //Согласие на обработку персональных данных
    case "agreement":
        {
            File::downloadTemplate( File::TEMPLATE_AGREEMENT );
            break;
        }

    //Формирование и загрузка заявления
    case "application":
        {
            $fields = ["surname" => "Surname", "name" => "Name", "patronymic" => "Patronymic", "birthday" => "Birthday", "address" => "Address",
                "passport_number" => "PassportNumber", "passport_author" => "PassportAuthor", "passport_date" => "PassportDate", "phone" => "Phone"];

            $equal = true;  //Указатель на совпадение данных заказчика и потребителя

            foreach ( $fields as $field )
            {
                $getterName = "get" . $field;

                if( $Application->$getterName( 1 ) !== $Application->$getterName( 2 ) )
                {
                    $equal = false;
                    break;
                }
            }

            if( $equal )    File::downloadTemplate( File::TEMPLATE_APPLICATION_EQUAL, $templateParams );
            else            File::downloadTemplate( File::TEMPLATE_APPLICATION_NOT_EQUAL, $templateParams );

            break;
        }

    //Формирование и загрузка договора
    case "contract":
        {
            File::downloadTemplate( File::TEMPLATE_CONTRACT, $templateParams );
            break;
        }
}