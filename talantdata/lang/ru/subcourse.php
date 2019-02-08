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
 * Strings for component 'subcourse', language 'ru', branch 'MOODLE_35_STABLE'
 *
 * @package   subcourse
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['completioncourse'] = 'Необходимо завершить связанный курс';
$string['completioncourse_help'] = 'При включенном параметре элемент считается выполненным,  если студент завершит связанный курс.';
$string['completioncourse_text'] = 'Студент должен завершить связанный курс для выполнения этого элемента';
$string['currentgrade'] = 'Текущая оценка: {$a}';
$string['errfetch'] = 'Не удалось получить оценки: код ошибки {$a}';
$string['errlocalremotescale'] = 'Не удалось получить оценки: итоговая оценка в связанном курсе использует локальную шкалу оценок.';
$string['eventgradesfetched'] = 'Оценки получены';
$string['fetchnow'] = 'Получить оценки';
$string['gotocoursename'] = 'Перейти к курсу <a href="{$a->href}">{$a->name}</a>';
$string['hiddencourse'] = '*скрытый*';
$string['instantredirect'] = 'Перенаправлять в связанный курс';
$string['instantredirect_help'] = 'При включенном параметре пользователи будут перенаправлены в связанный курс при попытке посмотреть страницу модуля «Субкурс». Не влияет на пользователей, которым разрешено вручную получать оценки.';
$string['lastfetchnever'] = 'Оценки еще не были получены';
$string['lastfetchtime'] = 'Последнее обновление: {$a}';
$string['modulename'] = 'Субкурс';
$string['modulename_help'] = 'Модуль выполняет очень простую, но полезную функцию. При добавлении в курс, он ведет себя как элемент курса. Оценка для каждого студента берется из итоговой оценки другого курса. В сочетании с метакурсами, это позволяет разработчикам организовывать курсы в виде набора отдельных модулей.';
$string['modulenameplural'] = 'Субкурсы';
$string['nocoursesavailable'] = 'Нет курсов, из которых вы могли бы получить оценки';
$string['nosubcourses'] = 'В данном курсе отсутствуют субкурсы';
$string['pluginadministration'] = 'Управление субкурсом';
$string['pluginname'] = 'Субкурс';
$string['refcourse'] = 'Связанный курс';
$string['refcoursecurrent'] = 'Сохранить текущую связь';
$string['refcourse_help'] = 'Связанный курс — курс, из которого берется оценка для данного элемента курса. Студенты должны быть записаны на связаный курс.

В этом списке отображаются только курсы, для которых вы являетесь учителем. Вы можете попросить администратора сайта настроить этот субкурс для получения оценок из других курсов.';
$string['refcourselabel'] = 'Получить оценки из';
$string['refcoursenull'] = 'Связанный курс не задан';
$string['subcourse:addinstance'] = 'Добавить новый субкурс';
$string['subcourse:begraded'] = 'Получить оценку из связанного курса';
$string['subcourse:fetchgrades'] = 'Получать оценки вручную из связанного курса';
$string['subcoursename'] = 'Название субкурса';
$string['taskcheckcompletedrefcourses'] = 'Проверка завершения связанных курсов';
$string['taskfetchgrades'] = 'Получить оценки субкурса';
