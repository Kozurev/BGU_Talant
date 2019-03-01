<?php
/**
 *
 *
 * @author BadWolf
 * @date 27.02.2019 11:30
 * Class Olympiad
 */
class Olympiad extends Core_Entity
{

    protected $tableRows = ['id', 'category', 'sortorder', 'fullname', 'shortname', 'idnumber', 'summary',
                            'summaryformat', 'format', 'showgrades', 'newsitems', 'startdate', 'enddate', 'marker',
                            'maxbytes', 'legacyfiles', 'showreports', 'visible', 'visibleold', 'groupmode',
                            'groupmodeforce', 'defaultgroupingid', 'lang', 'calendartype', 'theme', 'timecreated',
                            'timemodified', 'requested', 'enablecompletion', 'completionnotify', 'cacherev', 'logo',
                            'level_id'];


    public function databaseTableName()
    {
        global $CFG;
        return $CFG->prefix . 'course';
    }


    public function __construct()
    {
        $this->queryBuilder()->where( 'category', '=', COURSE_CATEGORY_OLYMPIAD );
    }


    /**
     * Формирование списка из полного названия олимпиады, логотипа и уровня
     *
     * Объект в результирующем массиве имеет значения свойств:
     *      id          идентификатор олимпиады (курса)
     *      shortname   краткое название олимпиады (курса)
     *      fullname    полное название олимпиады (курса)
     *      logo        itemid файла логотипа
     *      filename    название файла логотипа
     *      level       название уровня олимпиады
     *      src         сформированный абсолютный путь к изображению
     *      countusr    количество пользователей подписанных ка курс (олимпиаду) за все время
     *      counttests  количество тестов принадлежащих курсу
     *
     * @return array
     */
    public static function getShortList()
    {
        global $CFG;

        $Olympiad = new Olympiad();
        $Olympiads = $Olympiad->queryBuilder()
            ->select( ['course.id', 'course.logo', 'shortname', 'fullname', 'filename', 'level.title AS level',
                        'count(u_enrol.userid) as countusr'] )
            ->from( $CFG->prefix . 'course', 'course' )
            ->leftJoin( $CFG->prefix . 'files', 'itemid = logo AND filesize <> 0' )
            ->join( $CFG->prefix . 'enrol AS enrol', 'enrol.courseid = course.id' )
            ->join( $CFG->prefix . 'user_enrolments AS u_enrol', 'u_enrol.enrolid = enrol.id' )
            ->join( $CFG->prefix . 'level AS level', 'level.id = course.level_id' )
            ->groupBy( 'course.id' )
            ->orderBy( 'id', 'DESC' )
            ->findAll();

        $olympiadIds = [];

        foreach ( $Olympiads as $Olympiad )
        {
            $olympiadIds[] = $Olympiad->id;
            $Olympiad->src = $CFG->wwwroot . '/draftfile.php/5/user/draft/' . $Olympiad->logo . '/' . $Olympiad->filename;
        }

        $QueryBuilder = new Orm();
        $courseTests = $QueryBuilder
            ->select( ['course.id AS courseid', 'count(test.id) AS counttests'] )
            ->from( $CFG->prefix . 'course', 'course' )
            ->leftJoin( $CFG->prefix . 'grade_items AS test', 'test.courseid = course.id AND itemtype = \'mod\'' )
            ->whereIn( 'course.id', $olympiadIds )
            ->groupBy( 'course.id' )
            ->orderBy( 'course.id', 'DESC' )
            ->findAll();

        foreach ( $Olympiads as $Olympiad )
        {
            $Olympiad->counttests = 0;

            foreach ( $courseTests as $key => $courseTest )
            {
                if ( $Olympiad->id = $courseTest->courseid )
                {
                    $Olympiad->counttests = $courseTest->counttests;
                    unset( $courseTests[$key] );
                    break;
                }
            }
        }

        return $Olympiads;
    }


    /**
     * Поиск всех тестов олимпиады
     *
     * @return array
     */
    public function getTests()
    {
        global $CFG;

        if ( !isset( $this->id ) || empty( $this->id ) )
        {
            return [];
        }

        $QueryBuilder = new Orm();
        return $QueryBuilder
            ->select( ['id', 'itemname', 'categoryid', 'courseid'] )
            ->from( $CFG->prefix . 'grade_items' )
            ->where( 'hidden', '=', 1 )
            ->where( 'itemtype', '=', 'mod' )
            ->where( 'courseid', '=', $this->id )
            ->findAll();
    }


}