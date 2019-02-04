<?php
/**
 * Файл с функциями, дуступными во всем решении
 *
 * @author Bad Wolf
 * @date 22.08.2018 14:44
 */



/**
 * Функция, использующаяся для получения информации об переменной в нормальном виде
 *
 * @param $var - переменная, о которой необходимо получить инормацию
 * @param int $type = 0 ? общая информация : полная информация;
 */
function debug( $var, $type = 0 )
{
    echo "<pre>";
    $type === 0
        ?   print_r( $var )
        :   var_dump( $var );
    echo "</pre>";
}


/**
 * Получение название месяца по его номеру в именительном / родительном падеже
 *
 * @param int $month - номер месяца от 1 до 12
 * @param int $type - падеж: 0 - именительный; 1 - родительный;
 * @return string
 */
function getMonthName( $month, $type = 0 )
{
    if( $month <= 0 || $month > 12 )
    {
        die( "Параметр 'month' должен быть в диапазоне от 1 до 12 включительно" );
    }

    if( !in_array( $type, [0, 1] ) )
    {
        die( "Параметр 'type' должен быть равен '1' или '2'" );
    }

    $monthes[0] = ["январь", "февраль", "март", "апрель", "май", "июнь", "июль", "август", "сентябрь", "октябрь", "ноябрь", "декабрь"];
    $monthes[1] = ["января", "февраля", "марта", "апреля", "майя", "июня", "июля", "августа", "сентября", "октября", "ноября", "декабря"];

    return $monthes[ $type ][ $month - 1 ];
}


/**
 * Получение значения начала и конец текущего обучающегося года, к примеру: 2018-2019
 *
 * @param string $delimiter
 * @return string
 */
function getCurrentAcademicalYear( $delimiter = "-" )
{
    $year = date( "Y" );
    $month = date( "m" );

    if( $month < 9 )
    {
        return strval( $year - 1 ) . $delimiter . strval( $year );
    }
    else
    {
        return strval( $year ) . $delimiter . strval( $year + 1 );
    }
}


/**
 * Преобразовывает строку из snake_case в camelCase
 *
 * @param string $convertingString
 * @return string
 */
function toCamelCase( $convertingString )
{
    $return = '';
    $words = explode( '_', $convertingString );

    foreach ( $words as $word )
    {
        $return .= ucfirst( $word );
    }

    return lcfirst( $return );
}