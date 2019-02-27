<?php
/**
 * Блок в котором реализован функционал связанный с составлением отчетов и экспортом
 *
 * @author: BadWolf
 * @date: 26.02.2019 18:44
 * @version 20190227
 */
global $CFG;
require_once $CFG->dirroot . '/blocks/moodleblock.class.php';
require_once $CFG->libdir . '/custom/autoload.php';

class block_export extends block_base
{
    const BLOCK_TITLE_FULL  = 'Подведение итогов и экспорт данных';
    const BLOCK_TITLE_SHORT = 'Экспорт';

    public function init()
    {
        $this->title = self::BLOCK_TITLE_FULL;
    }


    public function get_content()
    {
        global $CFG;
        $this->content = new stdClass();
        $this->content->text = '';

        if ( User::current()->getRoleId() != 1 )
        {
            return $this->content;
        }

        $exportLinks = []; //Список ссылок на скрипты экспорта данных
        $exportLinks[0]['title'] = 'Экспорт результатов тестирования олимпиад';
        $exportLinks[0]['href'] = $CFG->wwwroot . '/blocks/export/olympiad_tests.php';

        foreach ( $exportLinks as $link )
        {
            $this->content->text .= '<a href="' . $link['href'] . '">' . $link['title'] . '</a><br/>';
        }

        return $this->content;
    }






    /**
     * Locations where block can be displayed.
     *
     * @return array
     */
    public function applicable_formats() {
        return array('my' => true);
    }

}