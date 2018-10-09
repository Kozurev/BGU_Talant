<?php
/**
 * Модель программы
 *
 * @author Bad Wolf
 * @date 11.09.2018 14:09
 */

class Program extends Core_Entity
{

    protected $tableRows = ["id", "title", "description", "price", "hours", "document_type", "code", "logo_id", "type_id", "form_id"];


    /**
     * Тип возвращаемого значения - массив идентификаторов
     *
     * @const string
     */
    const RETURN_ARR_ID = "id";


    /**
     * Тип возвращаемого значения - массив объектов
     *
     * @const string
     */
    const RETURN_ARR_OBJECT = "object";


    /**
     * Уникальный идентификатор программы
     *
     * @var int
     */
    protected $id;


    /**
     * Название программы
     *
     * @var string
     */
    protected $title = "";


    /**
     * Описание программы
     *
     * @var string
     */
    protected $description = "";


    /**
     * Стоимость
     *
     * @var float
     */
    protected $price = 0.0;


    /**
     * Объем часов
     *
     * @var int
     */
    protected $hours = 0;


    /**
     * Тип выдаваемого документа по окончанию курсов
     *
     * @var string
     */
    protected $document_type = "";


    /**
     * Код программы
     *
     * @var string
     */
    protected $code;


    /**
     * id логотипа программы
     *
     * @var int
     */
    protected $logo_id = 0;


    /**
     * id типа программы
     *
     * @var int
     */
    protected $type_id = 0;


    /**
     * id формы реализации программы
     *
     * @var int
     */
    protected $form_id = 0;


    /**
     * Объект типа программы
     *
     * @var Program_Type
     */
    protected $Type = null;


    /**
     * Объект формы проведения программы
     *
     * @var Program_Form
     */
    protected $Form = null;


    /**
     * Геттер уникального идентификатора
     *
     * @return int
     */
    public function getId()
    {
        return intval( $this->id );
    }


    /**
     * Геттер названия программы
     *
     * @return string
     */
    public function getTitle()
    {
        return strval( $this->title );
    }


    /**
     * Геттер описания программы
     *
     * @return string
     */
    public function getDescription()
    {
        return strval( $this->description );
    }


    /**
     * Геттер цены
     *
     * @return float
     */
    public function getPrice()
    {
        return floatval( $this->price );
    }


    /**
     * Геттер продолжительности программы в часах
     *
     * @return int
     */
    public function getHours()
    {
        return intval( $this->hours );
    }


    /**
     * Геттер типа выдаваемого документа
     *
     * @return string
     */
    public function getDocumentType()
    {
        return strval( $this->document_type );
    }


    /**
     * Геттер идентификатора логотипа (файла)
     *
     * @return int
     */
    public function getLogoId()
    {
        return intval( $this->logo_id );
    }


    /**
     * Геттер кода программы
     *
     * @return string
     */
    public function getCode()
    {
        return strval( $this->code );
    }


    /**
     * Геттер идентификатора типа программы
     *
     * @return int
     */
    public function getTypeId()
    {
        return intval( $this->type_id );
    }


    /**
     * Геттер идентификатора формы проведения программы
     *
     * @return int
     */
    public function getFormId()
    {
        return intval( $this->form_id );
    }


    /**
     * Сеттер названия программы
     *
     * @param $title
     * @return $this
     */
    public function setTitle( $title )
    {
        $this->title = strval( $title );
        return $this;
    }


    /**
     * Сеттер описания программы
     *
     * @param $description
     * @return $this
     */
    public function setDescription( $description )
    {
        $this->description = strval( $description );
        return $this;
    }


    /**
     * Сеттер цены
     *
     * @param $price
     * @return $this
     */
    public function setPrice( $price )
    {
        $this->price = floatval( $price );
        return $this;
    }


    /**
     * Сеттер продолжительности программы в часах
     *
     * @param $hours
     * @return $this
     */
    public function setHours( $hours )
    {
        $this->hours = intval( $hours );
        return $this;
    }


    /**
     * Сеттер типа выдаваемого документа
     *
     * @param $document_type
     * @return $this
     */
    public function setDocumentType( $document_type )
    {
        $this->document_type = strval( $document_type );
        return $this;
    }


    /**
     * Сеттер кода программы
     *
     * @param $code
     * @return $this
     */
    public function setCode( $code )
    {
        $this->code = strval( $code );
        return $this;
    }


    /**
     * Сеттер идентификатора логотипа (файла) программы
     *
     * @param $logo_id
     * @return $this
     */
    public function setLogoId( $logo_id )
    {
        $this->logo_id = intval( $logo_id );
        return $this;
    }


    /**
     * Сеттер идентификатора типа программы
     *
     * @param $type_id
     * @return $this
     */
    public function setTypeId( $type_id )
    {
        $this->type_id = intval( $type_id );
        return $this;
    }


    /**
     * Сеттер идентификатора формы проведения программы
     *
     * @param $form_id
     * @return $this
     */
    public function setFormId( $form_id )
    {
        $this->form_id = intval( $form_id );
        return $this;
    }


    public function save()
    {
        Core::notify( array(&$this), "beforeProgramSave" );
        parent::save();
        Core::notify( array(&$this), "afterProgramSave" );
    }


    public function delete()
    {
        Core::notify( array(&$this), "beforeProgramDelete" );
        parent::delete();
        Core::notify( array(&$this), "afterProgramDelete" );
    }


    /**
     * Добавление связи программы с курсом
     *
     * @param $course_id - id курса
     * @return $this
     */
    public function appendCourseAssignment( $course_id )
    {
        if( $this->id === null )    return $this;

        $Assignment = Core::factory( "Program_Course_Assignment" )
            ->where( "program_id", "=", $this->id )
            ->where( "course_id", "=", intval( $course_id ) )
            ->find();

        if( $Assignment === false )
        {
            Core::factory( "Program_Course_Assignment" )
                ->setProgramId( $this->id )
                ->setCourseId( intval( $course_id ) )
                ->save();
        }

        return $this;
    }


    /**
     * Поиск связей программы с курсами
     *
     * @param string $returnType - тип возвращаемого значения
     * @return array
     */
    public function getCourseAssignments( $returnType = self::RETURN_ARR_OBJECT )
    {
        if( $this->id === null )    return [];

        $Assignments = Core::factory( "Program_Course_Assignment" )
            ->queryBuilder()
            ->where( "program_id", "=", $this->id )
            ->findAll();

        if( $returnType === self::RETURN_ARR_OBJECT )   return $Assignments;

        if( $returnType === self::RETURN_ARR_ID )
        {
            $output = [];
            foreach ( $Assignments as $assignment ) $output[] = $assignment->getId();
            return $output;
        }

        return [];
    }


    /**
     * Поиск периодов проведения, принадлежащих программе
     *
     * @param string $returnType - тип возвращаемого значения
     * @return array
     */
    public function getPeriods( $returnType = self::RETURN_ARR_OBJECT )
    {
        if( $this->id === null )    return [];

        $Periods = Core::factory( "Program_Period" )
            ->queryBuilder()
            ->where( "program_id", "=", $this->id )
            ->findAll();

        if( $returnType === self::RETURN_ARR_OBJECT )   return $Periods;

        if( $returnType === self::RETURN_ARR_ID )
        {
            $output = [];
            foreach ( $Periods as $period ) $output[] = $period->getId();

            return $output;
        }

        return [];
    }


    /**
     * Подписка пользователя на все курсы связанные с программой
     *
     * @param $userId - id пользователя, который подписывается на программу
     */
    public function subscribeUser( $userId )
    {
        if( !$this->id )    die( "Невозможно подписать пользователя на несуществующую программу" );

        $ProgramCourseAssignments = Core::factory( "Program_Course_Assignment" )
            ->queryBuilder()
            ->where( "program_id", "=", $this->id )
            ->findAll();

        $User = Core::factory( "User", $userId );

        foreach ( $ProgramCourseAssignments as $assignment )
        {
            $User->courseSubscribe( $assignment->getCourseId(), 5 );
        }
    }


    /**
     * Получение объекта типа программы
     *
     * @return Program_Type
     */
    public function getType()
    {
//        if( $this->Type )   return $this->Type;
//        $this->Type = Core::factory( "Program_Type", $this->type_id );
//        if( $this->Type == false )  die("Тип программы с id = " . $this->type_id . " не существует");
//        return $this->Type;
        return Core::factory( "Program_Type", $this->type_id );
    }


    /**
     * Получение объекта формы проведения программы
     *
     * @return Program_Form
     */
    public function getForm()
    {
//        if( $this->Form )   return $this->Form;
//        $this->Form = Core::factory( "Program_Form", $this->form_id );
//        if( $this->Form == false )  die("Форма проведения программы с id = " . $this->form_id . " не существует");
//        return $this->Form;
        return Core::factory( "Program_Form", $this->form_id );
    }

}