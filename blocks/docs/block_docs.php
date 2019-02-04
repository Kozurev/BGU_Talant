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

            if( $FileAgreement === null )
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


//            $Rows = Core::factory( "Orm" )
//                ->select( ["fm.id", "lastname", "firstname", "pr.title", "prp.date_start", "prp.date_end", "fm.program_id", "period_id", "fm.user_id"] )
//                ->from( "mdl_filemanager AS fm" )
//                ->join( "mdl_user as u", "u.id = user_id" )
//                ->join( "mdl_program AS pr", "pr.id = program_id" )
//                ->join( "mdl_program_period AS prp", "prp.id = period_id" )
//                ->where( "fm.confirmed", "=", 0 )
//                ->where( "file_type_id", "=", 3 )
//                ->findAll();

            $Rows = Core::factory( "Orm" )
                ->select( ["user_id", "period_id"] )
                ->from( "mdl_filemanager" )
                ->where( "confirmed", "=", 0 )
                ->where( "period_id", "<>", 0 )
                ->groupBy( "user_id" )
                ->groupBy( "period_id" )
                ->findAll();


            $output = Core::factory( "Core_Entity" );

            foreach ( $Rows as $row )
            {
//                SELECT lastname, firstname, mdl_program_period.program_id AS program_id, title, date_start, date_end
//                FROM mdl_filemanager
//                JOIN mdl_user ON mdl_user.id = mdl_filemanager.user_id
//                JOIN mdl_program_period ON mdl_program_period.id = mdl_filemanager.period_id
//                JOIN mdl_program ON mdl_program.id = mdl_program_period.program_id
//                WHERE mdl_filemanager.confirmed = 0 AND user_id = 17 AND period_id = 7
//                GROUP BY lastname

                $programTableName = Core::factory( "Program" )->getTableName();
                $periodTableName = Core::factory( "Program_Period" )->getTableName();
                $fileTableName = Core::factory( "File" )->getTableName();
                $filetypeTableName = $CFG->prefix . "filemanager_type";
                $userTableName = $CFG->prefix . "user";

                $rowdata = Core::factory( "Orm" )
                    ->select( ["lastname", "firstname", $periodTableName . ".program_id AS program_id", "title", "date_start", "date_end" ] )
                    ->from( $fileTableName )
                    ->join( $userTableName, $userTableName . ".id = " . $fileTableName . ".user_id" )
                    ->join( $periodTableName, $periodTableName . ".id = " . $fileTableName . ".period_id" )
                    ->join( $programTableName, $programTableName . ".id = " . $periodTableName . ".program_id" )
                    ->where( $fileTableName . ".confirmed", "=", 0 )
                    ->where( "user_id", "=", $row->user_id )
                    ->where( "period_id", "=", $row->period_id )
                    ->find();

                $rowdata->date_start = date( "d.m.Y", strtotime( $rowdata->date_start ) );
                $rowdata->date_end = date( "d.m.Y", strtotime( $rowdata->date_end ) );

                $Item = Core::factory( "Core_Entity" )
                    ->entityName( "row" )
                    ->addEntity( $rowdata, "item" );

                $Files = Core::factory( "File" )
                    ->queryBuilder()
                    ->select( [$fileTableName . ".id", "file_name", "fmt.title"] )
                    ->where( "user_id", "=", $row->user_id )
                    ->where( "period_id", "=", $row->period_id )
                    ->where( "public", "=", 0 )
                    ->where( "file_type_id", "IN", [3, 4, 5, 7, 8] )
                    ->join( $filetypeTableName . " AS fmt", "fmt.id = file_type_id" )
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