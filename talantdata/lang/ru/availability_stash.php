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
 * Strings for component 'availability_stash', language 'ru', branch 'MOODLE_35_STABLE'
 *
 * @package   availability_stash
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['condition'] = 'состояние';
$string['description'] = 'Для получения доступа требуется объект в тайнике пользователя.';
$string['exactly'] = 'точно';
$string['lessthan'] = 'меньше чем';
$string['morethan'] = 'больше чем';
$string['object'] = 'объект';
$string['objectnnotrequiredtogetaccess'] = 'Не имеется {$a->condition} {$a->quantity}x \'{$a->object}\' в Вашем тайнике';
$string['objectnrequiredtogetaccess'] = 'Имеется {$a->condition} {$a->quantity}x \'{$a->object}\' в Вашем тайнике.';
$string['pluginname'] = 'Наличие тайника';
$string['quantity'] = 'количество';
$string['theirstashcontains'] = 'Тайник содержит {$a->conditions} {$a->quantity} {$a->objects}';
$string['title'] = 'Объекты тайника';
$string['unknowncondition'] = '[Неизвестное состояние]';
$string['unknownobject'] = '[Неизвестный объект]';
$string['youhavegota'] = 'У Вас есть \'{$a->object}';
$string['youhavegotlessthanna'] = 'У Вас меньше чем {$a->quantity}x \'{$a->object}';
$string['youhavegotmorethanna'] = 'У Вас больше чем {$a->quantity}x \'{$a->object}';
$string['youhavegotna'] = 'У Вас {$a->quantity}x \'{$a->object}';
$string['youhaventgota'] = 'У Вас нет \'{$a->object}';
$string['youhaventgotanya'] = 'У Вас нет ни одного \'{$a->object}';
$string['youhaventgotlessthanna'] = 'У Вас нет менее {$a->quantity}x \'{$a->object}';
$string['youhaventgotmorethanna'] = 'У Вас нет более {$a->quantity}x \'{$a->object}';
$string['youhaventgotna'] = 'У Вас нет {$a->quantity}x \'{$a->object}';
