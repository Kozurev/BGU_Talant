<?php
/**
 * Файл с кастомными наблюдателями за событиями в системе
 *
 * @author Bad Wolf
 * @date 11.09.2018 11:11
 */


/**
 * Установка значения свойства user_id у объекта File перед сохранением, если оно не установлено заранее
 * и отправка email сообщения пользователю о подтверждении модератором загруженного согласия на обработку персональных данных
 */
Core::attachObserver("beforeFileSave", function( $args ) {
    $File = $args[0];

    //Привязка загружаемого файла к авторизованному пользователю
    if( $File->getUserId() === 0 )
    {
        $User = Core::factory( "User" )->getCurrent();
        $File->setUserId( $User->getId() );
    }

    //Отправка сообщения о подтверждении согласия на обработку персональных данных
    if( $File->getFileTypeId() === 1 )
    {
        $User = Core::factory( "User", $File->getUserId() );
        $result = Core::factory( "Mail" )
            ->appendParam( "name", $User->firstname )
            ->appendParam( "surname", $User->lastname )
            ->appendAddressee( $User->email )
            ->setSubject( "Согласие на обработку персональных данных" )
            ->setMessage( "фшукегптзукшжг кцзешгткышзг ущешптк кертжкцт цктршгкетж кшерткшг ткцгшепршкц крткщеорцуке цкщрецк кцертхз" )
            ->send();
    }

});


/**
 * Удаление файла на сервере при удалении записи из таблицы mdl_filemanager
 */
Core::attachObserver("afterFileDelete", function( $args ) {
    $File = $args[0];
    $filePath = $File->getDir() . $File->getFilePath();

    if( file_exists( $filePath ) )
    {
        unlink( $filePath );
    }

});


/**
 * Удаление всех связей и файлов программы
 */
Core::attachObserver("beforeProgramDelete", function( $args ) {
    $Program = $args[0];

    //Удаление всех прикрепленных файлов к программе
    $Files = Core::factory( "File" )
        ->queryBuilder()
        ->where( "program_id", "=", $Program->getId() )
        ->findAll();

    foreach ( $Files as $File ) $File->delete();


    //Удаление всех связей программы с курсами
    $Assignments = Core::factory( "Program_Course_Assignment" )
        ->queryBuilder()
        ->where( "program_id", "=", $Program->getId() )
        ->findAll();

    foreach ( $Assignments as $assignment ) $assignment->delete();


    //Удаление всех периодов, связанных с программой
    $Periods = Core::factory( "Program_Period" )
        ->queryBuilder()
        ->where( "program_id", "=", $Program->getId() )
        ->findAll();

    foreach ( $Periods as $Period ) $Period->delete();
});


/**
 * Удаление всех заявок на период программы
 */
Core::attachObserver("beforeProgramPeriodDelete", function( $args ) {
    $Period = $args[0];

    $Applications = Core::factory( "Program_Application" )
        ->queryBuilder()
        ->where( "period_id", "=", $Period->getId() )
        ->findAll();

    foreach ( $Applications as $Application )   $Application->delete();
});


/**
 * Удаление всех прикрепленных файлов к заявке на программу
 */
Core::attachObserver("beforeProgramApplicationDelete", function( $args ) {
    $Application = $args[0];

    $Files = Core::factory( "File" )
        ->queryBuilder()
        ->where( "user_id", "=", $Application->getUserId() )
        ->where( "period_id", "=", $Application->getPeriodId() )
        ->findAll();

    foreach ( $Files as $File ) $File->delete();
});