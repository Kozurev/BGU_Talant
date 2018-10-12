<?php
/**
 * Created by PhpStorm.
 * @author: Bad Wolf
 * @date: 22.08.2018 10:54
 */

//require_once "../config.php";
global $CFG;
require_once $CFG->dirroot . "/blocks/moodleblock.class.php";
require_once $CFG->libdir . "/custom/autoload.php";

class block_docs extends block_base
{
    public function init()
    {
        $User = Core::factory( "User" )->getCurrent();  //Объект текущего пользователя

        if( $User === false )
        {
            return;
        }
        elseif( $User->getRoleId() === 5 )
        {
            $this->title = "Список поданых документов"; //get_string( "title", "block_courses" );
        }
        elseif( $User->getRoleId() === 1 )
        {
            $this->title = "Список загруженных документов, ожидающих модерации";
        }
    }


    public function get_content()
    {
        global $CFG;
        $this->content = new stdClass;
        $User = Core::factory( "User" )->getCurrent();

        if( $User->getRoleId() === 5 )
        {
            $FileAgreement = Core::factory( "File" )
                ->queryBuilder()
                ->where( "user_id", "=", $User->getId() )
                ->where( "file_type_id", "=", 1 )
                ->find();

            if( $FileAgreement === false )
            {
                $this->content->text = "<h5>Для возможности записи на программы необходимо загрузить скан-копию или фотографию согласия на обработку персональных данных</h5>";
                $this->content->text .= Core::factory( "Core_Entity" )
                    ->addSimpleEntity( "wwwroot", $CFG->wwwroot )
                    ->addSimpleEntity( "file_id", 0 )
                    ->xsl( "forms/upload_agreement.xsl" )
                    ->show( false );
            }
            elseif( $FileAgreement->getConfirmed() === 0 )
            {
                $this->content->text = "<h5 style='color: orange'>Ваше согласие на обработку персональных данных будет проверено модератором в течении одного рабочего дня.</h5>";
                $this->content->text .= "<p>До проверки модератором можете заново загрузить скан-копию/фотографию согласия.</p>";
                $this->content->text .= Core::factory( "Core_Entity" )
                    ->addSimpleEntity( "wwwroot", $CFG->wwwroot )
                    ->addSimpleEntity( "file_id", $FileAgreement->getId() )
                    ->xsl( "forms/upload_agreement.xsl" )
                    ->show( false );
            }
            elseif( $FileAgreement->getConfirmed() === -1 )
            {
                $this->content->text = "<h5>Соглавие на обработку персональных данных было отклонено модератором.</h5>";
                $this->content->text .= "<p>Проверьте поданое ранее Вами согласие на наличие ошибок и несовпадение оформления с шаблоном. После внесения исправлений загрузите согласие заново.</p>";
                $this->content->text .= Core::factory( "Core_Entity" )
                    ->addSimpleEntity( "wwwroot", $CFG->wwwroot )
                    ->addSimpleEntity( "file_id", $FileAgreement->getId() )
                    ->xsl( "forms/upload_agreement.xsl" )
                    ->show( false );
            }
            elseif( $FileAgreement->getConfirmed() === 1 )
            {
                $this->content->text = "<h5 style='color: green'>Согласие на обработку персональных данных было одобрено модератором</h5>";
            }
        }
        elseif( $User->getRoleId() === 1 )
        {
            $this->content->text = "";
            $File = Core::factory( "File" );

            $Files = Core::factory( "File" )
                ->queryBuilder()
                ->select( [$File->databaseTableName().".id", "file_name", "u.firstname", "u.lastname"] )
                ->join( "mdl_user AS u", "u.id = user_id" )
                ->where( $File->databaseTableName() . ".confirmed", "=", 0 )
                ->where( "file_type_id", "=", 1 )
                ->findAll();

            $this->content->text .= Core::factory( "Core_Entity" )
                ->addSimpleEntity( "wwwroot", $CFG->wwwroot )
                ->addEntities( $Files )
                ->xsl( "tables/admin/agreement_confirm.xsl" )
                ->show( false );


            $Rows = Core::factory( "Orm" )
                ->select( ["fm.id", "lastname", "firstname", "pr.title", "prp.date_start", "prp.date_end", "fm.program_id", "period_id", "fm.user_id"] )
                ->from( "mdl_filemanager AS fm" )
                ->join( "mdl_user as u", "u.id = user_id" )
                ->join( "mdl_program AS pr", "pr.id = program_id" )
                ->join( "mdl_program_period AS prp", "prp.id = period_id" )
                ->where( "fm.confirmed", "=", 0 )
                ->where( "file_type_id", "=", 3 )
                ->findAll();

            $output = Core::factory( "Core_Entity" );

            foreach ( $Rows as $row )
            {
                $row->date_start = date( "d.m.Y", strtotime( $row->date_start ) );
                $row->date_end = date( "d.m.Y", strtotime( $row->date_end ) );

                $Item = Core::factory( "Core_Entity" )
                    ->entityName( "row" )
                    ->addEntity( $row, "item" );

                $Files = Core::factory( "File" )
                    ->queryBuilder()
                    ->select( ["mdl_filemanager.id", "file_name", "fmt.title"] )
                    ->where( "user_id", "=", $row->user_id )
                    ->where( "program_id", "=", $row->program_id )
                    ->where( "period_id", "=", $row->period_id )
                    ->where( "public", "=", 0 )
                    ->where( "file_type_id", "IN", [3, 4, 5, 7] )
                    ->join( "mdl_filemanager_type AS fmt", "fmt.id = file_type_id" )
                    ->where( "confirmed", "=", 0 )
                    ->findAll();

                $Item->addEntities( $Files );
                $output->addEntity( $Item );
            }

            $this->content->footer = $output
                ->addSimpleEntity( "wwwroot", $CFG->wwwroot )
                ->xsl( "tables/admin/application_docs.xsl" )
                ->show( false );
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