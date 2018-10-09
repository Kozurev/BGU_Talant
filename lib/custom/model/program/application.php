<?php
/**
 * Модель заявки записи на программу
 *
 * @author Bad Wolf
 * @date 14.09.2018 17:08
 */

class Program_Application extends Core_Entity
{

    /**
     * Список типов устанавливаемых/возвращаемых значений
     *
     * @var array
     */
    private $types = [1, 2];


    /**
     * Потребитель
     */
    const TYPE_CONSUMER = 1;


    /**
     * Заказчик
     */
    const TYPE_CLIENT = 2;


    /**
     * Список наименований столбцов таблицы в БД
     *
     * @var array
     */
    protected $tableRows = ["id", "user_id", "period_id", "surname1", "surname2", "surname11", "surname12", "name1", "name2", "name11", "name12",
        "patronymic1", "patronymic2", "patronymic11", "patronymic12", "birthday1", "birthday2", "address1", "address2", "passport_number1", "passport_number2",
        "passport_author1", "passport_author2", "passport_date1", "passport_date2", "phone1", "phone2"];


    /**
     * Уникальный идентификатор заявки
     *
     * @var int
     */
    protected $id;


    /**
     * id пользователя (автора заявки)
     *
     * @var int
     */
    protected $user_id = 0;


    /**
     * id программы, к которой прикреплена заявка
     *
     * @var int
     */
    protected $period_id = 0;


    /**
     * Фамилия потребителя в именительном падеже
     *
     * @var string
     */
    protected $surname1 = "";


    /**
     * Фамилия потребителя в родительном падеже
     *
     * @var string
     */
    protected $surname11 = "";


    /**
     * Фамилия заказчика в именительном падеже
     *
     * @var string
     */
    protected $surname2 = "";


    /**
     * Фамилия заказчика в родительном падеже
     *
     * @var string
     */
    protected $surname12 = "";


    /**
     * Имя потребителя в именительном падеже
     *
     * @var string
     */
    protected $name1 = "";


    /**
     * Имя потребителя в родительном падеже
     *
     * @var string
     */
    protected $name11 = "";


    /**
     * Имя заказчика в именительном падеже
     *
     * @var string
     */
    protected $name2 = "";


    /**
     * Имя заказчика в именительном падеже
     *
     * @var string
     */
    protected $name12 = "";


    /**
     * Отчество потребителя в именительном падеже
     *
     * @var string
     */
    protected $patronymic1 = "";


    /**
     * Отчество потребителя в именительном падеже
     *
     * @var string
     */
    protected $patronymic11 = "";


    /**
     * Отчество заказчика в именительном падеже
     *
     * @var string
     */
    protected $patronymic2 = "";


    /**
     * Отчество заказчика в родительном падеже
     *
     * @var string
     */
    protected $patronymic12 = "";


    /**
     * Дата рождения потребителя
     *
     * @var string
     */
    protected $birthday1 = "";


    /**
     * Дата рождения заказчика
     *
     * @var string
     */
    protected $birthday2 = "";


    /**
     * Адрес по прописке потребителя
     *
     * @var string
     */
    protected $address1 = "";


    /**
     * Адрес по прописке заказчика
     *
     * @var string
     */
    protected $address2 = "";


    /**
     * Серия и номер паспорта потребителя
     *
     * @var string
     */
    protected $passport_number1 = "";


    /**
     * Серия и номер паспорта заказчика
     *
     * @var string
     */
    protected $passport_number2 = "";


    /**
     * Кем выдан паспорт потребителя
     *
     * @var string
     */
    protected $passport_author1 = "";


    /**
     * Кем выдан паспорт заказчика
     *
     * @var string
     */
    protected $passport_author2 = "";


    /**
     * Дата выдачи паспорта потребителя
     *
     * @var string
     */
    protected $passport_date1 = "";


    /**
     * Дата выдачи паспорта заказчика
     *
     * @var string
     */
    protected $passport_date2 = "";


    /**
     * Контактный номер телефона потребителя
     *
     * @var string
     */
    protected $phone1 = "";


    /**
     * Контактный номер телефона заказчика
     *
     * @var string
     */
    protected $phone2 = "";


    /**
     * Объект периода программы
     *
     * @var null|Program_Period
     */
    protected $Period = null;


    /**
     * Объект программы
     *
     * @var null|Program
     */
    protected $Program = null;


    /**
     * Объект пользователя
     *
     * @var null
     */
    protected $User = null;


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
    public function getPeriodId()
    {
        return intval( $this->period_id );
    }


    /**
     * Геттер для фамилии заказчика/потребителя в именительном падеже
     *
     * @param $type - тип получаемого свойства заказчик/потребитель
     * @return string
     */
    public function getSurname( $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "surname" . $type;
        return strval( $this->$propertyName );
    }


    /**
     * Геттер для фамилии заказчика/потребителя в родительном падеже
     *
     * @param $type - тип получаемого свойства заказчик/потребитель
     * @return string
     */
    public function getSurname1( $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "surname1" . $type;
        return strval( $this->$propertyName );
    }


    /**
     * Геттер для имени заказчика/потребителя в именительном падеже
     *
     * @param $type - тип получаемого свойства заказчик/потребитель
     * @return string
     */
    public function getName( $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "name" . $type;
        return strval( $this->$propertyName );
    }


    /**
     * Геттер имени заказчика/потребителя в родительном падеже
     *
     * @param $type - тип получаемого свойства заказчик/потребитель
     * @return string
     */
    public function getName1( $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "name1" . $type;
        return strval( $this->$propertyName );
    }


    /**
     * Геттер для отчества заказчика/потребителя в именительном падеже
     *
     * @param $type - тип получаемого свойства заказчик/потребитель
     * @return string
     */
    public function getPatronymic( $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "patronymic" . $type;
        return strval( $this->$propertyName );
    }


    /**
     * Геттер для отчества заказчика/потребителя в родительном падеже
     *
     * @param $type - тип получаемого свойства заказчик/потребитель
     * @return string
     */
    public function getPatronymic1( $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "patronymic1" . $type;
        return strval( $this->$propertyName );
    }


    /**
     * Геттер для свойства birthday 1|2
     *
     * @param $type - тип получаемого свойства заказчик/потребитель
     * @return string
     */
    public function getBirthday( $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "birthday" . $type;
        return strval( $this->$propertyName );
    }


    /**
     * Геттер для свойства address 1|2
     *
     * @param $type - тип получаемого свойства заказчик/потребитель
     * @return string
     */
    public function getAddress( $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "address" . $type;
        return strval( $this->$propertyName );
    }


    /**
     * Геттер для свойства passport_number 1|2
     *
     * @param $type - тип получаемого свойства заказчик/потребитель
     * @return string
     */
    public function getPassportNumber( $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "passport_number" . $type;
        return strval( $this->$propertyName );
    }


    /**
     * Геттер для свойства passport_author 1|2
     *
     * @param $type - тип получаемого свойства заказчик/потребитель
     * @return string
     */
    public function getPassportAuthor( $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "passport_author" . $type;
        return strval( $this->$propertyName );
    }


    /**
     * Геттер для свойства passport_date 1|2
     *
     * @param $type - тип получаемого свойства заказчик/потребитель
     * @return string
     */
    public function getPassportDate( $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "passport_date" . $type;
        return strval( $this->$propertyName );
    }


    /**
     * Геттер для свойства phone 1|2
     *
     * @param $type - тип получаемого свойства заказчик/потребитель
     * @return string
     */
    public function getPhone( $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "phone" . $type;
        return strval( $this->$propertyName );
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
     * Сеттер для свойства period_id
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
     * Сеттер для фамилии заказчика/потребителя в именительном падеже
     *
     * @param $surname
     * @param $type
     * @return $this
     */
    public function setSurname( $surname, $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "surname" . $type;
        $this->$propertyName = strval( $surname );
        return $this;
    }


    /**
     * Сеттер для фамилии заказчика/потребителя в родительном падеже
     *
     * @param $surname
     * @param $type
     * @return $this
     */
    public function setSurname1( $surname, $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "surname1" . $type;
        $this->$propertyName = strval( $surname );
        return $this;
    }


    /**
     * Сеттер для имени заказчика/потребителя в именительном падеже
     *
     * @param $name
     * @param $type - тип устанавливаемого значения заказчик/потребитель
     * @return $this
     */
    public function setName( $name, $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "name" . $type;
        $this->$propertyName = strval( $name );
        return $this;
    }


    /**
     * Сеттер для имени заказчика/потребителя в родительном падеже
     *
     * @param $name
     * @param $type - тип устанавливаемого значения заказчик/потребитель
     * @return $this
     */
    public function setName1( $name, $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "name1" . $type;
        $this->$propertyName = strval( $name );
        return $this;
    }


    /**
     * Сеттер для отчества заказчика/потребителя в именительном падеже
     *
     * @param $patronymic
     * @param $type - тип устанавливаемого значения заказчик/потребитель
     * @return $this
     */
    public function setPatronymic( $patronymic, $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "patronymic" . $type;
        $this->$propertyName = strval( $patronymic );
        return $this;
    }


    /**
     * Сеттер для отчества заказчика/потребителя в родительном падеже
     *
     * @param $patronymic
     * @param $type - тип устанавливаемого значения заказчик/потребитель
     * @return $this
     */
    public function setPatronymic1( $patronymic, $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "patronymic1" . $type;
        $this->$propertyName = strval( $patronymic );
        return $this;
    }


    /**
     * Сеттер для свойства birthday
     *
     * @param $birthday
     * @param $type - тип устанавливаемого значения заказчик/потребитель
     * @return $this
     */
    public function setBirthday( $birthday, $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "birthday" . $type;
        $this->$propertyName = strval( $birthday );
        return $this;
    }


    /**
     * Сеттер для свойства address
     *
     * @param $address
     * @param $type - тип устанавливаемого значения заказчик/потребитель
     * @return $this
     */
    public function setAddress( $address, $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "address" . $type;
        $this->$propertyName = strval( $address );
        return $this;
    }


    /**
     * Сеттер для свйоства passport_number
     *
     * @param $passport_number
     * @param $type - тип устанавливаемого значения заказчик/потребитель
     * @return $this
     */
    public function setPassportNumber( $passport_number, $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "passport_number" . $type;
        $this->$propertyName = strval( $passport_number );
        return $this;
    }


    /**
     * Сеттер для свойства passport_author
     *
     * @param $passport_author
     * @param $type - тип устанавливаемого значения заказчик/потребитель
     * @return $this
     */
    public function setPassportAuthor( $passport_author, $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "passport_author" . $type;
        $this->$propertyName = strval( $passport_author );
        return $this;
    }


    /**
     * Сеттер для свойства passport_date
     *
     * @param $passport_date
     * @param $type - тип устанавливаемого значения заказчик/потребитель
     * @return $this
     */
    public function setPassportDate( $passport_date, $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "passport_date" . $type;
        $this->$propertyName = strval( $passport_date );
        return $this;
    }


    /**
     * Сеттер для свйоства phone
     *
     * @param $phone
     * @param $type - тип устанавливаемого значения заказчик/потребитель
     * @return $this
     */
    public function setPhone( $phone, $type )
    {
        if( !in_array( $type, $this->types ) )  die("Свойства такого типа не существует");
        $propertyName = "phone" . $type;
        $this->$propertyName = strval( $phone );
        return $this;
    }


    public function getUser()
    {
        if( $this->User )   return $this->User;

        if( !$this->user_id )   die( "Свойство user_id не установлено или установлено некорректно" );

        $this->User = Core::factory( "User", $this->user_id );
        if( $this->User === false ) die( "Пользователя с id = " . $this->user_id . " не существует" );

        return $this->User;
    }


    public function getPeriod()
    {
        if( $this->Period )    return $this->Period;

        if( !$this->period_id ) die( "Свойство period_id не установлено или установлено некорректно" );

        $this->Period = Core::factory( "Program_Period", $this->period_id );
        if( $this->Period === false )   die( "Периода с id = " . $this->period_id . " не существует" );

        return $this->Period;
    }


    /**
     * Получение объекта программы которой принадлежит заявка
     *
     * @return object of Program class
     */
    public function getProgram()
    {
        if( $this->Program )   return $this->Program;

        if( !$this->period_id ) die( "Заявка не привязана ни к одной обучающей программе" );

        if( $this->Period === null )
        {
            $this->Period = Core::factory( "Program_Period", $this->period_id );
            if( $this->Period === false ) die( "Периода проведения рпограммы с id = $this->period_id, к которому привязана заявка не существует" );
        }

        $this->Program = Core::factory( "Program", $this->Period->getProgramId() );
        if( $this->Program === false )die( "Программы с id = " . $this->Period->getProgramId() . " не существует" );

        return $this->Program;
    }




    public function save()
    {
        Core::notify( array(&$this), "beforeProgramApplicationSave" );
        parent::save();
        Core::notify( array(&$this), "afterProgramApplicationSave" );
    }


    public function delete()
    {
        Core::notify( array(&$this), "beforeProgramApplicationDelete" );
        parent::delete();
        Core::notify( array(&$this), "afterProgramApplicationDelete" );
    }


}