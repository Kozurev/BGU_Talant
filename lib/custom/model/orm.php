<?php

/**
 * Класс-конструктор SQL-запросов
 *
 * Class Orm
 */
class Orm 
{

    /**
     * Формируемая строка SQL-запроса
     *
     * @var string
     */
	protected $queryString = '';


    /**
     * Объект с которым связан конструктор запроса по умолчанию
     *
     * @var object | null
     */
    private $object;



    /**
     * Название таблицы для объекта к которому привязан конструктор
     *
     * @var string | null
     */
    private $table;


    /**
     * Список названий столбцов таблицы из которых берутся значения
     *
     * @var array
     */
    private $select = [];


    /**
     * Дополнительный список названий столбцов таблицы из которых беруться значения
     *
     * @var array
     */
    private $addSelecting = [];


    /**
     * Список запрещенных к выборке столбцов
     *
     * @var array
     */
    private $forbiddenTags = [];


    /**
     * Список названий таблиц из которых производится выборка
     *
     * @var array
     */
    private $from = [];


    /**
     * Строка с условиями выборки
     *
     * @var string
     */
    private $where = '';


    /**
     * Массив параметров задающих сортировку выборки
     *
     * @var array
     */
    private $order = [];


    /**
     * Параметр устанавливающий максимальное количество выбираемых строк
     *
     * @var int
     */
    private $limit;


    /**
     * Присоединяемые таблицы различными вариантами операторов JOIN
     *
     * @var array
     */
    private $join = [];

    private $having;
    private $groupBy = [];
    private $offset;
    private $open = 0;
    private $close = 0;




    public function __construct( $obj = null )
    {
        if( $obj !== null )
        {
            $this->table = $obj->getTableName();
            $this->class = get_class( $obj );
            $this->object = $obj;
        }
    }


    /**
     * Переключатель режима отладки SQL-запросов
     *
     * @param bool $switch - указатель
     */
    public static function Debug( $switch )
    {
        $_SESSION['core']['SQL_DEBUG'] = $switch;
    }


    /**
     * Проверка на включенность отладки
     *
     * @return bool
     */
    private static function isDebugSql()
    {
        return Core_Array::getValue( $_SESSION['core'], 'SQL_DEBUG', false ) === true;
    }


    /**
     * Открытие скобки в строке SQL запроса
     *
     * @return self
     */
	public function open()
    {
        $this->open++;

        return $this;
    }


    /**
     * Закрытие скобки в строке SQL запроса
     *
     * @return self
     */
    public function close()
    {
        if ( $this->open == 0 )
        {
            $this->where .= ') ';
        }

        return $this;
    }



	/**
	 * Возвращает количество элементов в базе
     *
	 * @return int
	 */
	public function getCount()
	{
	    $beforeSelect = $this->select;

		$this->select( 'count(' . $this->table . '.id)', 'count' );
		$this->setQueryString();
		$result = DB::instance()->query( $this->queryString );

        if( self::isDebugSql() )
        {
            echo "<br>Строка запроса метода <b>getCount()</b>: " . $this->queryString;
        }

		if ( $result == false )
        {
            return 0;
        }


        $this->queryString = '';
        $this->select = $beforeSelect;

		$result = $result->fetch();

		return intval( $result['count'] );
	}


	/**
	 * Метод для добавления/сохранения объектов
     *
	 * @return $this
	 */
	public function save( $obj )
	{
		//Генерация названия объекта для наблюдателя
		$eventObjectName = $obj->getTableName();
		$eventObjectName = explode( '_', $eventObjectName );
		$eventObjectName = implode( '', $eventObjectName );

		if ( $obj->getId() )
        {
            $eventType = 'Update';
        }
        else
        {
            $eventType = 'Insert';
        }

        Core::notify( [&$obj], 'before' . $eventObjectName . $eventType );

        $objData = $obj->getObjectProperties();
        unset( $objData['id'] );

        $aRows = array_keys( $objData ); //Название свйоств (столбцов таблицы)
        $aValues = array_values( $objData ); //Значения свйоств


        //Если этот элемент уже существует в базе данных
		if ( $this->object->getId() )
		{
			$queryStr = 'UPDATE ' . $this->table . ' SET ';

			for ( $i = 0; $i < count( $objData ); $i++ )
			{
                $queryStr .= '`' . $aRows[$i] . '` = ' . $this->parseValue( $aValues[$i] );

			    if ( $i + 1 < count( $objData ) )
                {
                    $queryStr .= ',';
                }

                $queryStr .= ' ';
			}

			$queryStr .= 'WHERE `id` = ' . $obj->getId() . ' ';
		}
		//Если это новый элемент
		else 
		{
			$queryStr = 'INSERT INTO ' . $this->table . '(';

			for ( $i = 0; $i < count( $objData ); $i++ )
			{
			    $queryStr .= $aRows[$i];

			    if ( $i + 1 < count( $objData ) )
                {
                    $queryStr .= ',';
                }

                $queryStr .= ' ';
			}


			$queryStr .= ') VALUES(';

			for ( $i = 0; $i < count( $objData ); $i++ )
			{
			    $queryStr .= $this->parseValue( $aValues[$i] );

			    if ( $i + 1 < count( $objData ) )
                {
                    $queryStr .= ',';
                }

                $queryStr .= ' ';
			}

			$queryStr .= ') ';
		}

		if( self::isDebugSql() )
		{
			echo "<br>Строка запроса метода <b>save()</b>: ".$queryStr;
		}

		try
		{
			DB::instance()->query( $queryStr );
		}
		catch( PDOException $Exception )
		{
			echo $Exception->getMessage();
		}

		/**
         * Если объект только что был сохранен в таблицу то устанавливается значение
         * присвоенного уникального идентификатора для дальнейшей работы с объектом
         */
		if( !$obj->getId() )
		{
            $obj->setId( intval( DB::instance()->lastInsertId() ) );
		}


        Core::notify( [&$obj], 'after' . $eventObjectName . $eventType );

		return $obj;
	}


    /**
     * Метод для формирования строки запроса
     *
     * @return void
     */
    private function setQueryString()
    {
        /**
         * Формирование списка выбираемых столбцов из таблиц
         * Задание значений для SELECT
         */
        $this->queryString = 'SELECT ';

        //Выборка происходит только по колонкам таблицы объекта
        if ( count( $this->select ) == 0 )
        {
            $tableRows = array_keys( $this->object->getObjectProperties() );

            for ( $i = 0; $i < count( $tableRows ); $i++ )
            {
                $row = $this->table . '.' . $tableRows[$i];

                if ( in_array( $tableRows[$i], $this->forbiddenTags ) || in_array( $row, $this->forbiddenTags ) )
                {
                    continue;
                }

                $this->queryString .= $row;

                if ( $i + 1 < count( $tableRows ) )
                {
                    $this->queryString .= ',';
                }

                $this->queryString .= ' ';
            }
        }
        //Выбираемые колонки таблицы (таблиц) были заданы
        else
        {
            for ( $i = 0; $i < count( $this->select ); $i++ )
            {
                if ( in_array( $this->select[$i], $this->forbiddenTags ) )
                {
                    continue;
                }

                $this->queryString .= $this->select[$i];

                if ( $i + 1 < count( $this->select ) )
                {
                    $this->queryString .= ',';
                }

                $this->queryString .= ' ';
            }
        }

        //Дополнительные колонки таблицы для выборки
        if ( count( $this->addSelecting ) > 0 )
        {
            for ( $i = 0; $i < count( $this->addSelecting ); $i++ )
            {
                $this->queryString .= ', ' . $this->addSelecting[$i] . ' ';
            }
        }


        /**
         * Формирование списка таблиз из которых происходит выборка данных
         * Формирование значений для FROM
         */
        $this->queryString .= 'FROM ';

        if ( count( $this->from ) == 0 )
        {
            $this->queryString .= $this->table;
        }
        else
        {
            for ( $i = 0; $i < count( $this->from ); $i++ )
            {
                $this->queryString .= $this->from[$i];

                if ( $i + 1 < count( $this->from ) )
                {
                    $this->queryString .= ',';
                }

                $this->queryString .= ' ';
            }
        }


        /**
         * Формирование всех JOIN-ов
         */
        if ( count( $this->join ) > 0 )
        {
            foreach ( $this->join as $joining )
            {
                $this->queryString .= ' ' . $joining->type . ' JOIN ';
                $this->queryString .= $joining->table;
                $this->queryString .= ' ON ' . $joining->conditions;
            }
        }


        if ( $this->where != '' )
        {
            $this->queryString .= ' WHERE ' . $this->where;
        }


        /**
         * Формирование условий сортировки
         */
        if ( count( $this->order ) > 0 )
        {
            $this->queryString .= ' ORDER BY ';

            $orderRows = array_keys( $this->order );
            $orderSortings = array_values( $this->order );

            for ( $i = 0; $i < count( $this->order ); $i++ )
            {
                $this->queryString .= $orderRows[$i] . ' ' . $orderSortings[$i];

                if ( $i + 1 < count( $this->order ) )
                {
                    $this->queryString .= ',';
                }

                $this->queryString .= ' ';
            }
        }


        if ( $this->limit != '' )
        {
            $this->queryString .= ' LIMIT ' . $this->limit;
        }


        if ( $this->offset != '' )
        {
            $this->queryString .= ' OFFSET ' . $this->offset;
        }


        /**
         * Задание условий группировки
         */
        if ( count( $this->groupBy ) > 0 )
        {
            $this->queryString .= ' GROUP BY ';

            for ( $i = 0; $i < count( $this->groupBy ); $i++ )
            {
                $this->queryString .= $this->groupBy[$i];

                if ( $i + 1 < count( $this->groupBy ) )
                {
                    $this->queryString .= ',';
                }

                $this->queryString .= ' ';
            }
        }


        if ( $this->having != '' )
        {
            $this->queryString .= ' HAVING ' . $this->having;
        }
    }


    /**
     * Метод для выполнения sql запроса
     *
     * @param string $sql - стока SQL-запроса
     * @return mixed
     */
    public function executeQuery( $sql )
    {
        if ( self::isDebugSql() )
        {
            echo "<br>Строка из метода <b>executeQuery()</b>: " . $sql;
        }

        $result = DB::instance()->query( $sql );

        return $result;
    }


    /**
     * Установления значений по умолчанию для свойств учавствующих в формировании запроса
     *
     * @return self
     */
    public function clearQuery()
    {
        $this->queryString = '';
        $this->select = [];
        $this->addSelecting = [];
        $this->forbiddenTags = [];
        $this->where = '';
        $this->from = [];
        $this->order = [];
        $this->groupBy = [];
        $this->limit = '';
        $this->join = [];
        $this->having = '';
        $this->offset = '';
        //$this->leftJoin = "";
        $this->open = 0;
        $this->close = 0;

        return $this;
    }


    /**
     * Геттер для сформированной строки SQL-запроса
     *
     * @return string
     */
    public function getQueryString()
    {
        $this->setQueryString();

        return $this->queryString;
    }


    /**
     * Обертывание значения в одинарные ковычки
     *
     * @date 29.01.2019 12:23
     *
     * TODO: доработать данный метод: добавить больше проверок и защиту от SQL-инъекций
     *
     * @param $value
     * @return string
     */
    public function parseValue( $value )
    {
        if ( is_object( $value ) && $value->type == 'unchanged' )
        {
            $val = $value->val;
        }
        elseif ( $value === 'NULL' || $value === null )
        {
            $val = 'NULL';
        }
        else
        {
            $val = '\'' . $value . '\'';
        }

        return $val;
    }


    /**
     * Удаление Объекта из базы данных
     */
    public function delete( $obj )
    {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id = ' . $obj->getId();
        $this->executeQuery( $query );

        if ( self::isDebugSql() )
        {
            echo "<br>Строка из метода <b>delete()</b>: " . $query;
        }
    }




/**
 * 	---------------------------------------------------------
 *	Основные методы формирования SQL запроса
 *	Начало>>
 */

	/**
	 * Метод указывающий название таблицы и параметры, которые из неё будут выбираться.
	 * Если параметры не заданы тогда выбираются все столбцы таблицы.
     *
     * @param string | array $aParams - название (названия) столбца таблицы из которого выбираются значения
     * @param null $as - наименование результирующего столбца
	 * @return self
	 */
	public function select( $aParams, $as = null )
	{
        if ( is_array( $aParams ) && count( $aParams ) > 0 )
        {
            foreach ( $aParams as $row )
            {
                $this->select[] = $row;
            }
        }
        elseif ( is_string( $aParams ) )
        {
            $select = $aParams;

            if ( !is_null( $as ) && is_string( $as ) )
            {
                $select .= ' AS ' . $as;
            }

            $this->select[] = $select;
        }

		return $this;
	}


    /**
     * Запрещенные для выборки (в SELECT) значения
     *
     * @param $tags
     * @return self
     */
    public function forbiddenTags( $tags )
    {
        if ( is_array( $tags ) )
        {
            $this->forbiddenTags = array_merge( $this->forbiddenTags, $tags );
        }
        elseif ( is_string( $tags ) )
        {
            $this->forbiddenTags[] = $tags;
        }

        return $this;
    }


    /**
     * Дополнительные поля для выборки
     *
     * @date 20.01.2019 22:59
     *
     * @param $field
     * @param null $as
     * @return self
     */
	public function addSelect( $field, $as = null )
    {
        if ( is_array( $field ) && count( $field ) > 0 )
        {
            foreach ( $field as $row )
            {
                $this->addSelecting[] = $row;
            }
        }
        elseif ( is_string( $field ) )
        {
            $addSelect = $field;

            if ( !is_null( $as ) && is_string( $as ) )
            {
                $addSelect .= ' AS ' . $as;
            }

            $this->addSelecting[] = $addSelect;
        }

        return $this;
    }


	/**
	 * Метод указывающий список таблиц из которых делается выборка
     *
     * @param $aTables
     * @param null $as
	 * @return self
	 */
	public function from( $aTables, $as = null )
	{
		if ( is_array( $aTables ) )
		{
		    foreach ( $aTables as $table )
            {
                $this->from[] = $table;
            }
		}
		elseif ( is_string( $aTables ) )
		{
		    $from = $aTables;

		    if ( !is_null( $as ) && is_string( $as ) )
            {
                $from .= ' AS ' . $as;
            }

            $this->from[] = $from;
		}

		return $this;
	}


	/**
	 * Метод задающий условия выборки данных
     * После обновления 29.01.2019 данный метод реализован иначе но поддерживает обратную совместимость
     * для корректной работы срарого кода во избежания различных ошибок.
     * По мере работы над системой старый код будет заменен на новый с использовагнием новых методов: orWhere, whereIn и orWhereIn
     *
     * @param $row
     * @param $operation
     * @param $value
     * @param $or
	 * @return self
	 */
	public function where( $row, $operation, $value, $or = null )
	{
        /**
         * В случае операции IN
         */
        if ( ( $operation == 'in' || $operation == 'IN' ) && is_array( $value ) )
        {
            if ( is_null( $or ) || $or == 'and' || $or == 'AND' )
            {
                return $this->whereIn( $row, $value );
            }
            elseif ( $or == 'or' || $or == 'OR' )
            {
                return $this->orWhereIn( $row, $value );
            }
        }


        /**
         * В случае операции OR
         */
        if ( $or == 'or' || $or == 'OR' )
        {
            $this->orWhere( $row, $operation, $value );
        }

        if ( $this->where != '' )
        {
            $this->where .= ' AND ';
        }


        if ( $this->open != 0 )
        {
            for ( $i = 0; $i < $this->open; $i++ )
            {
                $this->where .= ' (';
            }

            $this->open = 0;
        }


        $this->where .= $row . ' ' . $operation . ' ';
        $this->where .= $this->parseValue( $value ) . ' ';

        return $this;
	}


    /**
     *
     *
     * @param $row
     * @param $condition
     * @param $value
     * @return self
     */
    public function orWhere( $row, $condition, $value )
    {
        if ( $this->where != '' )
        {
            $this->where .= ' OR ';
        }


        if ( $this->open != 0 )
        {
            for ( $i = 0; $i < $this->open; $i++ )
            {
                $this->where .= ' (';
            }

            $this->open = 0;
        }


        $this->where .= $row . ' ' . $condition . ' ';
        $this->where .= $this->parseValue( $value ) . ' ';

        return $this;
    }


    /**
     *
     *
     * @param $row
     * @param $values
     * @return self
     */
    public function whereIn( $row, $values )
    {
        if ( !is_array( $values ) )     return $this;
        if ( count( $values ) == 0 )    return $this;


        if ( $this->where != '' )
        {
            $this->where .= ' AND ';
        }


        if ( $this->open != 0 )
        {
            for ( $i = 0; $i < $this->open; $i++ )
            {
                $this->where .= ' (';
            }

            $this->open = 0;
        }


        $this->where .= $row . ' in(';

        for ( $i = 0; $i < count( $values ); $i++ )
        {
            $i == 0
                ?   $this->where .= $this->parseValue( $values[$i] )
                :   $this->where .= ', ' . $this->parseValue( $values[$i] );
        }

        $this->where .= ') ';

        return $this;
    }


    /**
     *
     *
     * @param $row
     * @param $values
     * @return self
     */
    public function orWhereIn( $row, $values )
    {
        if ( !is_array( $values ) )     return $this;
        if ( count( $values ) == 0 )    return $this;


        if ( $this->where != '' )
        {
            $this->where .= ' OR ';
        }


        $this->where .= $row . ' in(';

        for ( $i = 0; $i < count( $values ); $i++ )
        {
            $i == 0
                ?   $this->where .= $this->parseValue( $values[$i] )
                :   $this->where .= ', ' . $this->parseValue( $values[$i] );
        }

        $this->where .= ') ';

        return $this;
    }


    /**
     * Реализация оператора BETWEEN
     *
     * @param $param - параметр
     * @param $val1 - нижний предел значения
     * @param $val2 - верхний предел значения
     * @param string $condition - условие (AND или OR)
     * @return self
     */
    public function between( $param, $val1, $val2, $condition = 'AND' )
    {
        if ( $this->where != '' )
        {
            $this->where .= $condition . ' ';

            for ( $i = 0; $i < $this->open; $i++ )
            {
                $this->where .= ' (';
            }

            $this->open = 0;
        }
        else
        {
            for( $i = 0; $i < $this->open; $i++ )
            {
                $this->where .= ' (';
            }

            $this->open = 0;
        }


        $this->where .= $param . ' BETWEEN \'' . $val1 . '\' AND \'' . $val2 . '\' ';

        return $this;
    }



    /**
	 * Метод задающий сортировку выборки
     *
     * @param $row - название столбца по значениям которого произодится сортировка
     * @param $order - порядок сортировки
	 * @return self
	 */
	public function orderBy( $row, $order = 'ASC' )
	{
		if ( is_array( $row ) )
		{
		    foreach ( $row as $column => $sorting )
            {
                $this->order[$column] = $sorting;
            }
		}
		elseif ( is_string( $row ) && is_string( $order ) )
		{
		    $this->order[$row] = $order;
		}

		return $this;
	}


	/**
	 * Метод задающий количество выбираемых строк из базы данных
     *
     * @param $count - максимальное кол-во выбираемых строк
	 * @return self
	 */
	public function limit( $count )
	{
		if ( !is_numeric( $count ) )
        {
            return $this;
        }

		$this->limit = $count;

		return $this;
	}


    /**
     * Реализация оператора OFFSET - отступ
     *
     * @param $val - численное значение отступа
     * @return self
     */
	public function offset( $val )
    {
        if ( $this->offset == '' )
        {
            $this->offset = intval( $val );
        }

        return $this;
    }


	/**
	 * Метод для объединения таблиц INNER JOIN
     *
     * @param $table - присоеденяемая таблица
     * @param $conditions - условия присоединения
	 * @return self
	 */
	public function join( $table, $conditions )
	{
	    $joining = new stdClass();
	    $joining->table = $table;
	    $joining->type = 'INNER';
	    $joining->conditions = $conditions;

	    $this->join[] = $joining;

		return $this;
	}


    /**
     * Метод для объеденения таблиц LEFT JOIN
     *
     * @param $table - присоеденяемая таблица
     * @param $conditions - условия присоединения
     * @return self
     */
	public function leftJoin( $table, $conditions )
    {
        $joining = new stdClass();
        $joining->table = $table;
        $joining->type = 'LEFT';
        $joining->conditions = $conditions;

        $this->join[] = $joining;

        return $this;
    }


    public function rightJoin( $table, $conditions )
    {
        $joining = new stdClass();
        $joining->table = $table;
        $joining->type = 'RIGHT';
        $joining->conditions = $conditions;

        $this->join[] = $joining;

        return $this;
    }


    /**
     * Реализация оператора HAVING
     *
     * @param $row - название столбца (свойства)
     * @param $operation - логический оператор
     * @param $value - сравниваемое значение
     * @return self
     */
    public function having( $row, $operation, $value )
    {
        if ( $this->having != '' )
        {
            $this->having .= ' and ' . $row . ' ' . $operation . ' ' . $this->parseValue( $value );
        }
        else
        {
            $this->having = $row . ' ' . $operation . ' ' . $this->parseValue( $value );
        }

        return $this;
    }


    /**
     * Метод для группировки выбираемых строк из базы данных
     *
     * @param $row - название колонки по которой производится группирповка
     * @return self
     */
    public function groupBy( $row )
    {
        $this->groupBy[] = $row;

        return $this;
    }


	/**
	 * Метод выполняющий запрос к бд
     *
	 * @return array
	 */
	public function findAll()
	{
		$this->setQueryString();

		if( self::isDebugSql() )
		{
			echo "<br>Строка запроса из метода <b>findAll()</b>: ".$this->queryString;
		}

		try
		{
			$result = DB::instance()->query($this->queryString);

			if( !$result )    return [];

            $this->class !== null
                ?   $fetchClass = $this->class
                :   $fetchClass = 'stdClass';

			$result->setFetchMode( PDO::FETCH_CLASS, $fetchClass );
			return $result->fetchAll();
		}
		catch( PDOException $Exception )
		{
			echo $Exception->getMessage();
			return [];
		}
	}


	/**
	 * Выполняет запрос к бд
     *
	 * @return object | null
	 */
	public function find()
	{
		$this->setQueryString();

		if( self::isDebugSql() )
		{
			echo "<br>Строка запроса из метода <b>find()</b>: ".$this->queryString;
		}

		try
		{
			$result = DB::instance()->query( $this->queryString );

			if( $result == false )
            {
                return null;
            }

            $this->class !== null
                ?   $fetchClass = $this->class
                :   $fetchClass = 'stdClass';

			$result->setFetchMode( PDO::FETCH_CLASS, $fetchClass );
			$result = $result->fetch();

			 if ( $result == false )
             {
                 return null;
             }

             return $result;
		}
		catch( PDOException $Exception )
		{
			echo $Exception->getMessage();
			return null;
		}
	}



/**
 *	<<Конец
 *	Основные методы формирования SQL запроса
 *	---------------------------------------------------------
 */
}