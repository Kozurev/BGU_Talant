<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * renderers/core_renderer.php
 *
 * @package    theme_klass
 * @copyright  2015 onwards LMSACE Dev Team (http://www.lmsace.com)
 * @author    LMSACE Dev Team
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
defined('MOODLE_INTERNAL') || die();
/**
 * Klass theme core renderer class
 * @copyright  2015 onwards LMSACE Dev Team (http://www.lmsace.com)
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
class theme_klass_core_renderer extends theme_boost\output\core_renderer {
    /**
     * Header custom menu renderer.
     *
     * @param custom_menu $menu
     * @return string
     */
    public function custom_menu_render(custom_menu $menu) {
        global $CFG;
        $langs = get_string_manager()->get_list_of_translations();
        $haslangmenu = $this->lang_menu() != '';
        if (!$menu->has_children() && !$haslangmenu) {
            return '';
        }
        $content = '';
        foreach ($menu->get_children() as $item) {
            $context = $item->export_for_template($this);
            $content .= $this->render_from_template('theme_klass/custom_menu_item', $context);
        }
        return $content;
    }


    /**
     * Формирование HTML-кода для блоков
     *
     * @date 22.08.2018
     * @author Bad Wolf
     * @param $Blocks - массив объектов stdClass()
     * @return string
     * Обязательные свойства объектов:
     *      label - текст синей кнопки
     *      link -  ссылка
     *      img -   изображение
     */
    public function renderBlocks( $Blocks )
    {
        //TODO: добавить вывод текста ошибок при помощи функции get_string
        global $CFG;

        if( !is_array( $Blocks ) )  return "";

        $output = "<div id='table_content' align='center'><div class='s-menu'>";
        foreach ( $Blocks as $Block )
        {
            if( !is_object( $Block ) || get_class( $Block ) !== "stdClass" )    return "";
            if( !isset( $Block->label ) )   $Block->label = "";
            if( !isset( $Block->link ) )    $Block->link = "#";
            if( !isset( $Block->img ) )     $Block->img = $CFG->wwwroot . "/theme/klass/pix/boxes/default.png";

            $output .= "<div class='box'>";
            $output .= "<a href='" . strval( $Block->link ) . "'>";
            $output .= "<img width='260' height='260' src='" . strval( $Block->img ) . "' />";
            $output .= "<b>" . strval( $Block->label ) . "</b>";
            $output .= "</a></div>";
        }
        $output .= "</div></div>";
        return $output;
    }
}