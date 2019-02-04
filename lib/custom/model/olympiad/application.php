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
    protected $tableRows = ["id", "surname", "name", "patronymic", "country_id", "region_id", "city_id", "sex", "nationality_id", "educational_institution",
                            "class", "address", "phone", "additional_phone", "email", "user_id", "olympiad_id", "timestamp"];


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
     * id страны
     *
     * @var string
     */
    protected $country_id = 0;


    /**
     * id региона
     *
     * @var int
     */
    protected $region_id = 0;


    /**
     * id города
     *
     * @var string
     */
    protected $city_id = 0;


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
    protected $nationality_id = "";


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
     * Время создания заявки
     *
     * @var int
     */
    protected $timestamp = 0;


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
     * Геттер для свойства country_id (id страны)
     *
     * @return int
     */
    public function getCountryId()
    {
        return intval( $this->country_id );
    }


    /**
     * Геттер для свойства region_id (id региона)
     *
     * @return int
     */
    public function getRegionId()
    {
        return intval( $this->region_id );
    }


    /**
     * Геттер для свойства city_id (id города)
     *
     * @return string
     */
    public function getCityId()
    {
        return intval( $this->city_id );
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
     * Геттер для свойства nationality_id (национальность)
     *
     * @return string
     */
    public function getNationalityId()
    {
        return $this->nationality_id;
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


    public function getTimestamp()
    {
        return intval( $this->timestamp );
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
     * Сеттер для свойства country_id
     *
     * @param $country_id - id страны
     * @return $this
     */
    public function setCountryId( $country_id )
    {
        $this->country_id = intval( $country_id );
        return $this;
    }


    /**
     * Сеттер для свойства region_id
     *
     * @param $region_id - id региона
     * @return $this
     */
    public function setRegionId( $region_id )
    {
        $this->region_id = intval( $region_id );
        return $this;
    }


    /**
     * Сеттер для свойства city_id
     *
     * @param $city_id - id города
     * @return $this
     */
    public function setCityId( $city_id )
    {
        $this->city_id = intval( $city_id );
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
     * Сеттер для свйоства nationality_id
     *
     * @param $nationality_id - национальность
     * @return $this
     */
    public function setNationalityId( $nationality_id )
    {
        $this->nationality_id = strval( $nationality_id );
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
     * TODO: так как правило наименования свйоств моделей, столбцов в таблице и сеттеров/геттеров одинаково для все системы то необходимо вынести эту функцию в Core_Entity или какой-то отдельный класс
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


    public function save( $obj = null )
    {
        if( $this->getTimestamp() === 0 )
        {
            $this->timestamp = time();
        }

        parent::save();
    }


}