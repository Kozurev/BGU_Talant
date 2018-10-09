<?php

/**
 * Данный класс предполагал реализацию в нем часто-используемых статичных системных методов, таких как:
 * Фабрика (factory)
 * Наблюдатели (attachObserver, detachObserver и notify)
 * Возвращение "статичной" строки с параметрами (getMessage)
 * Костыль для ORM (unchanged)
 *
 * @author: Bad Wolf
 * @date: 07.09.2018 16:25
 */
class Core
{
    static private $observers = array();

    /**
     * Создание обработчика для наблюдателя
     * @param $action - название действия
     * @param $function - обрабтчик для данного действия
     */
    static public function attachObserver($action, $function)
    {
        if(isset(Core::$observers[$action]))
            Core::$observers[$action][] = $function;
        else
            Core::$observers[$action][] = $function;
    }


    /**
     * Удаление последнего добавленного обработчика наблюдателя
     * @param $action - название действия
     */
    static public function detachObserver($action)
    {
        foreach (Core::$observers as $name => $observers)
            if($name == $action)
                array_pop(Core::$observers[$name]);
    }


    /**
     * Данный метод устанавливается в месте срабатывания наблюдателя
     * @param $args - аргументы для функции обработчика наблюдателя
     * @param $action - название действия
     */
    static public function notify($args, $action)
    {
        foreach (Core::$observers as $name => $observers)
            if($name == $action)
                foreach ($observers as $name => $function)
                {
                    $func = $function;
                    $func($args);
                }
    }


	/**
	 * Подключает необходимый файл и создаёт объект класса
	 * @return object or false
	 */
	static public function factory($className, $id = 0)
	{
		//Формирование пути к файлу класса
		$segments = explode("_", $className);
		$model = $className . "_Model";
		$filePath = ROOT."/model";
		$obj = null;

		foreach ($segments as $segment)
			$filePath .= "/".lcfirst($segment);

		if(TEST_MODE_FACTORY)
		{
			echo "<br>FilePath: ".$filePath.".php";
			echo "<br>FilePath: ".$filePath."/model.php";
			echo "<br>ClassName: ".$className;
			echo "<br>ClassName: ".$className."_Model";
		}

		//Подключение модели
		if(file_exists($filePath."/model.php") && !class_exists($className."_Model"))
		{
			 include_once $filePath."/model.php";
		}

		//Подключение файла с методами
		if(file_exists($filePath.".php") && !class_exists($className))
		{
			 include_once $filePath.".php";
		}
		
		//Создание объекта класса
		if(class_exists($className))
			$obj = new $className;
		else
			return false;

		//Если был передан id тогда формируем условия поиска конкретного объекта
		//или возвращаем пустой объект 
		if(is_numeric($id) && $id != 0)
		{
			return $obj->queryBuilder()
				->where("id", "=", "$id")
				->find();
		}
		else 
			return $obj;

	}


    /**
     * Получение значения часто используемой строки
     * @param $sMessageName - назавние строки
     * @param $aMessageParams - параметры, передаваемые в строку
     */
//    public static function getMessage($sMessageName, $aMessageParams)
//    {
//        ini_set('display_errors','Off');
//        $aStrings = include ROOT . "/config/messages/ru/messages.php";
//
//        if(isset($aStrings[$sMessageName]))
//        {
//            echo $aStrings[$sMessageName];
//        }
//        else
//        {
//            echo $aStrings["UNDEFIND_STRING_NAME"];
//        }
//
//        ini_set('display_errors','On');
//    }


    /**
     * Метод (костыль!) для работы с ORM.
     * Отменяет обертывание передаваемого значения в кавычки
     *
     * @param $val
     * @return stdClass
     */
    public static function unchanged($val)
    {
        $result = new stdClass;
        $result->type = "unchanged";
        $result->val = $val;
        return $result;
    }





}