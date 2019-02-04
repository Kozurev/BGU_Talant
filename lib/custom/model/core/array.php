<?php
/**
 * Класс для работы с массивами
 *
 * @author Bad Wolf
 * @date 20.03.2018 16:03
 */

class Core_Array
{
    /**
     * Получение значения элемента из массива по ключу
     *
     * @param $arr - исходный массив
     * @param $key - ключь
     * @param $default - значение по умолчанию
     * @return mixed
     */
    public static function getValue( $arr, $key, $default )
    {
        if( isset( $arr[$key] ) && $arr[$key] != "" )
        {
            return $arr[$key];
        }
        else return $default;
    }


    /**
     * Метод для получения значения из массива $_GET
     *
     * @param $key - ключь
     * @param $default - значение по умолчанию
     * @return mixed
     */
    public static function Get( $key, $default )
    {
        return self::getValue( $_GET, $key, $default );
    }


    /**
     * Метод для получения значения из массива $_POST
     *
     * @param $key - ключь
     * @param $default - значение по умолчанию
     * @return mixed
     */
    public static function Post( $key, $default )
    {
        return self::getValue( $_POST, $key, $default );
    }


    /**
     * @param $key
     * @param $default
     * @return mixed
     */
    public static function getRequest( $key, $default )
    {
        return self::getValue( $_REQUEST, $key, $default );
    }


    /**
     * Получение значения из массива $_FILES
     *
     * @param $key - ключ массива
     * @param $default - возвращаемое значение, если не существует в массиве элемент с переданным ключем
     * @return mixed
     */
    public static function File( $key, $default )
    {
        return self::getValue( $_FILES, $key, $default );
    }


    /**
     * Получение значения из массива $_SESSION
     *
     * @param $key - ключ массива
     * @param $default - возвращаемое значение, если не существует в массиве элемент с переданным ключем
     * @return mixed
     */
    public static function Session( $key, $default )
    {
        return self::getValue( $_SESSION, $key, $default );
    }

}