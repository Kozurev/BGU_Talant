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
 * Strings for component 'scheduler', language 'ru', branch 'MOODLE_35_STABLE'
 *
 * @package   scheduler
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['action'] = 'Действие';
$string['actions'] = 'Действия';
$string['addappointment'] = 'Добавить другого студента';
$string['addcommands'] = 'Добавить промежутки времени';
$string['addondays'] = 'Добавить встречи на';
$string['addsession'] = 'Добавить повторяющиеся промежутки времени';
$string['addsingleslot'] = 'Добавить один промежуток времени';
$string['addslot'] = 'Вы можете в любой момент добавить дополнительные промежутки времени для встреч.';
$string['addstudenttogroup'] = 'Добавить этого студента к группе';
$string['allappointments'] = 'Все встречи';
$string['allononepage'] = 'Все промежутки времени на одной странице';
$string['allowgroup'] = 'Промежуток времени для одного студента — щелкните для изменения';
$string['allteachersgrading'] = 'Учителя могут выставлять оценки за все встречи';
$string['allteachersgrading_desc'] = 'При включенном параметре учителя могут оценивать встречи, в которых они не участвовали.';
$string['alreadyappointed'] = 'Запись на встречу невозможна. На указанное время больше нет свободных мест.';
$string['appointagroup_help'] = 'Выберите, хотите ли Вы записать на встречу только себя или же хотите записать всю группу целиком.';
$string['appointforgroup'] = 'Назначить встречи для: {$a}';
$string['appointingstudent'] = 'Встреча для промежутка времени';
$string['appointingstudentinnew'] = 'Встреча для нового промежутка времени';
$string['appointment'] = 'Встреча';
$string['appointmentmode'] = 'Настройка режима записи на встречи';
$string['appointmentmode_help'] = '<p> Здесь Вы можете выбрать несколько вариантов назначения встреч. </p>
<p><ul>
<li> <strong>«<emph>n</emph> встреч в этом элементе курса».</strong> Студент может записаться только на определенное количество встреч в этом элементе курса типа «Планирование встреч». Даже если учитель поставит отметку «Присутствовал», студент не сможет записаться на другие встречи. Единственный способ дать ему записаться на другие встречи — удалить старые записи с пометкой «Присутствовал».
</li><strong> «<emph>n</emph> встреч одновременно»:</strong> Студент может записаться на определенное количество встреч. После того как встреча прошла и учитель поставил отметку «Присутствовал», студент сможет записаться на другие встречи. Тем не менее, студент в любой момент времени ограничен <emph>n</emph> «открытыми» (несостоявшимися) встречами.
</li>
</ul>
</p>';
$string['appointmentno'] = 'Встреча {$a}';
$string['appointments'] = 'Встречи';
$string['appointmentsgrouped'] = 'Встречи, сгруппированные по времени';
$string['appointmentsummary'] = 'Встреча {$a->startdate} с {$a->starttime} до {$a->endtime} с {$a->teacher}';
$string['appointsolo'] = 'только я';
$string['appointsomeone'] = 'Добавить новую встречу';
$string['attendable'] = 'Могут записаться';
$string['attendablelbl'] = 'Всего кандидатов для записи';
$string['attended'] = 'Записаны';
$string['attendedlbl'] = 'Всего записанных студентов';
$string['attendedslots'] = 'Занятые промежутки времени';
$string['availableslots'] = 'Доступные промежутки времени';
$string['availableslotsall'] = 'Все промежутки времени';
$string['availableslotsnotowned'] = 'Чужие';
$string['availableslotsowned'] = 'Мои';
$string['bookslot'] = 'Записаться на это время';
$string['bookwithteacher'] = 'Учитель';
$string['bookwithteacher_help'] = 'Выберите учителя для встречи.';
$string['break'] = 'Перерыв между промежутками времени';
$string['breaknotnegative'] = 'Величина перерыва не может быть отрицательным числом';
$string['canbook1appointment'] = 'Вы можете записаться на еще одну встречу в этом элементе курса.';
$string['canbooknappointments'] = 'Вы можете записаться еще на {$a} встреч в этом элементе курса.';
$string['canbooknofurtherappointments'] = 'Вы не можете записаться на другие новые встречи в этом элементе курса.';
$string['canbooksingleappointment'] = 'Вы можете записаться на одну встречу в этом элементе курса.';
$string['canbookunlimitedappointments'] = 'Вы можете записаться на любое количество встреч в этом элементе курса.';
$string['cancelbooking'] = 'Отменить запись';
$string['chooseexisting'] = 'Выберите существующий';
$string['choosingslotstart'] = 'Укажите время начала промежутка';
$string['choosingslotstart_help'] = 'Измените (или выберите) время начала встречи. Если данная встреча будет накладываться на другие промежутки времени, Вам будет задан вопрос о замене данным промежутком всех промежутков, с которыми выявлены «накладки». Обратите внимание, что настройки нового промежутка времени заменят все предыдущие настройки.';
$string['comments'] = 'Примечания';
$string['complete'] = 'Занято';
$string['conflictingslots'] = 'Пересекающиеся промежутки времени';
$string['contentformat'] = 'Формат';
$string['contentformat_help'] = '<p>Есть три базовых варианта для формата экспорта, которые отличаются способом обработки промежутков времени с несколькими встречами.
     <dl>
         <dt>Одна строка на каждый промежуток времени</dt>:
         <dd>Файл экспорта будет содержать одну строку для каждого промежутка времени. Если на это время назначено несколько встреч, то вместо имени студента и других данных будет выведен маркер «(несколько)».</dd>
         <dt>Одна строка на каждую встречу</dt>:
         <dd>Файл экспорта будет содержать одну строку для каждой встречи. Если на какое-то время назначено несколько встреч, то соответствующий промежуток времени появится в списке несколько раз (данные промежутка будут повторяться).</dd>
         <dt>Встречи, сгруппированные по времени</dt>:
         <dd>Все встречи, назначенные на одно и то же время, будут сгруппированы вместе, перед ними будет стоять строка заголовка с указанием промежутка времени. Этот режим может плохо работать с экспортом в формат CSV, так как число столбцов будет различаться.</dd>
    </dl>
Вы можете изучить влияние этих настроек, используя кнопку «Предварительный просмотр».</p>';
$string['course'] = 'Курс';
$string['createexport'] = 'Создать файл экспорта';
$string['csvfieldseparator'] = 'Разделитель полей для формата CSV';
$string['csvformat'] = 'CSV';
$string['cumulatedduration'] = 'Общая продолжительность встреч';
$string['datatoinclude'] = 'Данные для экспорта';
$string['datatoinclude_help'] = 'Выберите поля, которые должны быть включены в файл экспорта. Каждое из них появится в отдельном столбце файла экспорта.';
$string['date'] = 'Дата';
$string['datelist'] = 'Обзор';
$string['defaultslotduration'] = 'Продолжительность промежутка времени по умолчанию';
$string['defaultslotduration_help'] = 'Значение по умолчанию продолжительности (в минутах) промежутка времени для встреч, которые Вы настраиваете';
$string['deleteallslots'] = 'Удалить все промежутки времени';
$string['deleteallunusedslots'] = 'Удалить все неиспользованные промежутки времени';
$string['deletecommands'] = 'Удалить промежутки времени';
$string['deletemyslots'] = 'Удалить все мои промежутки времени';
$string['deleteselection'] = 'Удалить отмеченные промежутки времени';
$string['deletetheseslots'] = 'Удалить эти промежутки времени';
$string['deleteunusedslots'] = 'Удалить мои неиспользованные промежутки времени';
$string['department'] = 'Откуда?';
$string['disengage'] = 'Удалить мои встречи';
$string['displayfrom'] = 'Показать встречи студентам начиная с';
$string['distributetoslot'] = 'Распространить на всю группу';
$string['divide'] = 'Разбить на промежутки времени?';
$string['duration'] = 'Продолжительность';
$string['durationrange'] = 'Продолжительность промежутка времени должна быть в диапазоне от {$a->min} до {$a->max} минут.';
$string['email_applied_html'] = '<p>Студент <a href="{$a->attendee_url}">{$a->attendee}</a> записался на встречу {$a->date} в {$a->time} по курсу:

<p>{$a->course_short}: <a href="{$a->course_url}«>{$a->course}</a></p>

<p>с использованием элемента курса «Планирование встреч» под названием «<em>{$a->module}</em>» на сайте <a href="{$a->site_url}">{$a->site}</a>.</p>';
$string['email_applied_plain'] = 'Студент {$a->attendee} записался на встречу {$a->date} в {$a->time} по курсу:

{$a->course_short}: {$a->course}

с использованием элемента курса «Планирование встреч» под названием «{$a->module}» на сайте «{$a->site}».';
$string['email_applied_subject'] = '{$a->course_short}: Новая встреча';
$string['email_cancelled_html'] = '<p>Ваша встреча <strong>{$a->date}</strong> в <strong>{$a->time}</strong> со студентом <strong><a href="{$a->attendee_url}">{$a->attendee}</a></strong> по курсу:</p>

<p><strong>{$a->course_short}: <a href="{$a->course_url}«>{$a->course}</a></strong></p>

<p>в элементе курса «Планирование встреч» под названием «<em>{$a->module}</em>» на сайте <strong><a href="{$a->site_url}">{$a->site}</a></strong></p>

<p><strong><span class="error">была отменена или перенесена</span></strong>.</p>';
$string['email_cancelled_plain'] = 'Ваша встреча {$a->date} в {$a->time}
со студентом {$a->attendee} по курсу:

{$a->course_short}: {$a->course}

в элементе курса «Планирование встреч» под названием «{$a->module}» на сайте «{$a->site}»

была отменена или перенесена.';
$string['email_cancelled_subject'] = '{$a->course_short}: Встреча отменена или перенесена студентом';
$string['emailreminder'] = 'Отправить напоминание по электронной почте';
$string['email_reminder_html'] = '<p>У Вас назначена встреча <strong>{$a->date}</strong>
с <strong>{$a->time}</strong> до <strong>{$a->endtime}</strong><br/>
с <strong><a href="{$a->attendant_url}">{$a->attendant}</a></strong>.</p>

<p>Место встречи: <strong>{$a->location}</strong></p>';
$string['emailreminderondate'] = 'Дата отправки напоминания по электронной почте';
$string['email_reminder_plain'] = 'У Вас назначена встреча
{$a->date} с {$a->time} до {$a->endtime}
с {$a->attendant}.

Место встречи: {$a->location}';
$string['email_reminder_subject'] = '{$a->course_short}: Напоминание о встрече';
$string['email_teachercancelled_html'] = '<p>Ваша встреча <strong>{$a->date}</strong> в <strong>{$a->time} </strong> с <strong><a href="{$a->attendant_url}">{$a->attendant}</a></strong> ({$a->staffrole}) по курсу:</p>

<p><strong>{$a->course_short}: <a href="{$a->course_url}«>{$a->course}</a></strong></p>

<p>в элементе курса «Планирование встреч» под названием «<em>{$a->module}</em>» на сайте <strong><a href="{$a->site_url}">{$a->site}</a></strong></p>

<p><strong><span class="error">была отменена</span></strong>. Пожалуйста, запишитесь на другое время.</p>';
$string['email_teachercancelled_plain'] = 'Ваша встреча {$a->date} в {$a->time}
с {$a->attendant} ({$a->staffrole}) по курсу:

{$a->course_short}: {$a->course}

в элементе курса «Планирование встреч» под названием «{$a->module}» на сайте «{$a->site}»

была отменена. Пожалуйста, запишитесь на другое время.';
$string['email_teachercancelled_subject'] = '{$a->course_short}: Встреча отменена учителем';
$string['end'] = 'Окончание';
$string['enddate'] = 'Повторять промежутки времени до';
$string['event_appointmentlistviewed'] = 'Просмотрен список встреч в модуле «Планирование встреч»';
$string['event_bookingadded'] = 'Добавлена запись на встречу в модуле «Планирование встреч»';
$string['event_bookingformviewed'] = 'Просмотрена форма записи на встречу в модуле «Планирование встреч»';
$string['event_bookingremoved'] = 'Удалена запись на встречу в модуле «Планирование встреч»';
$string['everyone'] = 'Все';
$string['excelformat'] = 'Excel';
$string['exclusive'] = 'Встреча для одного';
$string['exclusivity'] = 'Ограничение на количество студентов';
$string['exclusivity_help'] = '<p>Вы можете установить максимальное число студентов, которые могут записаться на заданное время.</p>
<p>Установка значения «1» (по умолчанию) означает, что этот промежуток времени будет доступен только для одного студента.</p>
<p>Установка другого значения, например, «3» будет означать, что до трех студентов могут записаться на это время.</p>
<p>Если параметр отключен, любое количество студентов сможет записаться на это время; этот промежуток времени никогда не будет считаться «полностью занятым».</p>';
$string['exclusivityoverload'] = 'На данное время уже записалось {$a} студентов. Это значение больше, чем разрешено этим параметром.';
$string['exclusivitypositive'] = 'Число студентов, которые могут записаться на это время должно быть 1 или больше.';
$string['explaingeneralconfig'] = 'Эти параметры могут быть установлены только на уровне сайта и будут применены ко всем элементам курса «Планирование встреч» на этом сайте Moodle.';
$string['export'] = 'Экспорт';
$string['exporthdr'] = 'Экспортировать промежутки времени и встречи';
$string['field-attended'] = 'Присутствовал';
$string['field-date'] = 'Дата';
$string['field-endtime'] = 'Время окончания';
$string['field-grade'] = 'Оценка';
$string['field-location'] = 'Место';
$string['field-maxstudents'] = 'Максимальное количество студентов';
$string['field-slotnotes'] = 'Заметки к промежутку времени';
$string['field-starttime'] = 'Время начала';
$string['field-studentemail'] = 'Адрес электронной почты студента';
$string['field-studentfirstname'] = 'Имя студента';
$string['field-studentfullname'] = 'Полное имя студента';
$string['field-studentidnumber'] = 'Идентификационный номер студента';
$string['field-studentlastname'] = 'Фамилия студента';
$string['field-studentusername'] = 'Логин студента';
$string['fileformat'] = 'Формат файла';
$string['fileformat_help'] = 'Доступны следующие форматы файлов:
     <ul>
          <li>Значения, разделенные запятыми (CSV). Разделитель полей (по умолчанию, запятая) может быть выбран ниже. CSV-файлы можно открыть в большинстве табличных процессоров;</li>
          <li>Файл Microsoft Excel (формат Excel 2007);</li>
          <li>Электронная таблица Open Document (ODS);</li>
          <li>Формат HTML - веб-страница с таблицей экспортируемых данных может быть распечатана с помощью функции печати браузера;</li>
          <li>Документ PDF. Вы можете выбрать книжную или альбомную ориентацию бумаги.</li>
     </ul>';
$string['finalgrade'] = 'Итоговая оценка';
$string['firstslotavailable'] = 'Первый промежуток времени будет открыт в: {$a}';
$string['forbidgroup'] = 'Промежуток времени для группы студентов - щелкните для изменения';
$string['forcewhenoverlap'] = 'Принудительно добавлять при «накладках»';
$string['forcewhenoverlap_help'] = '<h3>Принудительное добавление промежутков при «накладках»</h3>
<p>Этот параметр определяет как поступать с новыми промежутками времени, если они пересекаются с уже существующими промежутками.</p>
<p>Если данный параметр включен, существующий пересекающийся промежуток времени будет удален и будет создан новый промежуток.</p>
<p>Если параметр отключен, существующий пересекающийся промежуток времени будет сохранен и новый промежуток <em>не будет</em> создаваться.</p>';
$string['forcourses'] = 'Выберите студентов из курсов';
$string['friday'] = 'Пятница';
$string['generalconfig'] = 'Общие настройки';
$string['grade'] = 'Оценка';
$string['gradeingradebook'] = 'Оценка в журнале оценок';
$string['gradingstrategy'] = 'Методика оценивания';
$string['gradingstrategy_help'] = 'Выберите методику определения оценки за элемент курса «Планирование встреч», когда студентам назначено несколько встреч.
В журнале оценок может отображаться <ul><li>либо средняя оценка,</li><li>либо наивысшая оценка,</li></ul> из числа полученных студентом.';
$string['group'] = 'группа';
$string['groupbookings'] = 'Запись группами';
$string['groupbookings_help'] = 'Разрешить студентам записывать на встречу всех членов своей группы. (Обратите внимание, что эта настройка отличается от настройки «Групповой режим», которая управляет тем, какие промежутки времени может видеть студент.)';
$string['groupbreakdown'] = 'По размеру группы';
$string['groupmodeyourgroups'] = 'Групповой режим: {$a->groupmode}. Только студенты из групп(ы) {$a->grouplist} могут записаться на встречу с Вами.';
$string['groupmodeyourgroupsempty'] = 'Групповой режим: {$a->groupmode}. Вы не являетесь членом ни одной из групп, поэтому студенты не могут записаться на встречу с Вами.';
$string['groupscheduling'] = 'Включить запись на встречи группами';
$string['groupscheduling_desc'] = 'Разрешить записывать всю группу за один раз.
(В отличие от глобального параметра, настройка «Запись группами» должна быть включена в соответствующем экземпляре элемента «Планирование встреч».)';
$string['groupsession'] = 'Групповая встреча';
$string['groupsize'] = 'Размер группы';
$string['guardtime'] = 'Завершение записи за';
$string['guardtime_help'] = '<p>Параметр «Завершение записи за» позволяет запретить студентам изменять решение о записи на встречу незадолго до самой встречи.
<p>Если время завершения записи включено и задано, например, равным 2 часам, то студенты не смогут записаться на встречу, которая начинается менее чем через 2 часа (считая от текущего момента). Студенты также не смогут отменить встречу, если она начинается менее чем через 2 часа.</p>';
$string['guestscantdoanything'] = 'Гости не могут здесь ничего изменять.';
$string['howtoaddstudents'] = 'Используйте назначение ролей для модуля, чтобы добавить студентов в расписание на глобальном уровне.<br/>Вы также можете использовать настройку ролей в модуле для того, чтобы назначить тех, кто будет регистрировать ваших студентов на встречи.';
$string['htmlformat'] = 'HTML';
$string['ignoreconflicts'] = 'Игнорировать «накладки» при планировании';
$string['ignoreconflicts_help'] = 'Если данный параметр включен, то промежуток времени будет перемещен на указанную дату и время, даже если в это время уже существуют какие-то промежутки времени. Это может привести к «накладкам» во встречах у некоторых учителей или студентов, поэтому данной возможностью следует пользоваться осторожно.';
$string['includeemptyslots'] = 'Включать промежутки времени, на которые никто не записался';
$string['includeslotsfor'] = 'Включать промежутки времени для';
$string['incourse'] = 'в курсе';
$string['introduction'] = 'Вступление';
$string['isnonexclusive'] = 'Групповой';
$string['landscape'] = 'Альбомная';
$string['lengthbreakdown'] = 'По длительности промежутка времени';
$string['limited'] = 'Ограничено (свободно мест: {$a})';
$string['location'] = 'Место';
$string['location_help'] = 'Укажите информацию о месте, где будет проходить встреча.';
$string['markasseennow'] = 'Отметить как присутствовавшего';
$string['markseen'] = 'Пожалуйста, после встречи со студентом сделайте отметку «Присутствовал», установив соответствующий переключатель в таблице выше.';
$string['maxgrade'] = 'Использовать наивысшую оценку';
$string['maxstudentlistsize'] = 'Максимальная длина списка студентов';
$string['maxstudentlistsize_desc'] = 'Максимальная длина списка студентов, которым необходимо назначить встречу, отображаемая в интерфейсе управления планированием встреч для учителя. Если студентов будет больше, то список не будет отображаться.';
$string['maxstudentsperslot'] = 'Максимальное количество студентов для каждого промежутка времени';
$string['maxstudentsperslot_desc'] = 'Промежутки времени для групповых встреч будут настроены на запись не более, чем указанного количества студентов. Обратите внимание: Вы всегда можете установить значение «Без ограничений» для промежутка времени.';
$string['meangrade'] = 'Использовать среднюю оценку';
$string['meetingwith'] = 'Встреча с вашим';
$string['meetingwithplural'] = 'Встреча с вашими';
$string['minutes'] = 'минут';
$string['minutesperslot'] = 'минут на промежуток времени';
$string['missingstudents'] = 'Количество студентов, еще не записавшихся на встречу: {$a}.';
$string['missingstudentsmany'] = 'Количество студентов, еще не записавшихся на встречу: {$a}. Список не будет отображен из-за слишком большого размера.';
$string['mode'] = 'Режим';
$string['modeappointments'] = 'встреч';
$string['modeintro'] = 'Студенты могут записаться на';
$string['modeoneatatime'] = 'одновременно';
$string['modeoneonly'] = 'в этом элементе курса';
$string['modulename'] = 'Планирование встреч';
$string['modulename_help'] = 'Модуль «Планирование встреч» поможет Вам запланировать встречи с Вашими студентами.

Учителя определяют промежутки времени для встреч, затем студенты выбирают один из них в Moodle.
После этого учителя могут отмечать присутствие студентов, результаты встречи (и, при необходимости, выставлять оценки) в элементе курса «Планирование встреч».

Поддерживается планирование встреч с группой студентов: в каждый промежуток времени может записаться несколько студентов. Также есть возможность запланировать встречу для всей группы студентов одновременно.';
$string['modulename_link'] = 'mod/scheduler/view';
$string['modulenameplural'] = 'Планирования встреч';
$string['monday'] = 'Понедельник';
$string['multiple'] = '(несколько)';
$string['myappointments'] = 'Мои встречи';
$string['myself'] = 'меня';
$string['name'] = 'Название элемента курса';
$string['needteachers'] = 'Промежутки времени не могут быть добавлены, так как в курсе отсутствуют учителя';
$string['negativerange'] = 'Отрицательный диапазон. Этого не может быть.';
$string['never'] = 'Никогда';
$string['noappointments'] = 'Нет встреч';
$string['noexistingstudents'] = 'Нет студентов, которые могли бы записаться на встречи';
$string['nogroups'] = 'Нет групп, доступных для планирования встреч.';
$string['noresults'] = 'Нет результатов.';
$string['noschedulers'] = 'В курсе нет элементов типа «Планирование встреч»';
$string['noslots'] = 'Нет доступных промежутков времени для записи.';
$string['noslotsavailable'] = 'На текущий момент нет доступных для записи промежутков времени.';
$string['noslotsopennow'] = 'Сейчас нет открытых промежутков времени для записи.';
$string['nostudents'] = 'Нет записавшихся на встречу студентов';
$string['nostudenttobook'] = 'Нет студентов для записи';
$string['note'] = 'Оценка';
$string['noteacherforslot'] = 'Нет учителя для промежутков времени';
$string['noteachershere'] = 'Учитель отсутствует';
$string['notenoughplaces'] = 'Извините, для записи на данное время недостаточно свободных мест.';
$string['notifications'] = 'Уведомления';
$string['notifications_help'] = 'Если данный параметр включен, учителя и студенты будут получать уведомления при записи на встречу или при ее отмене.';
$string['notseen'] = 'Не присутствовал';
$string['now'] = 'Сейчас';
$string['occurrences'] = 'Число встреч';
$string['odsformat'] = 'ODS';
$string['on'] = 'на';
$string['onedaybefore'] = '1 день до начала промежутка времени';
$string['onelineperappointment'] = 'Одна строка на встречу';
$string['onelineperslot'] = 'Одна строка на промежуток времени';
$string['oneslotadded'] = 'Один промежуток времени добавлен';
$string['oneweekbefore'] = '1 неделя до начала промежутка времени';
$string['onthemorningofappointment'] = 'Утром в день встречи';
$string['options'] = 'Параметры';
$string['otherstudents'] = 'Другие участники';
$string['overall'] = 'Общая';
$string['overlappings'] = 'Некоторые другие промежутки времени пересекаются';
$string['pageperteacher'] = 'Одна страница на каждого {$a}';
$string['pagination'] = 'Разбиение по страницам';
$string['pagination_help'] = 'Выберите, должен ли файл экспорта содержать отдельные страницы для каждого учителя. В форматах файлов Excel и ODS, этим страницам соответствуют отдельные вкладки (листы) в книге.';
$string['pdfformat'] = 'PDF';
$string['pdforientation'] = 'Ориентация страницы PDF';
$string['pluginadministration'] = 'Управление модулем «Планирование встреч»';
$string['pluginname'] = 'Планирование встреч';
$string['portrait'] = 'Книжная';
$string['preview'] = 'Предварительный просмотр';
$string['previewlimited'] = '(Предварительный просмотр ограничен {$a} строками.)';
$string['registeredlbl'] = 'Записанные студенты';
$string['reminder'] = 'Напоминание';
$string['resetappointments'] = 'Удалить встречи и оценки';
$string['resetslots'] = 'Удалить промежутки времени';
$string['return'] = 'Вернуться к курсу';
$string['revoke'] = 'Отменить встречу';
$string['saturday'] = 'Суббота';
$string['save'] = 'Сохранить';
$string['savechoice'] = 'Сохранить мой выбор';
$string['saveseen'] = 'Сохранить отметку о присутствии';
$string['schedule'] = 'Планирование встреч';
$string['scheduleappointment'] = 'Запись на встречу для {$a}';
$string['schedulecancelled'] = '{$a} : Ваша встреча отменена или перенесена';
$string['schedulegroups'] = 'Планирование встреч с группами';
$string['scheduleinnew'] = 'Запланировать встречу в другой промежуток времени';
$string['scheduleinslot'] = 'Запланировать встречу в указанное время';
$string['scheduler'] = 'Планирование встреч';
$string['scheduler:addinstance'] = 'Добавлять новый элемент курса «Планирование встреч»';
$string['scheduler:appoint'] = 'Записываться на встречу';
$string['scheduler:attend'] = 'Просматривать списки записавшихся студентов';
$string['scheduler:canscheduletootherteachers'] = 'Планировать встречи для других учителей';
$string['scheduler:canseeotherteachersbooking'] = 'Просматривать список запланированных встреч других учителей';
$string['scheduler:disengage'] = 'Это право устарело и ни на что не влияет';
$string['scheduler:manage'] = 'Управлять своими промежутками времени и встречами';
$string['scheduler:manageallappointments'] = 'Управлять всей информацией в элементе курса «Планирование встреч»';
$string['scheduler:seeotherstudentsbooking'] = 'Просматривать, какие еще студенты записались на встречу в конкретный промежуток времени';
$string['scheduler:seeotherstudentsresults'] = 'Просматривать результаты других студентов, записавшихся на встречу в тот же промежуток времени';
$string['scheduler:seeoverviewoutsideactivity'] = 'Использовать вкладку «Обзор» для просмотра промежутков времени, не относящихся к текущему элементу курса «Планирование встреч».';
$string['schedulestudents'] = 'Планирование встреч со студентами';
$string['scopemenu'] = 'Показать промежутки времени в: {$a}';
$string['scopemenuself'] = 'Показать мои промежутки времени в: {$a}';
$string['seen'] = 'Присутствовал';
$string['selectedtoomany'] = 'Вы выбрали слишком много промежутков времени. Вы можете выбрать не более {$a}.';
$string['sepcolon'] = 'Двоеточие';
$string['sepcomma'] = 'Запятая';
$string['sepsemicolon'] = 'Точка с запятой';
$string['septab'] = 'Знак табуляции';
$string['showemailplain'] = 'Отображать адреса электронной почты как обычный текст';
$string['showemailplain_desc'] = 'Отображать в интерфейсе планирования встреч для учителя адреса электронной почты студентов, для которых требуется запись на встречу, не только в виде ссылок «mailto:», но еще и обычным текстом.';
$string['showparticipants'] = 'Показать участников';
$string['slot'] = 'Промежуток времени';
$string['slotdatetime'] = '{$a->shortdatetime} на {$a->duration} минут';
$string['slotdescription'] = '{$a->status} {$a->startdate} с {$a->starttime} до {$a->endtime} в {$a->location} с {$a->facilitator}.';
$string['slot_is_just_in_use'] = 'Извините, этот промежуток времени только что был выбран для встречи другим студентом! Попробуйте еще раз.';
$string['slots'] = 'Промежутки времени';
$string['slotsadded'] = 'Было добавлено промежутков времени: {$a}';
$string['slottype'] = 'Тип промежутка времени';
$string['slotupdated'] = 'Один промежуток времени был обновлен';
$string['slotwarning'] = '<strong>Предупреждение: </strong>Перемещение этого промежутка времени на указанное время конфликтует с промежутками, перечисленными ниже. Включите параметр «Игнорировать „накладки“ при планировании», если вы все-таки хотите перенести этот промежуток времени.';
$string['staffbreakdown'] = 'По роли «{$a}»';
$string['staffrolename'] = 'Название роли учителя';
$string['staffrolename_help'] = 'Отображаемое название для роли с правами проведения встреч. Это не обязательно должен быть «учитель».';
$string['start'] = 'Начало';
$string['startpast'] = 'Вы не можете задать начало промежутка времени для встречи ранее текущего момента';
$string['statistics'] = 'Статистика';
$string['student'] = 'Студент';
$string['studentbreakdown'] = 'По студентам';
$string['studentcomments'] = 'Примечание студента';
$string['studentdetails'] = 'Подробная информация о студенте';
$string['studentmultiselect'] = 'Каждый студент может быть выбран только один раз в этом промежутке времени';
$string['students'] = 'Студенты';
$string['sunday'] = 'Воскресенье';
$string['tab-otherappointments'] = 'Все встречи этого студента';
$string['tab-otherstudents'] = 'Студенты, записавшиеся на это время';
$string['tab-thisappointment'] = 'Эта встреча';
$string['teacher'] = 'Учитель';
$string['teachersmenu'] = 'Отобразить промежутки времени для: {$a}';
$string['thiscourse'] = 'этого курса';
$string['thisscheduler'] = 'этого элемента курса';
$string['thissite'] = 'всего сайта';
$string['thursday'] = 'Четверг';
$string['totalgrade'] = 'Итоговая оценка';
$string['tuesday'] = 'Вторник';
$string['unattended'] = 'Не присутствовали';
$string['unlimited'] = 'Без ограничений';
$string['unregisteredlbl'] = 'Незаписанные студенты';
$string['upcomingslots'] = 'Предстоящие промежутки времени';
$string['updategrades'] = 'Обновить оценки';
$string['updatesingleslot'] = '';
$string['wednesday'] = 'Среда';
$string['welcomebackstudent'] = 'Вы можете записаться на дополнительные встречи в другое время, нажимая ниже кнопку «Записаться на это время» рядом с соответствующим промежутком времени.';
$string['welcomenewstudent'] = 'Таблица ниже показывает все доступные промежутки времени для встречи. Выберите желаемый промежуток времени, нажимая на соответствующую кнопку «Записаться на это время». Если позже Вы захотите внести изменения — зайдите на эту страницу еще раз.';
$string['welcomenewteacher'] = 'Пожалуйста, нажмите кнопку ниже, чтобы добавить промежутки времени для встреч.';
$string['what'] = 'Что?';
$string['whathappened'] = 'Что происходило?';
$string['whatresulted'] = 'Каков результат?';
$string['when'] = 'Когда?';
$string['where'] = 'Где?';
$string['who'] = 'С кем?';
$string['whosthere'] = 'Кто здесь?';
$string['xdaysbefore'] = '{$a} дней до начала промежутка времени';
$string['xweeksbefore'] = '{$a} недель до начала промежутка времени';
$string['yesallgroups'] = 'Да, для всех групп';
$string['yesingrouping'] = 'Да, в потоке {$a}';
$string['yourappointmentnote'] = 'Примечания лично для Вас';
$string['yourslotnotes'] = 'Примечания к встрече';
$string['yourtotalgrade'] = 'Ваша итоговая оценка в этом элементе: <strong>{$a}</strong>.';
