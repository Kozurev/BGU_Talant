<?php
/**
 * Модель уровня образовательной программы или олимпиады
 *
 * @author Bad Wolf
 * @date 07.12.2018 11:28
 */
class Level extends Core_Entity
{

    /**
     * Указатель для получения значений, относящихся к программам
     *
     * @const string
     */
    CONST LVL_PROGRAM = 1;


    /**
     * Указатель для получения значений, относящихся к олимпиадам
     *
     * @const string
     */
    CONST LVL_OLYMPIAD = 2;


    /**
     * Список названий свойств, принадлежащих таблице в БД
     *
     * @var array
     */
    protected $tableRows = ["id", "title", "entity_id", "logo_id"];


    /**
     * Список сущьностей, id которой указывается в свойстве entity_id
     *
     * @var array
     */
    private static $entities = [
        1 => "Программы",
        2 => "Олимпиады"
    ];


    /**
     * Уникальный идентификатор
     *
     * @var int
     */
    protected $id;


    /**
     * Название уровня
     *
     * @var string
     */
    protected $title = "";


    /**
     * Номер сущьности.
     *  1 - уровень относиться к программе
     *  2 - уровень относиться к олимпиаде
     *
     * @var int
     */
    protected $entity_id = 0;


    /**
     * Логотип
     *
     * @var int
     */
    protected $logo_id = 0;


    public function getId()
    {
        return intval( $this->id );
    }


    public function getTitle()
    {
        return $this->title;
    }


    public function getEntityId()
    {
        return intval( $this->entity_id );
    }


    public function getLogoId()
    {
        return intval( $this->logo_id );
    }


    public function setTitle( $title )
    {
        $this->title = strval( $title );
        return $this;
    }


    public function setEntityId( $entity_id )
    {
        if( !in_array( $entity_id, [self::LVL_PROGRAM, self::LVL_OLYMPIAD] ) )
        {
            die( "Значение параметра entity_id должно быть равным 1 или 2" );
        }

        $this->entity_id = intval( $entity_id );
        return $this;
    }


    public function setLogoId( $logo_id )
    {
        $this->logo_id = intval( $logo_id );
        return $this;
    }


    /**
     * Геттер для списка сущьностей
     *
     * @date 10.12.18 13:04
     * @return array
     */
    public static function getEntities()
    {
        return self::$entities;
    }


    /**
     * Поиск всех уровней для олимпиад/программ
     *
     * @date 12.12.18 12:50
     * @param $type - одна из констант с префиксом "LVL_"
     * @return array
     */
    public static function getLevelsList( $type )
    {
        if( !in_array( $type, [self::LVL_PROGRAM, self::LVL_OLYMPIAD] ) )
        {
            die( "Значение параметра entity_id должно быть равным 1 или 2" );
        }

        return Core::factory( "Level" )
            ->queryBuilder()
            ->where( "entity_id", "=", $type )
            ->findAll();
    }


    /**
     * Получение названия сущьности по id: программы/олимпиады
     *
     * @date 10.12.18 12:55
     * @param $type - одна из констант с префиксом "LVL_"
     * @return string
     */
    public static function getEntityName( $type )
    {
        if( !in_array( $type, [self::LVL_PROGRAM, self::LVL_OLYMPIAD] ) )
        {
            die( "Значение параметра entity_id должно быть равным 1 или 2" );
        }

        return Core_Array::getValue( self::$entities, $type, "Неизвестная сущьность " . $type );
    }


    public function save( $obj = null )
    {
        Core::notify( array( &$this ), "beforeLevelSave" );
        parent::save();
        Core::notify( array( &$this ), "afterLevelSave" );
    }


    public function delete( $obj = null )
    {
        Core::notify( array( &$this ), "beforeLevelDelete" );
        parent::delete();
        Core::notify( array( &$this ), "afterLevelDelete" );
    }



}