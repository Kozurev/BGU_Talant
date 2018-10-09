<?php

/**
 * Класс реализует концепцию ORM
 * Понимаю, что реализовано всё жутко костыльно и неправильно, но есть что есть
 * Делал это давно для дипломной работы, будь у меня время - с удовольствием переписал бы все,
 * однако, эта хрень всё же работает!
 *
 * @author: Bad Wolf
 * @date: 07.09.2018 16:32
 */
class Orm
{

    /**
     * Строка конечного (сформированного) SQL-запроса
     *
     * @var string
     */
    protected $queryString;


    /**
     * Название базы данных объекта, с которым происходит работа
     *
     * @var string
     */
    public $tableName;


    /**
     * Название класса, к которому будет приведен результат запроса
     *
     * @var string
     */
    public $class = "stdClass";


    /**
     * Список параметров для SQL-запроса
     * Тут и так всё интуитивно понятно, так что не буду расписывать каждое свойство
     */
    private $select;
    private $from;
    private $where;
    private $order;
    private $limit;
    private $join;
    private $leftJoin;
    private $having;
    private $groupby;
    private $offset;
    private $open = 0;
    private $close = 0;

    public function __construct(){}


    /**
     * Имитация открытия скобки при формировании SQL-запроса
     *
     * @return $this
     */
    public function open()
    {
        $this->open++;
        return $this;
    }


    /**
     * Имитация закрытия скобки при формировании SQL-запроса
     *
     * @return $this
     */
    public function close()
    {
        $this->where .= ") ";
        return $this;
    }


    /**
     * Нахождение количества записей в таблице по заданным условиям
     *
     * @return int
     */
    public function getCount()
    {
        $this->select = "count(".$this->tableName.".id) as count";
        $this->setQueryString();
        $result = Core_Database::getConnect()->query($this->queryString);
        $this->select = "";

        if(TEST_MODE_ORM)
        {
            echo "<br>Строка запроса метода <b>getCount()</b>: ".$this->queryString;
        }

        if(!$result)    return 0;
        $result = $result->fetch();
        return intval($result['count']);
    }


    /**
     * Создание или обновления записи в БД
     *
     * @return $this
     */
    public function save( $obj )
    {
        $objData = $obj->getObjectProperties();
        $aRows = array_keys($objData);
        $aValues = array_values($objData);

        //Если это существующий элемент
        if($obj->getId())
        {
            $queryStr = "UPDATE ".$obj->getTableName()." ";
            $queryStr .= "SET ";

            for($i = 0; $i < count($objData); $i++)
            {
                if( $i + 1 == count( $objData ) )
                {
                    $queryStr .= "`".$aRows[$i]."` = ";//'".$aValues[$i]."' "
                    if( $aValues[$i] === "null" || $aValues[$i] === "NULL" )
                        $queryStr .= "NULL ";
                    else
                        $queryStr .= "'". $aValues[$i] ."'";
                }
                else
                {
                    $queryStr .= "`".$aRows[$i]."` = ";//'".$aValues[$i]."' "
                    if( $aValues[$i] === "null" || $aValues[$i] === "NULL" )
                        $queryStr .= "NULL, ";
                    else
                        $queryStr .= "'". $aValues[$i] ."', ";
                }
            }

            $queryStr .= "WHERE `id` = '".$obj->getId()."'";
        }
        //Если это новый элемент
        else
        {
            $queryStr = "INSERT INTO ".$obj->getTableName()."(";

            for($i = 0; $i < count($objData); $i++)
            {
                $i + 1 == count($objData)
                    ? $queryStr .= $aRows[$i]
                    : $queryStr .= $aRows[$i].", ";
            }

            $queryStr .= ") VALUES(";

            for($i = 0; $i < count($objData); $i++)
            {
                if( $i + 1 == count( $objData ) )
                {
                    if( $aValues[$i] === "null" || $aValues[$i] === "NULL" )
                        $queryStr .= "NULL";
                    else
                        $queryStr .= "'". $aValues[$i] ."'";
                }
                else
                {
                    if( $aValues[$i] === "null" || $aValues[$i] === "NULL" )
                        $queryStr .= "NULL, ";
                    else
                        $queryStr .= "'". $aValues[$i] ."', ";
                }
            }

            $queryStr .= ") ";
        }

        if(TEST_MODE_ORM)
        {
            echo "<br>Строка запроса метода <b>save()</b>: ".$queryStr;
        }

        try
        {
            $result = Core_Database::getConnect()->query($queryStr);
        }
        catch(PDOException $Exception)
        {
            echo $Exception->getMessage();
        }

        //Добавление id
        if(!$obj->getId())
        {
            $lastInsertId = Core_Database::getConnect()->query("SELECT LAST_INSERT_ID() as id");
            $lastInsertId->setFetchMode(PDO::FETCH_CLASS, "stdClass");
            $lastInsertId = $lastInsertId->fetch();
            $obj->setId( $lastInsertId->id );
        }

        return $this;
    }


    /**
     * Метод для формирования конечного SQL запроса на основании заданных параметров
     *
     * @return void
     */
    private function setQueryString()
    {
        if($this->select == "")
            $this->queryString .= "SELECT * ";
        else
            $this->queryString .= "SELECT ".$this->select;

        if($this->from)
            $this->queryString .= " FROM ".$this->from;
        else
            $this->queryString .= " FROM ".$this->tableName;

        if($this->join != "")
            $this->queryString .= $this->join;

        if($this->leftJoin != "")
            $this->queryString .= $this->leftJoin;

        if($this->where != "")
            $this->queryString .= " WHERE ".$this->where;

        if($this->order != "")
            $this->queryString .= " ORDER BY ".$this->order;

        if($this->limit != "")
            $this->queryString .= " LIMIT ".$this->limit;

        if($this->offset != "")
            $this->queryString .= " OFFSET ".$this->offset;

        if($this->groupby != "")
            $this->queryString .= " GROUP BY ".$this->groupby;

        if($this->having != "")
            $this->queryString .= " HAVING ".$this->having;
    }


    /**
     * Геттер для свойства queryString
     *
     * @return string
     */
    public function getQueryString()
    {
        $this->setQueryString();
        return $this->queryString;
    }


    /**
     * Метод для выполнения sql запроса
     *
     * @return mixed
     */
    public function executeQuery($sql)
    {
        if(TEST_MODE_ORM) echo "<br>Строка из метода <b>executeQuery()</b>: ".$sql;
        $result = Core_Database::getConnect()->query($sql);
        return $result;
    }


    /**
     *	Очистка всех заданных параметров
     *
     *	@return $this
     */
    public function clearQuery()
    {
        $this->queryString = "";
        $this->select = "";
        $this->where = "";
        $this->from = "";
        $this->order = "";
        $this->limit = "";
        $this->join = "";
        $this->having = "";
        $this->orderBy = "";
        $this->offset = "";
        $this->leftJoin = "";
        $this->open = 0;
        $this->close = 0;
        return $this;
    }


    /**
     * Удаление записи из таблицы.
     * Данное действие возможно лишь в случае когда у объекта есть целочисленной значение свойства id
     */
    public function delete($obj)
    {
        $sTableName = $obj->getTableName();
        $query = "DELETE FROM " . $sTableName . " WHERE id = " . $obj->getId();
        $this->executeQuery($query);
        if(TEST_MODE_ORM) echo "<br>Строка из метода <b>delete()</b>: " . $query;
    }


    /**
     *	Метод указывающий название таблицы и параметры, которые из неё будут выбираться.
     *	Если параметры не заданы тогда выбираются все столбцы таблицы.
     *	@return self
     */
    public function select($aParams, $as = null)
    {
        //Если был передан массив параметров
        if(is_array($aParams))
        {
            for($i = 0; $i < count($aParams); $i++)
            {
                $i + 1 == count($aParams)
                    ? $this->select .= $aParams[$i]
                    : $this->select .= $aParams[$i].", ";
            }
            return $this;
        }

        //Если была передана строка
        if(is_string($aParams))
        {
            $this->select == ""
                ? $this->select .= $aParams." "
                : $this->select .= ", ".$aParams." ";

            if(!is_null($as))	$this->select .= "as " . $as . " ";

            return $this;
        }

        return $this;
    }


    /**
     * Сеттер для свойства from
     *
     * @param $aTables - название или массив названий таблиц, из которых будет производиться выборка
     * @return self
     */
    public function from($aTables)
    {
        if(is_array($aTables))
        {
            $count = count($aTables);

            for($i = 0; $i < $count; $i++)
            {
                !stristr($this->from, $aTables[$i])
                    ? $this->from .= ", "
                    : $this->from .= " ";

                $this->from .= $aTables[$i];
            }

            return $this;
        }

        if(is_string($aTables))
        {
            if(!stristr($this->from, $aTables))
                if($this->from != "")
                    $this->from .= ", ".$aTables." ";
                else
                    $this->from .= " ".$aTables." ";

            return $this;
        }

        return $this;
    }


    /**
     * Реализация SQL оператора BETWEEN
     *
     * @param $param - название столбца таблицы
     * @param $val1 - значение "От"
     * @param $val2 - значение "До"
     * @param string $condition - стандартное условие перед оператором (and/or)
     * @return $this
     */
    public function between($param, $val1, $val2, $condition = "and")
    {
        if( $this->where != "" )
        {
            for( $i = 0; $i < $this->open; $i++ )
                $condition .= " (";
            $this->open = 0;
            $this->where .= " " . $condition . " ";
        }
        else
        {
            for( $i = 0; $i < $this->open; $i++ )
                $this->where .= " (";
            $this->open = 0;
        }

        $this->where .= $param . " BETWEEN '" . $val1 . "' AND '" . $val2 . "' ";
        return $this;
    }


    /**
     * Сеттер для свойства where, задание условий выборки
     *
     * @param $row - название столбца таблицы
     * @param null $operation - логический оператор (">", "<", ">=", "<=", "=", "<>", "NOT", "IN")
     * @param null $value - сравниваемое значение
     * @param null $or - костыльный указатель. Если $or = null -> перед условием будет AND
     * @return $this
     */
    public function where($row, $operation = null, $value = null, $or = null)
    {
        if(($operation == "in" || $operation == "IN") && is_array($value))
        {
            if(count($value) == 0)  return $this;

            if($this->where != "" && $or === null) $this->where .= "and ";
            if($this->where != "" && $or !== null) $this->where .= "or ";

            $this->where .= $row . " in(";

            for($i = 0; $i < count($value); $i++)
            {
                $i == 0
                    ?   $this->where .= "'" . $value[$i] . "' "
                    :   $this->where .= ", '" . $value[$i] . "' ";
            }

            $this->where .= ") ";
            return $this;
        }

        if(!is_null($row) && !is_null($operation) && !is_null($value))
        {
            //Если это не первое условие тогда доавляем логический оператор
            if($this->where != "")
                $condition = is_null($or)   ? "and " : $or . " ";
            else
                $condition = "";

            if($this->open != 0)
            {
                for( $i = 0; $i < $this->open; $i++ )
                    $condition .= " (";
                $this->open = 0;
            }

            $this->where .= $condition;
            $this->where .= $row." ".$operation." ";

            if(is_object($value) && $value->type == "unchanged")
            {
                $val = $value->val . " ";
            }
            else
            {
                $val = "'".$value."' ";
            }

            if( $value === "NULL" || $value === null )
                $val = "NULL";

            $this->where .= $val . " ";
        }

        return $this;
    }


    /**
     * Указание полей сортировки и её тип
     *
     * @param - название столбца
     * @order - тип сортировки "ASC" / "DESC"
     * @return self
     */
    public function orderBy($row, $order = "ASC")
    {
        if(is_array($row))
        {
            $countParams = count($row);

            for($i = 0; $i < $countParams; $i++)
            {
                $this->order != ""
                    ? $this->order .= ", "
                    : $this->order .= " ";

                $this->order .= $row[$i][0];

                count($row[$i]) > 1
                    ? $this->order .= " ".$row[$i][1]
                    : $this->order .= " ASC";
            }

            return $this;
        }

        if(is_string($row) && is_string($order))
        {
            if(!stristr($this->order, $row))
                $this->order != ""
                    ? $this->order .= ", "
                    : $this->order .= " ";
            $this->order .= $row." ".$order;

            return $this;
        }

        return $this;
    }


    /**
     * Задание предела (свойства limit) количества выбираемых записей
     *
     * @param $count - макс. количество
     * @return $this
     */
    public function limit($count)
    {
        if(!is_numeric($count))
            return $this;

        $this->limit .= $count;
        return $this;
    }


    /**
     * Задание отступа (свойства offset)
     *
     * @param $val - значение отступа
     * @return $this
     */
    public function offset($val)
    {
        if($this->offset == "") $this->offset = intval($val);
        return $this;
    }


    /**
     * Реализация оператора JOIN (свойство join)
     *
     * @param $table - название присоеденяемой таблицы
     * @param $condition - условие присоеденения
     * @return $this
     */
    public function join($table, $condition)
    {
        $this->join .= " JOIN " . $table . " ON " . $condition;
        return $this;
    }


    /**
     * Реализация оператора LEFT JOIN (свойство leftJoin)
     *
     * @param $table - название присоеденяемой таблицы
     * @param $condition - условие присоеденения
     * @return $this
     */
    public function leftJoin($table, $condition)
    {
        $this->leftJoin = " LEFT JOIN " . $table . " ON " . $condition;
        return $this;
    }

    public function having($row, $operation, $value)
    {
        if($this->having != "") $this->having .= " and ".$row." ".$operation." ".$value;
        else $this->having = $row." ".$operation." ".$value;

        return $this;
    }


    public function groupBy($val)
    {
        if($this->groupby == "")    $this->groupby = $val;
        else    $this->groupby .= ", ".$val;
        return $this;
    }


    /**
     * Выполнение сформированного SQL-запроса выборки данных с возвращением
     *
     * @return array - массив объектов
     */
    public function findAll()
    {
        $this->setQueryString();

        if(TEST_MODE_ORM)
        {
            echo "<br>Строка запроса из метода <b>findAll()</b>: ".$this->queryString;
        }

        try
        {
            $result = Core_Database::getConnect()->query($this->queryString);

            if(!$result) return array();

            $result->setFetchMode(PDO::FETCH_CLASS, $this->class);
            return $result->fetchAll();
        }
        catch(PDOException $Exception)
        {
            die( $Exception->getMessage() );
        }
    }


    /**
     * Выполнение сформированного SQL-запроса выборки данных, однако результатом является не массив, а объект
     *
     * @return bool|object
     */
    public function find()
    {
        $this->setQueryString();

        if(TEST_MODE_ORM)
        {
            echo "<br>Строка запроса из метода <b>find()</b>: ".$this->queryString;
        }

        try
        {
            $result = Core_Database::getConnect()->query($this->queryString);

            if(!$result) return false;

            $result->setFetchMode(PDO::FETCH_CLASS, $this->class);
            return $result->fetch();
        }
        catch(PDOException $Exception)
        {
            die( $Exception->getMessage() );
        }
    }








}