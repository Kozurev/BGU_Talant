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
 * Strings for component 'local_purgequestioncategory', language 'ru', branch 'MOODLE_34_STABLE'
 *
 * @package   local_purgequestioncategory
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['confirmmessage'] = 'Вы собираетесь полностью удалить эту категорию вопросов. Если Вы продолжите, эта категория и все содержащиеся в ней подкатегории и неиспользуемые вопросы будут навсегда удалены. Это действие будет невозможно отменить!';
$string['confirmpurge'] = 'Подтвердите полное удаление категории вопросов';
$string['iconfirm'] = 'Я подтверждаю, что понимаю, что делаю';
$string['infowithmove'] = 'В категории «{$a->name}» содержится: подкатегорий - {$a->subcategories}, неиспользуемых вопросов - {$a->unusedquestions}, вопросов, которые нельзя удалить - {$a->usedquestions} (это вопросы, которые используются в существующих тестах или в сохраненных попытках прохождения тестов). Укажите другую категорию, в которую следует переместить вопросы, которые нельзя удалить.';
$string['infowithoutmove'] = 'В категории «{$a->name}» содержится: подкатегорий - {$a->subcategories}, неиспользуемых вопросов - {$a->unusedquestions}.';
$string['pluginname'] = 'Полное удаление категорий вопросов';
$string['purgecategories'] = 'Полное удаление категорий';
$string['purgequestioncategory:purgecategory'] = 'Удалять категорию вопросов вместе со вcеми подкатегориями и вопросами';
$string['purgethiscategory'] = 'Полностью удалить эту категорию';
$string['validationcategory'] = 'Пожалуйста, выберите корректную категорию.';
$string['validationconfirm'] = 'Вы должны подтвердить это действие';
