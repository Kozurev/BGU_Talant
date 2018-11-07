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
            File::downloadTemplate( File::TEMPLATE_TICKET, $templateParams );
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
            if( $Application->isEqual() )
                File::downloadTemplate( File::TEMPLATE_APPLICATION_EQUAL, $templateParams );
            else
                File::downloadTemplate( File::TEMPLATE_APPLICATION_NOT_EQUAL, $templateParams );

            break;
        }

    //Формирование и загрузка договора
    case "contract":
        {
            File::downloadTemplate( File::TEMPLATE_CONTRACT, $templateParams );
            break;
        }
}