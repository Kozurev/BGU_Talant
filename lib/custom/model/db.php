<?php

/**
 * Класс отвечающий за соединение с базой данных
 * Данные для соединения берутся из стандарного файла конфигурации /config.php
 * Данный класс реализован по принципу шаблона проектирования Singleton для избежания возможности
 * создания множественного подключения к базе данных
 *
 * Class DB
 */
class DB
{

    /**
     * Коннект к базе данных
     *
     * @var PDO
     */
	private static $_db = null;

	private function __construct(){}

    /**
	 * Метод для установления соединения с базой данных средствами драйвера PDO
     *
	 * @return PDO
	 */
	public static function instance()
	{
        if( self::$_db === null )
        {
            global $CFG;
            $pdoString = "mysql:";
            $pdoString .= "host=$CFG->dbhost;";
            $pdoString .= "dbname=" . $CFG->dbname;
            self::$_db = new PDO( $pdoString, $CFG->dbuser, $CFG->dbpass );
            self::$_db->query( "SET CHARSET UTF8" );
        }

        return self::$_db;
	}
}