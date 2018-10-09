<?php
/**
 * Форма проведения программы
 *
 * @author Bad Wolf
 * @date 26.09.2018 12:19
 */

class Program_Form extends Core_Entity
{

    /**
     * Список свойств, связанных с таблицей в БД
     *
     * @var array
     */
    protected $tableRows = ["id", "title"];


    /**
     * Уникальный идентификатор
     *
     * @var int
     */
    protected $id;


    /**
     * Название формы проведения
     *
     * @var string
     */
    protected $title = "";


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
     * Геттер для свойства title
     *
     * @return string
     */
    public function getTitle()
    {
        return strval( $this->title );
    }


    /**
     * Сеттер для свойства title
     *
     * @param $title
     * @return $this
     */
    public function setTitle( $title )
    {
        $this->title = strval( $title );
        return $this;
    }


}