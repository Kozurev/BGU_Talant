<?php
/**
 * Класс для работы с массивами, в том числе $_GET, $_POST, $_FILES и $_SESSION
 *
 * @author: Bad Wolf
 * @date 07.09.2018 18:14
 */
class Core_Array
{

    /**
     * Получение значения из массива
     *
     * @param $arr - исходный массив
     * @param $key - ключ массива
     * @param $default - возвращаемое значение, если не существует в массиве элемент с переданным ключем
     * @return mixed
     */
    public static function getValue($arr, $key, $default)
    {
        if(isset($arr[$key]) && $arr[$key] != "")
        {
            return $arr[$key];
        }
        else return $default;
    }


    /**
     * Получение значения из массива $_GET
     *
     * @param $key - ключ массива
     * @param $default - возвращаемое значение, если не существует в массиве элемент с переданным ключем
     * @return mixed
     */
    public static function Get( $key, $default )
    {
        return self::getValue( $_GET, $key, $default );
    }


    /**
     * Получение значения из массива $_POST
     *
     * @param $key - ключ массива
     * @param $default - возвращаемое значение, если не существует в массиве элемент с переданным ключем
     * @return mixed
     */
    public static function Post( $key, $default )
    {
        return self::getValue( $_POST, $key, $default );
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


    /**
     * Получение значения, передаваемого из формы любым методом, по названию ключа
     *
     * @param $key - название ключа
     * @param $default - значение по умолчанию
     * @return mixed
     */
    public static function getRequest( $key, $default )
    {
        if( self::Get( $key, null ) !== null )
        {
            return self::Get( $key, $default );
        }
        elseif( self::Post( $key, null ) !== null )
        {
            return self::Post( $key, $default );
        }
        elseif( self::File( $key, null ) !== null )
        {
            return self::File( $key, $default );
        }
        else
        {
            return $default;
        }
    }

}