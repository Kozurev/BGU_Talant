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
 * Strings for component 'enrol_notificationeabc', language 'ru', branch 'MOODLE_31_STABLE'
 *
 * @package   enrol_notificationeabc
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['activarglobal'] = 'Активировать везде (зачислен)';
$string['activarglobalenrolupdated'] = 'Активировать везде (обновлен)';
$string['activarglobalenrolupdated_help'] = 'Уведомления об обновлении статуса зачисления будут включены на всем сайте';
$string['activarglobal_help'] = 'Уведомления о зачислении будут включены на всем сайте';
$string['activarglobalunenrolalert'] = 'Активировать везде (отчислен)';
$string['activarglobalunenrolalert_help'] = 'Уведомления об отчислении будут включены на всем сайте';
$string['activeenrolalert'] = 'Активировать уведомления (зачислен)';
$string['activeenrolalert_help'] = 'Будут включены уведомления о зачислении на курс';
$string['activeenrolupdatedalert'] = 'Активировать уведомления (обновлен)';
$string['activeenrolupdatedalert_help'] = 'Будут включены уведомления об обновлении статуса зачисления на курс';
$string['activeunenrolalert'] = 'Активировать уведомления (отчислен)';
$string['activeunenrolalert_help'] = 'Будут включены уведомления об отчислении из курса';
$string['emailsender'] = 'Почта отправителя';
$string['emailsender_help'] = 'По умолчанию установлен адрес почты техподдержки';
$string['fecha'] = 'Период для проверки пользователей, зачисленных на курсы';
$string['filelockedmail'] = 'Вы были зачислены на курс {$a->fullname} ({$a->url})';
$string['location'] = 'Сообщение о зачислении';
$string['location_help'] = 'Персонифицируйте сообщение о том, что пользователи были зачислены на курс. Это поле принимает следующие выражения подстановки, которые затем будут заменены соответствующими значениями:
<pre>
{COURSENAME} = полное название курса
{USERNAME} = имя пользователя (логин)
{NOMBRE} = фамилия
{APELLIDO} = имя
{URL} = ссылка на курс (url)
</pre>';
$string['messageprovider:notificationeabc_enrolment'] = 'Отсылать уведомления о зачислении';
$string['namesender'] = 'Имя отправителя';
$string['namesender_help'] = 'По умолчанию установлено имя техподдержки';
$string['notificationeabc:manage'] = 'Управлять уведомлениями';
$string['pluginname'] = 'Уведомления о зачислении на курс';
$string['pluginname_desc'] = 'Позволяет отправлять на почту пользователей уведомления о том, что они зачислены на курс (или отчислены либо их статус в курсе был изменен)';
$string['status'] = 'Уведомления активны';
$string['subject'] = 'Уведомление о регистрации на курс';
$string['unenrolmessage'] = 'Сообщение об отчислении';
$string['unenrolmessagedefault'] = 'Вы были отчислены из курса {$a->fullname} ({$a->url})';
$string['unenrolmessage_help'] = 'Персонифицируйте сообщение о том, что пользователи были отчислены из курса. Это поле принимает следующие выражения подстановок, которые затем будут заменены соответствующими значениями:
<pre>
{COURSENAME} = полное название курса
{USERNAME} = имя пользователя (логин)
{NOMBRE} = фамилия
{APELLIDO} = имя
{URL} = ссылка на курс (url)
</pre>';
$string['updatedenrolmessage'] = 'Сообщение обновления статуса';
$string['updatedenrolmessagedefault'] = 'Ваш статус зачисления на курсе {$a->fullname} был обновлен ({$a->url})';
$string['updatedenrolmessage_help'] = 'Персонализируйте сообщение о том, что статус пользователя в курсе был обновлен. Это поле принимает следующие выражения подстановок, которые затем будут заменены соответствующими значениями:
<pre>
{COURSENAME} = полное название курса
{USERNAME} = имя пользователя (логин)
{NOMBRE} = фамилия
{APELLIDO} = имя
{URL} = ссылка на курс (url)
</pre>';
