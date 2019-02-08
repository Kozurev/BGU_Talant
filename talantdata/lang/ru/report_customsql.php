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
 * Strings for component 'report_customsql', language 'ru', branch 'MOODLE_35_STABLE'
 *
 * @package   report_customsql
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['addcategory'] = 'Добавить новую категорию';
$string['addcategorydesc'] = 'Чтобы изменить категорию отчета, необходимо отредактировать этот отчет. Здесь Вы можете редактировать название категории, удалить категорию или добавить новую категорию.';
$string['addreport'] = 'Добавить новый запрос';
$string['addreportcategory'] = 'Добавить новую категорию отчетов';
$string['anyonewhocanveiwthisreport'] = 'Любому, кому доступны эти отчеты (report/customsql:view)';
$string['archivedversions'] = 'Архивные версии этого запроса';
$string['at'] = '&nbsp;в&nbsp;';
$string['automaticallydaily'] = 'по расписанию, ежедневно';
$string['automaticallymonthly'] = 'по расписанию, в первый день каждого месяца';
$string['automaticallyweekly'] = 'по расписанию, в первый день каждой недели';
$string['availablereports'] = 'Отчеты по требованию';
$string['availableto'] = 'Доступно: {$a}.';
$string['backtoreportlist'] = 'Вернуться к списку запросов';
$string['categorycontent'] = '({$a->manual} по требованию, {$a->daily} ежедневно, {$a->weekly} еженедельно, {$a->monthly} ежемесячно)';
$string['categoryexists'] = 'Имя категории должно быть уникальным, это имя уже используется';
$string['categorynamex'] = 'Имя категории: {$a}';
$string['changetheparameters'] = 'Изменить параметры';
$string['customsql:definequeries'] = 'Определить пользовательский запрос';
$string['customsql:managecategories'] = 'Определить пользовательскую категорию';
$string['customsql:view'] = 'Просмотр отчетов по запросам';
$string['dailyheader'] = 'Ежедневно';
$string['dailyheader_help'] = 'Эти запросы будут выполняться ежедневно в указанное время. Ссылка позволяет просмотреть результаты запросов, накопленные ранее.';
$string['defaultcategory'] = 'Разное';
$string['delete'] = 'Удалить';
$string['deleteareyousure'] = 'Вы уверены, что хотите удалить этот запрос?';
$string['deletecategoryareyousure'] = '<p>Вы уверены, что хотите удалить эту категорию?</p><p>Категория не должна содержать никаких запросов.</p>';
$string['deletecategoryyesno'] = '<p>Вы действительно уверены, что хотите удалить эту категорию?</p>';
$string['deletethiscategory'] = 'Удалить эту категорию';
$string['deletethisreport'] = 'Удалить этот запрос';
$string['description'] = 'Описание';
$string['displayname'] = 'Название запроса';
$string['displaynamerequired'] = 'Вы должны ввести название запроса';
$string['displaynamex'] = 'Название запроса: {$a}';
$string['downloadthisreportascsv'] = 'Скачать эти результаты как CSV-файл';
$string['edit'] = 'Добавить/Редактировать';
$string['editcategory'] = 'Обновить категорию';
$string['editingareport'] = 'Редактирование специальных запросов к базе данных';
$string['editthiscategory'] = 'Редактировать эту категорию';
$string['editthisreport'] = 'Редактировать этот запрос';
$string['emailbody'] = 'Уважаемый(ая) {$a}';
$string['emailink'] = 'Чтобы получить доступ к отчету, нажмите на эту ссылку: {$a}';
$string['emailnumberofrows'] = 'только количество строк и ссылку';
$string['emailresults'] = 'вложить результаты в текст письма';
$string['emailrow'] = 'Запрос вернул строки - {$a}.';
$string['emailrows'] = 'Запрос вернул строки - {$a}.';
$string['emailsent'] = 'Уведомление по электронной почте было отправлено {$a}';
$string['emailsentfailed'] = 'Уведомление по электронной почте не может быть отправлено {$a}';
$string['emailsubject'] = 'Запрос {$a}';
$string['emailto'] = 'Автоматически уведомлять по электронной почте';
$string['emailwhat'] = 'Содержание сообщения электронной почты';
$string['enterparameters'] = 'Введите параметры специальных запросов к базе данных';
$string['errordeletingcategory'] = '<p>Ошибка при удалении категории отчетов.</p><p>Удаляемая категория должна быть пустой.</p>';
$string['errordeletingreport'] = 'Ошибка при удалении запроса.';
$string['errorinsertingreport'] = 'Ошибка при вставке запроса.';
$string['errorupdatingreport'] = 'Ошибка при обновлении запроса.';
$string['invalidreportid'] = 'Неверный идентификатор запроса {$a}.';
$string['lastexecuted'] = 'Этот запрос последний раз запускался:  {$a->lastrun}. Он выполнялся: {$a->lastexecutiontime} сек.';
$string['managecategories'] = 'Управление категориями отчетов';
$string['manual'] = 'По требованию';
$string['manualheader'] = 'По требованию';
$string['manualheader_help'] = 'Эти запросы выполняются по требованию, когда Вы нажмете ссылку для просмотра результатов.';
$string['messageprovider:notification'] = 'Уведомления и оповещения о пользовательских отчетах SQL';
$string['monthlyheader'] = 'Ежемесячно';
$string['monthlyheader_help'] = 'Эти запросы автоматически выполняются в первый день каждого месяца, отображая результаты предыдущего месяца. Ссылки позволяют просматривать накопленные ранее результаты.';
$string['monthlynote_help'] = 'Эти запросы автоматически выполняются в первый день каждого месяца, отображая результаты предыдущего месяца. Ссылки позволяют просматривать накопленные ранее результаты.';
$string['morethanonerowreturned'] = 'Было возвращено более одной строки. Этот запрос должен возвращать одну строку.';
$string['nodatareturned'] = 'Этот запрос не вернул никаких данных.';
$string['noexplicitprefix'] = 'Пожалуйста, используйте префикс <tt>{$a}</tt> таблиц в SQL. Или используйте названия таблиц (без префикса), помещённые в фигурных скобках <tt>{}</tt>.';
$string['noreportsavailable'] = 'Нет доступных запросов';
$string['norowsreturned'] = 'Нет возвращенных строк. Этот запрос должен возвращать одну строку.';
$string['noscheduleifplaceholders'] = 'Запросы, содержащие подстановки, могут быть запущены только по требованию.';
$string['nosemicolon'] = 'Вы не можете использовать символ «;» в SQL.';
$string['notallowedwords'] = 'Вы не можете использовать слова <tt>{$a}</tt> в SQL.';
$string['note'] = 'Примечания';
$string['notrunyet'] = 'Этот запрос еще не был запущен.';
$string['onerow'] = '&nbsp;Запрос возвращает одну строку, накапливать результаты по одной строке за раз';
$string['pluginname'] = 'Специальные запросы к базе данных';
$string['query_deleted'] = 'Запрос удален';
$string['query_edited'] = 'Запрос изменен';
$string['queryfailed'] = 'Ошибка при выполнении запроса: {$a}';
$string['querylimit'] = 'Количество возвращаемых строк';
$string['querylimitrange'] = 'Число должно быть между 1 и {$a}';
$string['queryparameters'] = 'Параметры запроса';
$string['queryparams'] = 'Пожалуйста, введите значения по умолчанию для параметров запроса.';
$string['queryparamschanged'] = 'Именованные подстановки в запросе изменены.';
$string['queryrundate'] = 'дата запуска запроса';
$string['querysql'] = 'Запрос SQL';
$string['querysqlrequried'] = 'Вы должны ввести какой-то запрос SQL.';
$string['query_viewed'] = 'Запрос просмотрен';
$string['recordlimitreached'] = 'Этот запрос достиг лимита по строкам - {$a}. Некоторые строки в конце могут быть опущены.';
$string['reportfor'] = 'Запуск запроса в {$a}';
$string['requireint'] = 'Требуется целое';
$string['runable'] = 'Запуск';
$string['runablex'] = 'Запустить: {$a}';
$string['schedulednote'] = 'Эти запросы будут автоматически запускаться в первый день каждой недели или месяца, собирая результаты за предыдущую неделю или месяц. Эти ссылки позволят просматривать накопленные результаты.';
$string['scheduledqueries'] = 'Запланированные запросы';
$string['selectcategory'] = 'Выберите категорию для этого отчета';
$string['typeofresult'] = 'Тип результата';
$string['unknowndownloadfile'] = 'Неизвестный файл загрузки.';
$string['userhasnothiscapability'] = 'Пользователь «{$a->username}» не имеет права «{$a->capability}». Пожалуйста, удалите пользователя из списка или измените выбор в «{$a->whocanaccess}».';
$string['userinvalidinput'] = 'Неверный ввод, требуется разделенный запятыми список имен пользователей';
$string['usernotfound'] = 'Пользователя с логином «{$a}» не существует';
$string['userswhocanconfig'] = 'Только администраторам (moodle/site:config)';
$string['userswhocanviewsitereports'] = 'Всем, кому доступны системные отчеты (moodle/site:viewreports)';
$string['verifyqueryandupdate'] = 'Проверить текст запроса SQL и обновить форму';
$string['weeklyheader'] = 'Еженедельно';
$string['weeklyheader_help'] = 'Эти запросы автоматически выполняются в первый день каждой недели, отображая результаты предыдущей недели. Ссылки позволяют просматривать накопленные ранее результаты.';
$string['whocanaccess'] = 'Кому доступен этот запрос';
