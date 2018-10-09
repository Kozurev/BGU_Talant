<?php
/**
 * Модель типа программы
 *
 * @author Kozurev Egor
 * @date 11.09.2018 15:35
 */

class Program_Type extends Core_Entity
{

    /**
     * Уникальный идентификатор
     *
     * @var int
     */
    protected $id;


    /**
     * Сокращенное название
     *
     * @var string
     */
    protected $short_name;


    /**
     * Полное название
     *
     * @var string
     */
    protected $full_name;


    /**
     * Геттер для свйоства id
     *
     * @return int
     */
    public function getId()
    {
        return intval( $this->id );
    }


    /**
     * Геттер для свойства short_name
     *
     * @return int
     */
    public function getShortName()
    {
        return strval( $this->short_name );
    }


    /**
     * Геттер для свойства full_name
     *
     * @return int
     */
    public function getFullName()
    {
        return strval( $this->full_name );
    }


    /**
     * Сеттер для свойства short_name
     *
     * @param string $short_name
     * @return $this
     */
    public function setShortName( $short_name )
    {
        $this->short_name = strval( $short_name );
        return $this;
    }


    /**
     * Сеттер для свойства full_name
     *
     * @param string $full_name
     * @return $this
     */
    public function setFullName( $full_name )
    {
        $this->full_name = strval( $full_name );
        return $this;
    }



}