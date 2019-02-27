<?php
/**
 * Класс для работы с тестами
 *
 * @author BadWolf
 * @date 27.02.2019 16:17
 * Class Test
 */

//require_once ROOT . '/config.php';
//require_once $CFG->libdir . '/tablelib.php';

class Test extends Core_Entity
{
    protected $tableRows = ['id', 'courseid', 'categoryid', 'itemname', 'itemtype', 'itemmodule', 'iteminstance',
                            'itemnumber', 'iteminfo', 'idnumber', 'calculation', 'gradetype', 'grademax', 'grademin',
                            'gradepass', 'multfactor', 'plusfactor', 'aggregationcoef', 'aggregationkoef2',
                            'sortorder', 'display', 'hidden', 'locked', 'locktime', 'needsupdate', 'weightoverride',
                            'timecreated', 'timemodified'];


    public function databaseTableName()
    {
        global $CFG;
        return $CFG->prefix . 'grade_items';
    }


    /**
     * Формирование таблицы отчета по одному или нескольким тестам
     *
     * @param array $testIds
     * @return html_table
     */
    public static function getReport( array $testIds )
    {
        global $CFG;
        require_once $CFG->libdir . '/tablelib.php';

        $table = new html_table();
        $table->head = ['ФИО', 'email', 'Класс', 'Школа', 'Предмет', 'Область', 'Город', 'Балы'];
        $table->data = [];

        if ( count( $testIds ) == 0 )
        {
            return $table;
        }

//        SELECT
//               test.itemname, CONCAT(usr.lastname, ' ', usr.firstname, ' ', usr.patronymic) AS fio, usr.email,
//               app.educational_institution, region.name, city.name, res.finalgrade
//        FROM mdl_grade_grades AS res
//          INNER JOIN mdl_grade_items AS test ON res.itemid = test.id
//          INNER JOIN mdl_user AS usr ON usr.id = res.userid
//          INNER JOIN mdl_olympiad_application AS app ON app.user_id = usr.id AND app.olympiad_id = test.courseid
//          LEFT JOIN mdl_address_region AS region ON region.id = app.region_id
//          LEFT JOIN mdl_address_city AS city ON region.id = app.region_id
//
//        WHERE res.itemid = @testid
//        GROUP BY usr.id
//        ORDER BY finalgrade DESC
Orm::Debug( true );
        $QueryBuilder = new Orm();
        $Results = $QueryBuilder
            ->select( ['test.itemname', 'CONCAT(usr.lastname, \' \', usr.firstname, \' \', usr.patronymic) AS fio',
                        'usr.email', 'app.educational_institution', 'region.name', 'city.name', 'res.finalgrade'] )
            ->from( $CFG->prefix . 'grade_grades', 'res' )
            ->join( $CFG->prefix . 'grade_items AS test', 'res.itemid = test.id' )
            ->join( $CFG->prefix . 'user AS usr', 'usr.id = res.userid' )
            ->join( $CFG->prefix . 'olympiad_application AS app', 'app.user_id = usr.id AND app.olympiad_id = test.courseid' )
            ->leftJoin( $CFG->prefix . 'address_region AS region', 'region.id = app.region_id' )
            ->leftJoin( $CFG->prefix . 'address_city AS city', 'region.id = app.region_id' )
            ->whereIn( 'res.itemid', $testIds )
            ->groupBy( 'usr.id' )
            ->orderBy( 'res.itemid', 'ASC' )
            ->orderBy( 'finalgrade', 'DESC' )
            ->findAll();

        debug( $Results );

        return $table;
    }

}