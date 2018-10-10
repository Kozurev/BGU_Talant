<?php

/**
 * Класс подключения к БД средствами PDO
 * Реализация шаблона проектирования Singleton, что запрещает создавать одновременно несколько подключений
 *
 * Class Core_Database
 * @author Bad Wolf
 * @date 07.09.2018 14:12
 */
class Core_Database
{
	private static $db = null;

	private function __clone(){}
	private function __construct(){}

    public static function getConnect()
	{
		if( self::$db === null )
        {
            global $CFG;
            $pdoString = "mysql:";
            $pdoString .= "host=$CFG->dbhost;";
            $pdoString .= "dbname=" . $CFG->dbname;
            self::$db = new PDO( $pdoString, $CFG->dbuser, $CFG->dbpass );
            self::$db->query( "SET CHARSET UTF8" );
        }

        return self::$db;
	}

	
}
