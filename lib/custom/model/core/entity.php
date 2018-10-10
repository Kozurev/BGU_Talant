<?php

/**
 * Класс, реализующий реализующий работу с XML-сущьностями.
 * Любой класс, объект которого будет связан с базой данных или другими объектами
 * должен наследовать данный класс для возможности использования методов: addEntity и addEntities
 *
 * Простой тэг имеет значение и не может иметь вложенных XML-сущьностей
 * Сложный тэг не имеет значнеия но может иметь вложенные XML-сущьности
 *
 * @author Bad Wolf
 * @date 07.09.2018
 */
class Core_Entity extends Core_Entity_Model
{

    /**
     * Возвращает название таблицы для данного объекта
     *
     * @return string
     */
    public function getTableName()
    {
        if(method_exists($this, "databaseTableName"))
            return $this->databaseTableName();
        else
            return "mdl_" . mb_strtolower( get_class($this) );
    }


    /**
     * Формирует из не пустых свойств объекта ассоциативный массив
     *
     * @return array
     */
    public function getObjectProperties()
    {
        $result = array();
        if( !isset($this->tableRows) || !is_array($this->tableRows) )  return $result;

        foreach ( $this->tableRows as $row )
        {
            if( $row === "id" && $this->id == null )    continue;
            $result[$row] = $this->$row;
        }

        return $result;
    }


    public function queryBuilder()
    {
        if( $this->Orm == null )
        {
            $this->Orm = new Orm();
            $this->Orm->tableName = $this->getTableName();
            $this->Orm->class = get_class( $this );
        }
        return $this->Orm;
    }


    public function setId($val)
    {
        $this->id = intval( $val );
    }


    public function getId()
    {
        return $this->id;
    }


    public function save()
    {
        $this->queryBuilder()->save($this);
    }


    public function delete()
    {
        $this->queryBuilder()->delete($this);
    }


    public function findAll()
    {
        return $this->queryBuilder()->findAll();
    }


    public function find()
    {
        return $this->queryBuilder()->find();
    }


	/**
	 * Конвертирует, к примеру, "Structure_Item" в "structure_item"
     * Долго объяснять, почему этот код не заменить одной функцией mb_strtolower()
     * просто оставьте всё как есть
     *
	 * @param $intputName - название модели, которое необходимо отконвертировать
	 * @return string - название модели без больших букв
	 */
	protected function renameModelName($intputName)
	{
		$aSegments = explode("_", $intputName);
		$outputName = "";

		foreach ($aSegments as $segment) 
		{
			if($outputName == "") $outputName .= lcfirst($segment);
			else $outputName .= "_" . lcfirst($segment);
		}

		return $outputName;
	}


    /**
     * Добавление дочерней сущьности (объекта) в XML
     *
     * @param $obj - добавляемый объект
     * @param null $tag - название XML-тэга добавляемого объекта
     * @return $this
     */
	public function addEntity($obj, $tag = null)
	{
		if(!is_null($tag)) 	
		{
		    if(method_exists($obj, "custom_tag"))
			    $obj->custom_tag($tag);
            elseif(get_class($obj) == "stdClass")
                $obj->custom_tag = $tag;
		}

		if($this->aEntityVars["value"] == "")	 
			$this->childrenObjects[] = $obj;
		else
			echo "Невозможно добавыить элемент к простой XML-сущьности";

		return $this;
	}


    /**
     * Метод аналогичен предыдущему, но в качестве аргумента принимает массив дочерних сущьностей
     *
     * @param $aoChilren - массив добавляемых объектов
     * @param null $tags - кастомное название тэгов данных объектов
     * @return $this
     */
	public function addEntities($aoChilren, $tags = null)
	{
		if(is_array($aoChilren) && count($aoChilren) > 0)
		foreach ($aoChilren as $oChild) 
		{
			if(is_object($oChild)) 	$this->addEntity($oChild, $tags);
		}

		return $this;
	}


    /**
     * Добавление простой сущьности
     *
     * @param $name
     * @param $value
     * @return $this
     */
	public function addSimpleEntity($name, $value)
    {
        $NewEntity = Core::factory( "Core_Entity" );
        $NewEntity->entityName( $name );
        $NewEntity->entityValue( $value );
        $this->addEntity($NewEntity);
        return $this;
    }


    /**
     * Рекурсивное преобразование объекта и его вложенных (дочерних) сущьностей в XML
     * для последующей передачи результата в XSLT-шаблонизатор
     *
     * @param $obj - объект, который необходимо преобразовать в XML-сущьность
     * @param $xmlObj - объект конечной XML-сущьности
     * @return mixed
     */
	public function createEntity($obj, $xmlObj)
	{
		$xml = $xmlObj;

		//Формирование названия тэга
		$tagName = "";
		$objClass = explode("_", get_class($obj));

		if(get_class($obj) == "Core_Entity")
		{
			if($obj->aEntityVars["value"] != "") 
				//Формирование простого тэга
				return $xml->createElement($obj->aEntityVars["name"], $obj->aEntityVars["value"]);
			else 
				$tagName = $obj->aEntityVars["name"];
		}
		else
		{
			if(isset($obj->aEntityVars["custom_tag"]) && $obj->aEntityVars["custom_tag"] != "")
			{
				$tagName = $obj->aEntityVars["custom_tag"];
			}
			elseif(isset($obj->custom_tag) && $obj->custom_tag != "")
            {
                $tagName = $obj->custom_tag;
            }
			else 	$tagName = $this->renameModelName(get_class($obj));
		}


		//Создание тэга
		$objTag = $xml->createElement($tagName);
		//Получение значений свойств от объекта
		$objData = get_object_vars($obj);

		//Преобразование объекта в XML сущьность
		foreach ($objData as $key => $val) 
		{
			if(is_array($val) && $key != "childrenObjects") continue;

			//Если переменная представляет из себя массив дочерних сущьностей
			if($key == "childrenObjects")
			{
				foreach($val as $childObject)
				{
					$objChildTag = $this->createEntity($childObject, $xml);
					$objTag->appendChild($objChildTag);
				}
			}
			elseif($val !== "" && !is_null($val))
			{
				$objTag->appendChild($xml->createElement($key, strval($val)));
			}
		}
		
		return $objTag;
	}


    /**
     * Метод формирования HTML-кода на основании полученного XML
     *
     * @param bool $showing - указатель. Если установлено значение true - сразу выводит сгенерированный HTML-код,
     * иначе просто возвращает его в виде строки
     * @return string
     */
	public function show( $showing = true )
	{
		if($this->aEntityVars["xslPath"] == "") die("Не указан путь к XSL шаблону");

		$xmlText = '<?xml version="1.0" encoding="utf-8"?>
		<?xml-stylesheet type="text/xsl" href="'.$this->aEntityVars["xslPath"].'"?>';

		$xmlText .= '<'.$this->aEntityVars["name"].'></'.$this->aEntityVars["name"].'>';

		$xml = new DOMDocument();
		$xml->loadXML($xmlText);

		$rootTag = $xml->getElementsByTagName($this->aEntityVars["name"])->item(0);

		foreach ($this->childrenObjects as $obj) 
		{
			$rootTag->appendChild($this->createEntity($obj, $xml));
		}

		//$xml->save("xml.xml");

		// Объект стиля
		$xsl = new DOMDocument();
		$xsl->load($this->aEntityVars["xslPath"]);  

		// Создание парсера
		$proc = new XSLTProcessor();

		// Подключение стиля к парсеру
		$proc->importStylesheet($xsl);

		// Обработка парсером исходного XML-документа
		$parsed = $proc->transformToXml($xml);

		if( $showing === true ) echo $parsed;

		return $parsed;
	}		

}