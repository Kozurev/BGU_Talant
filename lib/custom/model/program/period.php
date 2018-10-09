<?php
/**
 * Модель периода
 *
 * @author Bad Wolf
 * @date 11.09.2018 17:53
 */

class Program_Period extends Core_Entity
{

    protected $tableRows = ["id", "date_start", "date_end", "visible_start", "visible_end", "program_id"];

    /**
     * Уникальный идентификатор
     *
     * @var int
     */
    protected $id;


    /**
     * Дата начала проведения программы
     *
     * @var string
     */
    protected $date_start;


    /**
     * Дата окончания проведения программы
     *
     * @var string
     */
    protected $date_end;


    /**
     * Дата начала видимости программы
     *
     * @var string
     */
    protected $visible_start;


    /**
     * Дата окончания видимости программы
     *
     * @var string
     */
    protected $visible_end;


    /**
     * id программы, которой принадлежит данный период
     *
     * @var int
     */
    protected $program_id = 0;


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
     * Геттер для свойства date_start
     *
     * @return string
     */
    public function getDateStart()
    {
        return strval( $this->date_start );
    }


    /**
     * Геттер для свойства date_end
     *
     * @return string
     */
    public function getDateEnd()
    {
        return strval( $this->date_end );
    }


    /**
     * Геттер для свойства visible_start
     *
     * @return string
     */
    public function getVisibleStart()
    {
        return strval( $this->visible_start );
    }


    /**
     * Геттер для свойства visible_end
     *
     * @return string
     */
    public function getVisibleEnd()
    {
        return strval( $this->visible_end );
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
     * Сеттер для свойства date_start
     *
     * @param $date_start
     * @return $this
     */
    public function setDateStart( $date_start )
    {
        $this->date_start = strval( $date_start );
        return $this;
    }


    /**
     * Сеттер для свойства date_end
     *
     * @param $date_end
     * @return $this
     */
    public function setDateEnd( $date_end )
    {
        $this->date_end = strval( $date_end );
        return $this;
    }


    /**
     * Сеттер для свойства visible_start
     *
     * @param $visible_start
     * @return $this
     */
    public function setVisibleStart( $visible_start )
    {
        $this->visible_start = strval( $visible_start );
        return $this;
    }


    /**
     * Сеттер для свойства visible_end
     *
     * @param $visible_end
     * @return $this
     */
    public function setVisibleEnd( $visible_end )
    {
        $this->visible_end = strval( $visible_end );
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


    public function save()
    {
        Core::notify( array(&$this), "beforeProgramPeriodSave" );
        parent::save();
        Core::notify( array(&$this), "afterProgramPeriodSave" );
    }


    public function delete()
    {
        Core::notify( array(&$this), "beforeProgramPeriodDelete" );
        parent::delete();
        Core::notify( array(&$this), "afterProgramPeriodDelete" );
    }






}