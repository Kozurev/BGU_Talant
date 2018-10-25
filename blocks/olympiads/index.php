<?php
/**
 * Created by PhpStorm.
 *
 * @author: Bad Wolf
 * @date 23.10.2018 15:12
 */

require_once "../../config.php";
global $CFG, $PAGE, $OUTPUT, $USER, $DB;
require_once $CFG->libdir . "/custom/autoload.php";

$olympiadId = Core_Array::Get( "olid", null );

$User = Core::factory( "User" )->getCurrent();
$roleId = $User->getRoleId();

$PAGE->set_url('/blocks/programs/' );
$PAGE->set_pagelayout('standard');
$PAGE->set_cacheable(false);
//$context = context_user::instance($USER->id);
$PAGE->set_context( context_system::instance() );


if( $olympiadId === null )
{
    $PAGE->set_title( "Олимпиады" );
    echo $OUTPUT->header();

    $sql = "SELECT cour.id, shortname, startdate, enddate, fl.filename AS logo, fl.itemid
            FROM mdl_course as cour
            JOIN mdl_files AS fl ON fl.itemid = cour.logo
            WHERE cour.category = $CFG->olympiadsCategoryId AND fl.filesize <> 0";

    //$Olympiads = $DB->get_records( "course", ["category" => "3"] );
    $Olympiads = $DB->get_records_sql( $sql );

    foreach( $Olympiads as $Olympiad )
    {
        //Формат дат начала и конца проведения курса в формате d.m.Y H:i:s
        $Olympiad->startdate_string = "";
        $Olympiad->enddate_string =   "";

        if( $Olympiad->startdate != 0 )
        {
            $Olympiad->startdate_string = date( "d.m.Y", $Olympiad->startdate );

            if( date( "H:i:s", $Olympiad->startdate ) !== "00:00:00" )
            {
                $Olympiad->startdate_string .= " " . date( "H:i:s", $Olympiad->startdate );
            }
        }

        if( $Olympiad->enddate != 0   )
        {
            $Olympiad->enddate_string = date( "d.m.Y", $Olympiad->enddate );

            if( date( "H:i:s", $Olympiad->enddate ) !== "00:00:00" )
            {
                $Olympiad->enddate_string .= " " . date( "H:i:s", $Olympiad->enddate );
            }
        }
    }

    Core::factory( "Core_Entity" )
        ->addEntities( $Olympiads, "olympiad" )
        ->addSimpleEntity( "wwwroot", $CFG->wwwroot )
        ->xsl( "olympiad_list.xsl" )
        ->show();
}
else
{
    $Olympiad = $DB->get_record( "course", ["id" => $olympiadId] );

    if( $Olympiad === false )
    {
        $PAGE->set_title( "Ошибка" );
        echo $OUTPUT->header();
        echo "<h3>Олимпиады (курса) с идентификаторо <b>$olympiadId</b> не существует</h3>";
        echo $OUTPUT->footer();
        exit;
    }


    if( $Olympiad->logo != "0" )
    {
        $sql = "SELECT * FROM mdl_files WHERE filesize <> 0 and itemid = " . $Olympiad->logo;
        $LogoFile = $DB->get_record_sql( $sql );
        $src = $CFG->wwwroot . "/draftfile.php/5/user/draft/$Olympiad->logo/$LogoFile->filename";
    }
    else
    {
        $LogoFile = new stdClass();
        $src = $CFG->wwwroot . "/theme/klass/pix/boxes/default.png";
    }

    $Olympiad->startdate_string = date( "d.m.Y", $Olympiad->startdate );
    $Olympiad->enddate_string =   date( "d.m.Y", $Olympiad->enddate );
    if( date( "H:i:s", $Olympiad->startdate ) !== "00:00:00" )  $Olympiad->startdate_string .= " " . date( "H:i", $Olympiad->startdate );
    if( date( "H:i:s", $Olympiad->enddate ) !== "00:00:00" )    $Olympiad->enddate_string .=   " " . date( "H:i", $Olympiad->enddate );

    $PAGE->set_title( $Olympiad->shortname );
    echo $OUTPUT->header();

//    Core::factory( "Core_Entity" )
//        ->addEntity( $Olympiad, "olympiad" )
//        ->addEntity( $LogoFile, "logo" )
//        ->addSimpleEntity( "wwwroot", $CFG->wwwroot )
//        ->xsl( "olympiad.xsl" )
//        ->show();

/**
 * Так как XSLT-шаблонизатор не может корректно выводить уже сформированный HTML код в свойстве курса summary
 * поэтому тут используется такое себе костыль.
 */
?>
    <div class="olympiad">
        <div class="row">
            <div class="col-md-4 col-sm-12">
                <img width="100%" src="<?=$src?>">
            </div>

            <div class="col-md-8 col-sm-12">
                <h2><?=$Olympiad->fullname?></h2>
                <p>Дата проведения: с <?=$Olympiad->startdate_string?> по <?=$Olympiad->enddate_string?></p>
                <?=$Olympiad->summary?>
            </div>
        </div>

        <?if( $roleId === 5 ) {?>
            <div class="row right">
                <a href="<?=$CFG->wwwroot . '/blocks/olympiads/app_form.php?olid=' . $olympiadId?>" class="btn btn-primary">Подать заявку</a>
<!--                <form action="--><?//=$CFG->wwwroot?><!--/blocks/olympiads/app_form.php" method="POST">-->
<!--                    <input type="hidden" name="appid" value="--><?//=$olympiadId?><!--" />-->
<!--                    <input type="submit" class="btn btn-primary" value="Подать заявку" />-->
<!--                </form>-->
            </div>
        <?}?>
    </div>
<?
}



echo $OUTPUT->footer();