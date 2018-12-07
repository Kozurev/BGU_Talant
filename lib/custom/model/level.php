<?php
/**
 * Модель уровня образовательной программы или олимпиады
 *
 * @author Bad Wolf
 * @date 07.12.2018 11:28
 */
class Level
{

    /**
     * Указатель для получения значений, относящихся к программам
     *
     * @const string
     */
    CONST LVL_PROGRAM = "program";


    /**
     * Указатель для получения значений, относящихся к олимпиадам
     *
     * @const string
     */
    CONST LVL_OLYMPIAD = "olympiad";


    /**
     * Массив названий уровней олимпиад и программ
     *
     * @var array
     */
    private $levels = [

        self::LVL_PROGRAM => [
            1 => "Подготовка к ЕГЭ",
            2 => "Подготовка к внутренним испытаниям вуза",
            3 => "Летние экспрес-курсы"
        ],

        self::LVL_OLYMPIAD => [
            1 => "МПОШ НИУ «БелГУ»",
            2 => "«Высшая проба»",
            3 => "Инженерная олимпиада по физике"
        ]

    ];


    /**
     * Метод получения названия уровня программы или олимпиады из статического списка
     *
     * @param $id - id уровня (значение свойства level_id у объекта олимпиады или программы)
     * @param $type - тип объекта для которого получается значение - одна из констант с префиксом LVL_
     * @return string
     */
    public function getLevelName( $id, $type )
    {
        if( !in_array( $type, [self::LVL_PROGRAM, self::LVL_OLYMPIAD] ) )
        {
            die( "В качестве аргумента метода getLevelName был передан неизвестный тип - " . $type );
        }

        return Core_Array::getValue( $this->levels[$type], $id, "" );
    }


    /**
     * Получение списка уровней сложности программ или олимпиад
     *
     * @param $type - тип объекта для которого получается значение - одна из констант с префиксом LVL_
     * @return array
     */
    public function getLevelsList( $type )
    {
        if( !in_array( $type, [self::LVL_PROGRAM, self::LVL_OLYMPIAD] ) )
        {
            die( "В качестве аргумента метода getLevelList был передан неизвестный тип - " . $type );
        }

        return Core_Array::getValue( $this->levels, $type, null );
    }


}