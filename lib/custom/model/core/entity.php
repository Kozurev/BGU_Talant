<?php
/**
*	Класс, реализующий XML-сущьности
*	Простой тэг имеет значение и не может иметь вложенных XMK-сущьностей
*	Сложный тэг не имеет значнеия но может иметь вложенные XML-сущьности
*/
class Core_Entity extends Core_Entity_Model
{

    /**
     * @return Orm
     */
    public function queryBuilder()
    {
        if( is_null( $this->aEntityVars["orm"] ) )
        {
            $this->aEntityVars["orm"] = new Orm( $this );
        }

        return $this->aEntityVars["orm"];
    }


    public function findAll()
    {
        return $this->queryBuilder()->findAll();
    }

    public function find()
    {
        return $this->queryBuilder()->find();
    }

    public function save()
    {
        $this->queryBuilder()->save( $this );
        return $this;
    }

    public function delete()
    {
        $this->queryBuilder()->delete( $this );
    }

    public function getCount()
    {
        return $this->queryBuilder()->getCount();
    }



    /**
     * Возвращает название таблицы для данного объекта
     *
     * @return string
     */
    public function getTableName()
    {
        if ( method_exists( $this, "databaseTableName" ) )
        {
            return $this->databaseTableName();
        }
        else
        {
            //return get_class( $this );
            global $CFG;
            return $CFG->prefix . mb_strtolower( get_class( $this ) );
        }
    }


    /**
     * Формирует из не пустых свойств объекта ассоциативный массив
     *
     * @return array
     */
    public function getObjectProperties()
    {
        $result = [];

        $Model = $this->getModel(); //Модель данного объекта если такая существует

        if ( !is_null( $Model ) )
        {
            $modelProperties = get_object_vars( $Model );

            foreach ( $modelProperties as $propertyName => $propertyValue )
            {
                $value = $Model->$propertyName;

                if ( !is_object( $value ) && !is_array( $value ) )
                {
                    $result[$propertyName] = $value;
                }
            }
        }
        elseif( isset( $this->tableRows ) && is_array( $this->tableRows ) )
        {
            foreach ( $this->tableRows as $propertyName )
            {
                if( !is_array( $this->$propertyName ) && !is_object( $this->$propertyName ) )
                {
                    $result[$propertyName] = $this->$propertyName;
                }
            }
        }
        else
        {
            $properties = get_object_vars( $this );

            foreach ( $properties as $propertyName => $propertyValue )
            {
                if( !is_array( $propertyValue ) && !is_object( $propertyValue ) )
                {
                    $result[$propertyName] = $propertyValue;
                }
            }
        }

        return $result;
    }


    /**
     * Поиск класса-модели для объекта
     * Данный метод адаптирован под немного другую систему но не стал удалять
     *
     * @return mixed | null
     */
    public function getModel()
    {
        $modelClassName = get_class( $this ) . "_Model";
        $Model = Core::factory( $modelClassName );

        if ( !is_null( $Model ) )
        {
            $properties = get_object_vars( $Model );

            foreach ( $properties as $propertyName => $propertyValue )
            {
                //Формирование названия сеттера для свойства
                if ( $propertyName == 'id' )
                {
                    $snakeCaseSetter = 'getId';
                    $camelCaseSetter = 'getId';
                }
                else
                {
                    $snakeCaseSetter = $propertyName;
                    $camelCaseSetter = toCamelCase( $propertyName );
                }

                $value = $this->$propertyName;

                if ( is_array( $value ) || is_object( $value ) )
                {
                    continue;
                }

                if ( method_exists( $Model, $snakeCaseSetter ) )
                {
                    $Model->$snakeCaseSetter( $value );
                }
                elseif ( method_exists( $Model, $camelCaseSetter ) )
                {
                    $Model->$camelCaseSetter( $value );
                }
            }
        }

        return $Model;
    }


    /**
     * Конвертирует, к примеру, "Structure_Item" в "structure_item"
     *
     * @param $intputName - название модели, которое необходимо отконвертировать
     * @return string - название модели без больших букв
     */
	protected function renameModelName( $inputName )
	{
		$aSegments = explode( "_", $inputName );
		$outputName = "";


		foreach ( $aSegments as $segment )
		{
			if( $outputName == "" ) $outputName .= lcfirst( $segment );
			else $outputName .= "_" . lcfirst( $segment );
		}

		return $outputName;
	}


    /**
     * Добавление дочерней сущьности в XML
     *
     * @param $obj
     * @param null $tag
     * @return $this
     */
	public function addEntity( $obj, $tag = null )
	{
	    if( !is_object( $obj ) )
        {
            return $this;
        }

		if( !is_null( $tag ) )
		{
		    if( method_exists( $obj,  "custom_tag" ) )
			    $obj->custom_tag( $tag );
            elseif( get_class( $obj ) == "stdClass" )
                $obj->custom_tag = $tag;
		}

		if( $this->_entityValue() == "" )
			$this->childrenObjects[] = $obj;
		else
			echo "Невозможно добавыить элемент к простой XML-сущьности";

		return $this;
	}


    /**
     * Добавление массива дочерних сущьностей в XML
     *
     * @param $aoChildren
     * @param null $tags
     * @return $this
     */
	public function addEntities( $aoChildren, $tags = null )
	{
		if( is_array( $aoChildren ) && count( $aoChildren ) > 0 )

		foreach ( $aoChildren as $oChild )
		{
			if( is_object( $oChild ) ) 	$this->addEntity( $oChild, $tags );
		}

		return $this;
	}


    /**
     * Добавление простой дочерней сущьности в XML
     *
     * @param $name - название тэга
     * @param $value - значение
     * @return $this
     */
	public function addSimpleEntity( $name, $value )
    {
        if( $value === null )   $value = "";

        $this->addEntity(
            Core::factory("Core_Entity")
                ->_entityName( $name )
                ->_entityValue( $value )
        );

        return $this;
    }


	/**
	*	Преобразование объекта в XML-сущьность
	*	так же выполняется рекурсивное преобразование дочерних сущьностей
	*	@param $obj - объект, который необходимо преобразовать в XML-сущьность
	*	@param $xmlUbj - объект конечной XML-сущьности
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

		/*
		*	Преобразование объекта в XML сущьность
		*/
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
			elseif( $val === "" || is_null( $val ) )
            {
                $objTag->appendChild($xml->createElement($key, ""));
            }
		}

		/*
		*	Добавление свойств в XML если необходимо
		*/
		//$objTag = $this->addProperties($objTag, $obj, $xml);
		
		return $objTag;
	}


	public function show( $isShowing = true )
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

		// Вывод результирующего кода
        if ( $isShowing == true )
        {
            echo $parsed;
        }
        else
        {
            return $parsed;
        }
	}


	public function setId( $val )
    {
        $this->id = intval( $val );
        return $this;
    }

}