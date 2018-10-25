<?php
/**
 * Модель заявки на олимпиаду
 *
 * @author: Bad Wolf
 * @date 24.10.2018 14:46
 */

class Olympiad_Application extends Core_Entity
{

    /**
     * Список наименований столбцов в таблице
     *
     * @var array
     */
    protected $tableRows = ["id", "surname", "name", "patronymic", "country", "city", "sex", "nationality", "educational_institution",
                            "class", "address", "phone", "additional_phone", "email", "user_id", "olympiad_id"];


    /**
     * Константы для функции формирования названия свойства в название сеттера/геттера
     */
    const SETTER = "setter";    //Конвертировать в сеттер
    const GETTER = "getter";    //Конвертировать в геттер


    /**
     * Уникальный идентификатор заявки
     *
     * @var int
     */
    protected $id;


    /**
     * Фамилия
     *
     * @var string
     */
    protected $surname = "";


    /**
     * Имя
     *
     * @var string
     */
    protected $name = "";


    /**
     * Отчество
     *
     * @var string
     */
    protected $patronymic = "";


    /**
     * Страна
     *
     * @var string
     */
    protected $country = "";


    /**
     * Город
     *
     * @var string
     */
    protected $city = "";


    /**
     * Пол
     * 1 - мужской;
     * 2 - женский;
     *
     * @var int
     */
    protected $sex = 0;


    /**
     * Гражданство
     *
     * @var string
     */
    protected $nationality = "";


    /**
     * Название образовательного учреждения
     *
     * @var string
     */
    protected $educational_institution = "";


    /**
     * Номер класса, в котором учиться клиент
     *
     * @var int
     */
    protected $class = 0;


    /**
     * Адрес проживания
     *
     * @var string
     */
    protected $address = "";



    /**
     * Номер телефона
     *
     * @var string
     */
    protected $phone = "";


    /**
     * Дополнительный номер телефона
     *
     * @var string
     */
    protected $additional_phone = "";


    /**
     * Адрес электронной почты
     *
     * @var string
     */
    protected $email = "";


    /**
     * id студента (автора) заявки
     *
     * @var int
     */
    protected $user_id = 0;


    /**
     * id курса (олимпиады) на которую подана заявка
     *
     * @var int
     */
    protected $olympiad_id = 0;



    /**
     * Геттер для свойства surname (фамилия)
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }


    /**
     * Геттер для свойства name (имя)
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }


    /**
     * Геттер для свойства patronymic (отчество)
     *
     * @return string
     */
    public function getPatronymic()
    {
        return $this->patronymic;
    }


    /**
     * Геттер для свойства country (страна)
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }


    /**
     * Геттер для свойства city (город)
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }


    /**
     * Геттер для свойства sex (пол)
     *
     * @return int
     */
    public function getSex()
    {
        return intval( $this->sex );
    }


    /**
     * Геттер для свойства nationality (национальность)
     *
     * @return string
     */
    public function getNationality()
    {
        return $this->nationality;
    }


    /**
     * Геттер для свойства educational_institution (образовательное учреждение)
     *
     * @return string
     */
    public function getEducationalInstitution()
    {
        return $this->educational_institution;
    }


    /**
     * Геттер для свойства class (класс)
     *
     * @return int
     */
    public function getClass()
    {
        return intval( $this->class );
    }


    /**
     * Геттер для свойства address (адрес)
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }


    /**
     * Геттер для свойства phone (телефон)
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }


    /**
     * Геттер для свойства additional_phone (дополнительный номер телефона)
     *
     * @return string
     */
    public function getAdditionalPhone()
    {
        return $this->additional_phone;
    }


    /**
     * Геттер для свойства email (адрес электронной почты)
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }


    /**
     * Геттер для свойства user_id (id автора заявки)
     *
     * @return int
     */
    public function getUserId()
    {
        return intval( $this->user_id );
    }


    /**
     * Геттер для свойства olympiad_id (id курса/олимпиады, на которую подана заявка)
     *
     * @return int
     */
    public function getOlympiadId()
    {
        return intval( $this->olympiad_id );
    }


    /**
     * Сеттер для свойства surname
     *
     * @param $surname - фамилия
     * @return $this
     */
    public function setSurname( $surname )
    {
        $this->surname = strval( $surname );
        return $this;
    }


    /**
     * Сеттер для свойства name
     *
     * @param $name - имя
     * @return $this
     */
    public function setName( $name )
    {
        $this->name = strval( $name );
        return $this;
    }


    /**
     * Сеттер для свойства patronymic
     *
     * @param $patronymic - отчество
     * @return $this
     */
    public function setPatronymic( $patronymic )
    {
        $this->patronymic = strval( $patronymic );
        return $this;
    }


    /**
     * Сеттер для свойства country
     *
     * @param $country - страна
     * @return $this
     */
    public function setCountry( $country )
    {
        $this->country = strval( $country );
        return $this;
    }


    /**
     * Сеттер для свойства city
     *
     * @param $city - город
     * @return $this
     */
    public function setCity( $city )
    {
        $this->city = strval( $city );
        return $this;
    }


    /**
     * Сеттер для свойства sex
     *
     * @param $sex - пол
     * @return $this
     */
    public function setSex( $sex )
    {
        $this->sex = intval( $sex );
        return $this;
    }


    /**
     * Сеттер для свйоства nationality
     *
     * @param $nationality - национальность
     * @return $this
     */
    public function setNationality( $nationality )
    {
        $this->nationality = strval( $nationality );
        return $this;
    }


    /**
     * Сеттер для свойства educational_institution
     *
     * @param $educational_institution - название образовательного учреждения
     * @return $this
     */
    public function setEducationalInstitution( $educational_institution )
    {
        $this->educational_institution = strval( $educational_institution );
        return $this;
    }


    /**
     * Сеттер для свойства class
     *
     * @param $class - номер класса
     * @return $this
     */
    public function setClass( $class )
    {
        $this->class = intval( $class );
        return $this;
    }


    /**
     * Сеттер для свойства address
     *
     * @param $address - адрес проживания
     * @return $this
     */
    public function setAddress( $address )
    {
        $this->address = strval( $address );
        return $this;
    }


    /**
     * Сеттер для свойства phone
     *
     * @param $phone - номер телефона
     * @return $this
     */
    public function setPhone( $phone )
    {
        $this->phone = strval( $phone );
        return $this;
    }


    /**
     * Сеттер для свойства additional_phone
     *
     * @param $additional_phone - дополнительный номер телефона
     * @return $this
     */
    public function setAdditionalPhone( $additional_phone )
    {
        $this->additional_phone = strval( $additional_phone );
        return $this;
    }


    /**
     * Сеттер для свойства email
     *
     * @param $email - адрес электронной почты
     * @return $this
     */
    public function setEmail( $email )
    {
        $this->email = strval( $email );
        return $this;
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
     * Сеттер для свйоства olympiad_id
     *
     * @param $olympiad_id
     * @return $this
     */
    public function setOlympiadId( $olympiad_id )
    {
        $this->olympiad_id = intval( $olympiad_id );
        return $this;
    }


    /**
     * Преобразование названия свойства в название сеттера/геттера для него
     * Пример: PropTo( "educational_institution", Olympiad_Application::SETTER ) === "setEducationalInstitution";
     *
     * TODO: так как правило наименования свйоств моделей, столбцов в таблице и сеттеров/геттеров одинаково для всей системы то необходимо вынести эту функцию в Core_Entity или какой-то отдельный класс
     *
     * @param $propName - название свойства
     * @param $type     - тип преобразования: в название сеттера (self::SETTER) или геттера (self::GETTER)
     * @return string
     */
    public function PropTo( $propName, $type )
    {
        if( $type !== self::SETTER && $type !== self::GETTER )
            die( "Передан некорректный аргумент функции <b>PropTo</b>: " . strval( $type ) );

        $type === self::SETTER
            ?   $result = "set"
            :   $result = "get";

        foreach ( explode( "_", $propName ) as $word )
        {
            $result .= ucfirst( $word );
        }

        return $result;
    }


}