<?php
/**
*
*/ 
class Core //extends Orm
{

    //private $aStrings;
    static private $observers = [];



    /**
     * Создание обработчика для наблюдателя
     *
     * @param $action - название события
     * @param $function - обрабтчик для данного события
     */
    static public function attachObserver( $action, $function )
    {
        Core::$observers[$action][] = $function;
    }


    /**
     * Удаление последнего добавленного обработчика наблюдателя
     *
     * @param $action - название действия
     */
    static public function detachObserver( $action )
    {
        foreach ( Core::$observers as $name => $observers )
        {
            if ( $name == $action )
            {
                array_pop( Core::$observers[$name] );
                return;
            }
        }
    }


    /**
     * Данный метод устанавливается в месте срабатывания наблюдателя
     *
     * @param $args - аргумент для функции обработчика наблюдателя
     * @param $action - название действия
     */
    static public function notify( $args, $action )
    {
        foreach ( Core::$observers as $name => $observers )
        {
            if ( $name == $action )
            {
                foreach ( $observers as $function )
                {
                    $function( $args );
                }
            }
        }
    }


	/**
	*	Подключает необходимый файл и создаёт объект класса
	* 	@return mixed
	*/
	static public function factory( $className, $id = 0 )
	{
		//Формирование пути к файлу класса
		$segments = explode( "_", $className );
		$model = $className . "_Model";
		$filePath = ROOT . "/model";
		$obj = null;

		foreach ( $segments as $segment )
        {
            $filePath .= "/" . lcfirst( $segment );
        }


		if ( TEST_MODE_FACTORY )
		{
			echo "<br>FilePath: " . $filePath . ".php";
			echo "<br>FilePath: " . $filePath . "/model.php";
			echo "<br>ClassName: " . $className;
			echo "<br>ClassName: " . $className . "_Model";
		}

		//Подключение модели
		if ( file_exists( $filePath . "/model.php" ) && !class_exists( $className . "_Model") )
		{
			 include_once $filePath . "/model.php";
		}

		//Подключение файла с методами
		if ( file_exists( $filePath . ".php" ) && !class_exists( $className ) )
		{
			 include_once $filePath . ".php";
		}
		
		//Создание объекта класса
		if ( class_exists( $className ) )
        {
            $obj = new $className;
        }
		else
        {
            return null;
        }


		//Если был передан id тогда формируем условия поиска конкретного объекта
		//или возвращаем пустой объект 
		if ( is_numeric( $id ) && intval( $id ) !== 0 )
		{
			return $obj->queryBuilder()
				->where( "id", "=", $id )
				->find();
		}
		else 
        {
            return $obj;
        }
	}


    /**
     * Получение значения часто используемой строки
     * @param $sMessageName - назавние строки
     * @param $aMessageParams - параметры, передаваемые в строку
     * @return string
     */
    public static function getMessage($sMessageName, $aMessageParams = [])
    {
        ini_set('display_errors','Off');
        $aStrings = include ROOT . "/config/messages/ru/messages.php";

        if(isset($aStrings[$sMessageName]))
        {
            echo $aStrings[$sMessageName];
        }
        else
        {
            echo $aStrings["UNDEFIND_STRING_NAME"];
        }

        ini_set('display_errors','On');
    }


    public static function unchanged($val)
    {
        $result = new stdClass;
        $result->type = "unchanged";
        $result->val = $val;
        return $result;
    }





}