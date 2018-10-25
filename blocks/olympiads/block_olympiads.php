<?php
/**
 * Created by PhpStorm.
 *
 * @author: Bad Wolf
 * @date: 22.10.2018 12:18
 */


//require_once "C:\OpenServer/domains/moodle/config.php";
//require_once "W:/domains/moodle/config.php";

//require_once "C:\OpenServer/domains/moodle/blocks/moodleblock.class.php";
global $CFG, $DB;
require_once $CFG->dirroot . "/config.php";
//require_once $CFG->dirroot . "/blocks/moodleblock.class.php";
require_once $CFG->libdir . "/custom/autoload.php";

class block_olympiads extends block_base
{

    public function init()
    {
        $this->title = "Олимпиады";
    }


    public function get_content()
    {
        global $CFG, $DB;
        $User = Core::factory( "User" )->getCurrent();
        $this->content = new stdClass;

        if( $User->getRoleId() === 1 )
        {
            $Olympiads = $DB->get_records( "course", ["category" => $CFG->olympiadsCategoryId] );

            foreach( $Olympiads as $Olympiad )
            {
                //Формат дат начала и конца проведения курса в формате d.m.Y H:i:s
                $Olympiad->startdate_string = "";
                $Olympiad->enddate_string = "";

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

            $this->content->text = Core::factory( "Core_Entity" )
                ->addEntities( $Olympiads, "olympiad" )
                ->addSimpleEntity( "wwwroot", $CFG->wwwroot )
                ->xsl( "tables/admin/olympiads.xsl" )
                ->show( false );
        }
        elseif( $User->getRoleId() === 5 )
        {
            $Applications = Core::factory( "Olympiad_Application" )
                ->queryBuilder()
                ->select( ["olympiad_id", "fullname", "startdate", "enddate"] )
                ->join( $CFG->prefix . "course AS c", "olympiad_id = c.id" )
                ->where( "user_id", "=", $User->getId() )
                ->findAll();

            foreach ( $Applications as $App )
            {
                $App->startdate_string = date( "d.m.Y", $App->startdate );
                $App->enddate_string =   date( "d.m.Y", $App->enddate );

                if( date( "H:i:s", $App->startdate ) !== "00:00:00" )   $App->startdate_string .= " " . date( "H:i", $App->startdate );
                if( date( "H:i:s", $App->enddate   ) !== "00:00:00" )   $App->enddate_string .=   " " . date( "H:i", $App->enddate );
            }

            if( count( $Applications ) > 0 )
            {
                $this->content->text = Core::factory( "Core_Entity" )
                    ->addEntities( $Applications, "app" )
                    ->addSimpleEntity( "wwwroot", $CFG->wwwroot )
                    ->xsl( "tables/olympiad_applications.xsl" )
                    ->show( false );
            }
        }

        return $this->content;
    }


    /**
     * Locations where block can be displayed.
     *
     * @return array
     */
    public function applicable_formats() {
        return array('my' => true);
    }


}