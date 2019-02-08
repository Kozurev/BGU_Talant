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
 * Strings for component 'quizaccess_ipaddresslist', language 'ru', branch 'MOODLE_34_STABLE'
 *
 * @package   quizaccess_ipaddresslist
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addsubnet'] = 'Добавать расположение';
$string['allowedsubnets'] = 'Разрешенные расположения';
$string['allowedsubnets_help'] = 'Доступ к тесту может быть ограничен конкретными расположениями на основании IP-адреса. Список расположений и соответствующих IP-адресов и подсетей устанавливается администратором сайта. Не выбирайте ничего, чтобы отключить эту проверку расположения.';
$string['editsubnet'] = 'Редактирование расположения';
$string['managesubnets'] = 'Управление расположениями';
$string['pluginname'] = 'Правило доступа к тесту: список IP-адресов';
$string['subnet'] = 'IP подсеть';
$string['subnet_help'] = 'Укажите список полных или частичных IP-адресов через запятую.

Примеры:

* 192.168.10.1
* 192.168.
* 231.54.211.0/20
* 231.3.56.10-20
* 192.168.10.1,192.168.,231.54.211.0/20,231.3.56.10-20';
$string['subnetwrong'] = 'Этот тест доступен только с определенных компьютеров; этот компьютер не находится в списке разрешенных.';
