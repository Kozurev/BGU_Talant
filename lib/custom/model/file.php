<?php
/**
 * Данный класс служит для реализации новой файловой системы и отвечает за работу с загружаемыми файлами
 *
 * @author: Bad Wolf
 * @date: 07.09.2018 05:24
 */
class File extends Core_Entity
{

    /**
     * id изображения QR-кода квитанции
     */
    const TEMPLATE_TICKET = 23;

    /**
     * Название файла-шаблона для формирования заявления при совпадающих данных заказчика и потребителя
     */
    const TEMPLATE_APPLICATION_EQUAL = "application_equal.php";

    /**
     * Название файла-шаблона для формирования заявления при не совпадающих данных заказчика и потребителя
     */
    const TEMPLATE_APPLICATION_NOT_EQUAL = "application_not_equal.php";


    /**
     * Название файла-шаблона для формирования договора
     */
    const TEMPLATE_CONTRACT = "contract.php";


    /**
     * Название файла-шаблона для формирования согласия на обработку персональных данных
     */
    const TEMPLATE_AGREEMENT = "agreement.php";


    /**
     * Список названий свойств, принадлежащих таблице в БД
     *
     * @var array
     */
    protected $tableRows = ["id", "user_id", "program_id", "period_id", "file_type_id", "file_name", "file_path", "confirmed", "file_type", "public"];


    /**
     * Уникальный идентификатор объекта
     *
     * @var int
     */
    protected $id;


    /**
     * id пользователя, загрузившего файл
     *
     * @var int
     */
    protected $user_id = 0;


    /**
     * id программы, к которой прикреплен данный файл
     *
     * @var int
     */
    protected $program_id = 0;


    /**
     * id периода программы, к которому прикреплен файл
     *
     * @var int
     */
    protected $period_id = 0;


    /**
     * id типа файла (из таблицы mdl_filemanager_type)
     * Возможные типы: "согласие на обработку персональных данных", "заявление", "договор", "квитанция" и т.д.
     *
     * @var int
     */
    protected $file_type_id = 0;


    /**
     * Исходное название файла при загрузке
     *
     * @var string
     */
    protected $file_name;


    /**
     * Относительный путь файла (относительно значения свойства dir)
     *
     * @var string
     */
    protected $file_path;


    /**
     * Статус файла
     * '0'  - только что загружен
     * '1'  - одобренный модератором
     * '-1' - отклонен модератором
     *
     * @var int
     */
    protected $confirmed = 0;


    /**
     * Тип загружаемого файла из $_FILES["sended_file"]["type"]
     *
     * @var string
     */
    protected $file_type;


    /**
     * Указатель на публичность файла
     * 1 - файл имеет публичный доступ
     * 0 - к файлу имеют доступ лишь пользователь, загрузивший его и модератор
     *
     * @var int
     */
    protected $public = 0;


    /**
     * Директория для загрузки файлов
     *
     * @var string
     */
    protected $dir;


    /**
     * Задание ассоциации данного класса с таблицей БД
     *
     * @return string
     */
    public function databaseTableName()
    {
        return "mdl_filemanager";
    }


    /**
     * Геттер для свойства id
     *
     * @return int
     */
    public function getId()
    {
        return intval( $this->id );
    }


    /**
     * Геттер для свойства user_id
     *
     * @return int
     */
    public function getUserId()
    {
        return intval( $this->user_id );
    }


    /**
     * Геттер для свойства program_id
     *
     * @return int
     */
    public function getProgramId()
    {
        return intval( $this->program_id );
    }


    /**
     * Геттер для свойства period_id
     *
     * @return int
     */
    public function getPeriodId()
    {
        return intval( $this->period_id );
    }


    /**
     * Геттер для свойства file_name
     *
     * @return string
     */
    public function getFileName()
    {
        return strval( $this->file_name );
    }


    /**
     * Геттер для свойства file_path
     *
     * @return string
     */
    public function getFilePath()
    {
        return strval( $this->file_path );
    }


    /**
     * Геттер для свойства file_type
     *
     * @return string
     */
    public function getFileType()
    {
        return strval( $this->file_type );
    }


    /**
     * Геттер для свойства file_type_id
     *
     * @return int
     */
    public function getFileTypeId()
    {
        return intval( $this->file_type_id );
    }


    /**
     * Геттер для свойства confirmed
     *
     * @return int
     */
    public function getConfirmed()
    {
        return intval( $this->confirmed );
    }


    /**
     * Геттер для свойства public
     *
     * @return int
     */
    public function getPublic()
    {
        return intval( $this->public );
    }


    /**
     * Геттер для свойства dir
     *
     * @return string
     */
    public function getDir()
    {
        return strval( $this->dir );
    }


    /**
     *
     *
     * @return string
     */
    public function getFullFilePath()
    {
        return $this->dir . $this->file_path;
    }


    /**
     * Сеттер для свойства user_id
     *
     * @param $user_id
     * @return $this
     */
    public function setUserId( $user_id )
    {
        $this->user_id = intval( $user_id );
        return $this;
    }


    /**
     * Сеттер для свойства program_id
     *
     * @param $program_id
     * @return $this
     */
    public function setProgramId( $program_id )
    {
        $this->program_id = intval( $program_id );
        return $this;
    }


    /**
     * Сеттер для свйоства period_id
     *
     * @param $period_id
     * @return $this
     */
    public function setPeriodId( $period_id )
    {
        $this->period_id = intval( $period_id );
        return $this;
    }


    /**
     * Сеттер для свойства file_name
     *
     * @param $file_name
     * @return $this
     */
    public function setFileName( $file_name )
    {
        $this->file_name = strval( $file_name );
        return $this;
    }


    /**
     * Сеттер для свойства file_path
     *
     * @param $file_path
     * @return $this
     */
    public function setFilePath( $file_path )
    {
        $this->file_path = strval( $file_path );
        return $this;
    }


    /**
     * Сеттер для свойства file-type
     *
     * @param $file_type
     * @return $this
     */
    public function setFileType( $file_type )
    {
        $this->file_type = strval( $file_type );
        return $this;
    }


    /**
     * Сеттер для свойства file_type_id
     *
     * @param $file_type_id
     * @return $this
     */
    public function setFileTypeId( $file_type_id )
    {
        $this->file_type_id = intval( $file_type_id );
        return $this;
    }


    /**
     * Сеттер для свойства confirmed
     *
     * @param $confirmed
     * @return $this
     */
    public function setConfirmed( $confirmed )
    {
        $this->confirmed = intval( $confirmed );
        return $this;
    }


    /**
     * Сеттер для свойства public
     *
     * @param $public
     * @return $this
     */
    public function setPublic( $public )
    {
        if( $public == 0 )
            $this->public = 0;
        else
            $this->public = 1;

        return $this;
    }


    /**
     * Сеттер для свойства dir
     *
     * @param $dir
     * @return $this
     */
    public function setDir( $dir )
    {
        $this->dir = strval( $dir );
        return $this;
    }


    /**
     * File constructor.
     * Задание значений свойств user_id и dir
     */
    public function __construct()
    {
        global $CFG;
        $this->dir = $CFG->dataroot . "/1/";
        //$User = Core::factory( "User" )->getCurrent();
        //if( $User !== false )   $this->user_id = $User->getId();
    }


    /**
     * Метод загрузки файла на сервер
     *
     * @param $fileName - название ключа загружаемого файла в массиве $_FILES
     * @return $this
     */
    public function upload( $fileName )
    {
        $file = Core_Array::File( $fileName, null );
        if( is_null( $file ) )  die( "Файла с ключем '" . $fileName . "' не существует." );

        //Удаление предыдущего файла
        if( $this->id && file_exists( $this->dir . $this->file_path ) )
        {
            unlink( $this->dir . $this->file_path );
        }

        //Получение разширения загружаемого файла
        $uploadedFileType = explode( ".", $file["name"] );
        $uploadedFileType = array_pop( $uploadedFileType );

        //Задание значений свйоств нового/обновляемого файла и сохранение
        $this->file_name = $file["name"];
        $this->file_path = uniqid() . "." . $uploadedFileType;
        $this->file_type = $file["type"];
        $this->save();

        move_uploaded_file( $file["tmp_name"], $this->dir . $this->file_path );
        return $this;
    }



    public static function downloadTemplate( $templateType, $params = [] )
    {
        global $CFG;

        if( $templateType === self::TEMPLATE_TICKET )
        {
            header( "Location: /blocks/docs/files.php?fileid=" . self::TEMPLATE_TICKET );
            return;
        }

        switch( $templateType )
        {
            case self::TEMPLATE_APPLICATION_EQUAL:      $filename = "заявление.doc";    break;
            case self::TEMPLATE_APPLICATION_NOT_EQUAL:  $filename = "заявление.doc";    break;
            case self::TEMPLATE_CONTRACT:               $filename = "договор.doc";      break;
            case self::TEMPLATE_AGREEMENT:              $filename = "согласие.doc";     break;
            default:                                    $filename = "шаблон.doc";       break;
        }

        header("Content-Type: application/msword; charset=cp-1251" );
        header("Content-Disposition: attachment; filename='". $filename ."';" );
        require_once $CFG->dirroot . "/blocks/docs/templates/" . $templateType;


//        switch ( $templateType )
//        {
//
//            //Квитанция об оплате
//            case self::TEMPLATE_TICKET:
//                {
//                    header( "Location: /blocks/docs/files.php?fileid=" . self::TEMPLATE_TICKET );
//                    break;
//                }
//
//            //Заявление для записи на программу при совпадении данных заказчика и потребителя
//            case self::TEMPLATE_APPLICATION_EQUAL:
//                {
//                    header("Content-Type: application/msword; charset=cp-1251" );
//                    header("Content-Disposition: attachment; filename='заявление.doc';" );
//                    require_once $CFG->dirroot . "/blocks/docs/templates/" . self::TEMPLATE_APPLICATION_EQUAL;
//                    break;
//                }
//
//            //Заявление для записи на программу при не совпадении данных заказчика и потребителя
//            case self::TEMPLATE_APPLICATION_NOT_EQUAL:
//                {
//                    header("Content-Type: application/msword" );
//                    header("Content-Disposition: attachment; filename='заявление.doc';" );
//                    require_once $CFG->dirroot . "/blocks/docs/templates/" . self::TEMPLATE_APPLICATION_NOT_EQUAL;
//                    break;
//                }
//
//            //Договор
//            case self::TEMPLATE_CONTRACT:
//                {
//                    header("Content-Type: application/msword" );
//                    header("Content-Disposition: attachment; filename='договор.doc';" );
//                    require_once $CFG->dirroot . "/blocks/docs/templates/" . self::TEMPLATE_CONTRACT;
//                    break;
//                }
//
//            //Соглашение на обработку персональных данных
//            case self::TEMPLATE_AGREEMENT:
//                {
//                    header("Content-Type: application/msword" );
//                    header("Content-Disposition: attachment; filename='согласие.doc';" );
//                    require_once $CFG->dirroot . "/blocks/docs/templates/" . self::TEMPLATE_AGREEMENT;
//                    break;
//                }
//
//        }

    }


    public function save( $obj = null )
    {
        Core::notify( array(&$this), "beforeFileSave" );
        parent::save();
        Core::notify( array(&$this), "afterFileSave" );
    }


    public function delete( $obj = null )
    {
        Core::notify( array(&$this), "beforeFileDelete" );
        parent::delete();
        Core::notify( array(&$this), "afterFileDelete" );
    }


}