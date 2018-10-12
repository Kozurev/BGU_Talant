<?php
/**
 * Список программ
 *
 * @author Bad Wolf
 * @date 14.09.2018 11:03
 */

require_once "../../config.php";
global $CFG, $PAGE, $OUTPUT, $USER;
require_once $CFG->libdir . "/custom/autoload.php";

$programId = Core_Array::Get( "prid", null );


$PAGE->set_url('/blocks/programs/' );
$PAGE->set_pagelayout('standard');
$PAGE->set_cacheable(false);
//$context = context_user::instance($USER->id);
$PAGE->set_context( context_system::instance() );


if( $programId === null )
{
    $PAGE->set_title( "Программы" );
    echo $OUTPUT->header();

    $Programs = Core::factory( "Program" )
        ->findAll();

    Core::factory( "Core_Entity" )
        ->addEntities( $Programs )
        ->addSimpleEntity( "wwwroot", $CFG->wwwroot )
        ->xsl( "program_list.xsl" )
        ->show();
}
else
{
    $Program = Core::factory( "Program", $programId );
    if( $Program === false )    die( "Программы с таким идентификатором не существует" );

    $date = date( "Y-m-d" );

    $Periods = Core::factory( "Program_Period" )
        ->queryBuilder()
        ->where( "program_id", "=", $programId )
        ->where( "visible_start", "<=", $date )
        ->where( "visible_end", ">=", $date )
        ->findAll();

    foreach ( $Periods as $Period )
    {
        $Period->setDateStart( date( "d.m.Y", strtotime( $Period->getDateStart() ) ) );
        $Period->setDateEnd( date( "d.m.Y", strtotime( $Period->getDateEnd() ) ) );
    }

    $PAGE->set_title( $Program->getTitle() );
    echo $OUTPUT->header();

    $User = Core::factory( "User" )->getCurrent();

    $issetAgreement = Core::factory( "File" )
        ->queryBuilder()
        ->where( "user_id", "=", $User->getId() )
        ->where( "file_type_id", "=", 1 )
        ->getCount();

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





echo $OUTPUT->footer();


