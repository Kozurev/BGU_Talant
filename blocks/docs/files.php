<?php
/**
 * Данный файл содержит набор обработчиков для работы (манипуляций) с загружаемыми файлами
 *
 * @author Bad Wolf
 * @date 10.09.2018 15:07
 */

require_once "../../config.php";
require_once $CFG->libdir . "/custom/autoload.php";

$action = Core_Array::getRequest( "action", null ); //Название вызываемого обработчика


/**
 * Скачивание запрашиваемого файла с сервера
 */
if( $action === null )
{
    $fileId = Core_Array::getRequest( "fileid", 0 );
    if( $fileId === 0 )     die( "Неверно указан параметр fileid" );

    $File = Core::factory( "File", $fileId );
    if( $File === false )   die( "Запрашиваемый вами файл не существует или был удален" );

    $User = Core::factory( "User" )->getCurrent();
    if( $File->getPublic() === 0 && $User->getId() !== $File->getUserId() && $User->getRoleId() !== 1 )

    header("Content-Type: " . $File->getFileType() );
    header("Content-Disposition: attachment; filename=\"" . $File->getFileName() . "\";" );
    header("Content-Length: " . filesize( $File->getFullFilePath() ) );
    readfile( $File->getFullFilePath() );
    exit;
}


/**
 * Обработчик для загрузки
 */
if( $action === "upload" )
{
    $fileId =       Core_Array::Post( "file_id", 0 );
    $programId =    Core_Array::Post( "program_id", 0 );
    $periodId =     Core_Array::Post( "period_id", 0 );
    $fileTypeId =   Core_Array::Post( "file_type_id", 0 );
    $public =       Core_Array::Post( "public", 0 );
    $userId =       Core_Array::Post( "user_id", null );

    if( $fileId != 0 )
    {
        $File = Core::factory( "File", $fileId );
    }
    else
    {
        $File = Core::factory( "File" );
    }

    $File
        ->setUserId( $userId )
        ->setPublic( $public )
        ->setProgramId( $programId )
        ->setPeriodId( $periodId )
        ->setFileTypeId( $fileTypeId )
        ->upload( "file" );

    header( "Location: /my/" );
}


/**
 * Изменение значение свойства confirmed для одного файла
 */
if( $action === "confirm" )
{
    $User = Core::factory( "User" )->getCurrent();
    if( $User->getRoleId() !== 1 )  die( "Данное действие Вам недоступно" );

    $fileId = Core_Array::getRequest( "fileid", 0 );
    if( $fileId === 0 ) die( "Отсутствует значение fileid" );

    $fileIds = [];

    if( is_array( $fileId ) )
        $fileIds = $fileId;
    else
        $fileIds[] = intval( $fileId );

    $newValue = Core_Array::getRequest( "val", 0 );

    foreach ( $fileIds as $id )
        Core::factory( "File", $id )
            ->setConfirmed( $newValue )
            ->save();

    if( Core_Array::Get( "subscribe", 0 ) != 0 )
    {
        global $DB;
        require_once $CFG->dirroot . "/enrol/flatfile/lib.php";

        $programId = Core::factory( "File", $fileIds[0] )->getProgramId();
        $Program = Core::factory( "Program", $programId );

        $userId = Core::factory( "File", $fileIds[0] )->getUserId();
        $Program->subscribeUser( $userId );
    }

    //header( "Location: /my/" );
    exit();
}
