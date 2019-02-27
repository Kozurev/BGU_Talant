<?php
/**
 * Данный класс не в состоянии обеспечить всеми необходимыми инструментами для работы с мудловскими
 * пользователями, однако служит оболочкой для поддержания стиля кодирования
 *
 * Class User
 * @author: Bad Wolf
 * @date: 07.09.2018 14:23
 */
class User extends Core_Entity
{
    /**
     * Идентификатор пользователя из таблицы mdl_user
     * По умолчанию id = 0 для корректной работы метода getRole
     *
     * @var int
     */
    protected $id = 0;


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
     * Сеттер для свйоства id
     *
     * @param $id
     * @return $this
     */
    public function setId( $id )
    {
        $this->id = intval( $id );
        return $this;
    }


    /**
     * Метод для получения объекта текущего авторизованного пользователя
     *
     * @return bool|User
     */
    public function getCurrent()
    {
        global $USER;

        $User = new User();

        if( $USER )
        {
            $aProperties = get_object_vars( $USER );
            foreach ( $aProperties as $prop => $val )
                if( is_int( $val ) || is_string( $val ) )   $User->$prop = $val;
        }
        else
        {
            return false;
        }

        return $User;
    }


    public static function current()
    {
        global $USER;

        $User = new User();

        if ( $USER )
        {
            $properties = get_object_vars( $USER );

            foreach ( $properties as $prop => $val )
            {
                if( is_int( $val ) || is_string( $val ) )   $User->$prop = $val;
            }
        }
        else
        {
            return null;
        }

        return $User;
    }


    /**
     * Получение идентификатора роли пользователя из таблицы ассоциаций
     * Возвращает 0 если пользователь не принадлежит ни одной роли
     *
     * @return int
     */
    public function getRoleId ()
    {
        global $USER, $DB;
        $Orm = new Orm();
        $result = $Orm
            ->select( "roleid" )
            ->from( "mdl_role_assignments" )
            ->where( "userid", "=", $this->id )
            ->find();

        if( $result == false )  return 0;

        return intval( $result->roleid );
    }


    /**
     * Подписка пользователя на курс
     *
     * @param $courseId - id курса
     * @param $roleId - id устанавливаемой роли
     */
    public function courseSubscribe( $courseId, $roleId )
    {
        global $DB;

        if( !$this->id )    die( "Невозможно подписать на курс пользователя без id" );

        //Создание роли пользователя для курса
        try
        {
            role_assign( $roleId, $this->id, context_course::instance( $courseId )->id );
        }
        catch( coding_exception $e )
        {
            die( $e->getMessage() );
        }

        //Привязка пользователя к курсу
        try
        {
            $instance = $DB->get_record( "enrol", ["courseid" => $courseId, "enrol" => 'manual'] );
            if( !$DB->record_exists( "user_enrolments", ["enrolid" => $instance->id, "userid" => $this->id] ) )
            {
                $UserEnrolment = new stdClass();
                $UserEnrolment->status = 0;
                $UserEnrolment->enrolid = $instance->id;
                $UserEnrolment->modifierid = $this->getCurrent()->getId();
                $UserEnrolment->timecreated = time();
                $UserEnrolment->timemodified = time();
                $UserEnrolment->userid = $this->id;

                $DB->insert_record( "user_enrolments", $UserEnrolment );
            }
        }
        catch( dml_exception $e )
        {
            die( $e->getMessage() );
        }


    }



}