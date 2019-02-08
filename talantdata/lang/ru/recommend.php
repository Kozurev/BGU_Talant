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
 * Strings for component 'recommend', language 'ru', branch 'MOODLE_31_STABLE'
 *
 * @package   recommend
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['acceptrecommendation'] = 'Одобрить';
$string['addquestion'] = 'Добавить вопрос';
$string['addrequest'] = 'Запросить рекомендации';
$string['allrequests'] = 'Все запросы';
$string['areyousure_delete_request'] = 'Вы уверены, что хотите полностью удалить этот запрос на рекомендацию?';
$string['areyousure_reject_recommendation'] = 'Вы уверены, что хотите отклонить эту рекомендацию?';
$string['completiononlyaccepted'] = 'Учитывать только одобренные рекомендации';
$string['completionrequired'] = 'Минимальное количество заполненных рекомендаций:';
$string['editquestion'] = 'Редактирование вопроса';
$string['editquestions'] = 'Редактировать вопросы';
$string['error_cannotdeleterequest'] = 'К сожалению, этот запрос не может быть удален';
$string['error_emailduplicated'] = 'Этот e-mail уже использован';
$string['error_emailmissing'] = 'Для этой рекомендации не указан e-mail';
$string['error_emailnotvalid'] = 'Неправильный формат e-mail';
$string['error_emailused'] = 'Запрос на этот e-mail уже был отправлен';
$string['error_questionnotfound'] = 'Вопрос не найден';
$string['error_recommendationsubmitted'] = 'Эта рекомендация уже заполнена';
$string['error_requestnotfound'] = 'Извините, запрос на рекомендацию не найден';
$string['eventquestioncreated'] = 'Вопрос рекомендации создан';
$string['eventquestiondeleted'] = 'Вопрос рекомендации удален';
$string['eventquestionupdated'] = 'Вопрос рекомендации изменен';
$string['eventrequestaccepted'] = 'Рекомендация одобрена';
$string['eventrequestcompleted'] = 'Рекомендация заполнена';
$string['eventrequestcreated'] = 'Запрос на рекомендацию создан';
$string['eventrequestdeclined'] = 'Рекомендация отклонена';
$string['eventrequestdeleted'] = 'Рекомендация удалена';
$string['eventrequestrejected'] = 'Отказ заполнить рекомендацию';
$string['labelcontents'] = 'Содержимое';
$string['maxrequests'] = 'Максимальное количество запросов';
$string['maxrequests_help'] = 'Максимальное количество запросов, которое  участник может послать.
Имеет смысл установить этот параметр не очень большим, чтобы мотивировать участников предварительно договориться с рекомендующим лицом и предотвратить массовую рассылку большого количества запросов.
Однако разные обстоятельства могут помешать рекомендующему лицу заполнить форму и участнику должно быть разрешено отправить запросов больше необходимого количества рекомендаций.';
$string['messageprovider:completed'] = 'Уведомление для учителя о заполненных рекомендациях';
$string['messageprovider:statuschanged'] = 'Уведомление об изменении статуса рекомендации';
$string['modulename'] = 'Запрос рекомендации';
$string['modulename_help'] = 'Модуль позволяет участникам запрашивать рекомендации у третьих лиц. При заполнении запрошенной рекомендации не требуется регистрация на сайте. Учителя имеют возможность просматривать рекомендации, принимать или отклонять их.';
$string['modulenameplural'] = 'Запросы рекомендации';
$string['norequests'] = 'Рекомендации не запрошены';
$string['notificationcompleted_body'] = 'Уважаемый(ая) {$a->recipient},

Новая рекомендация заполнена на сайте {$a->site} и ожидает принятия.

Участник: {$a->participant}
Рекомендующее лицо: {$a->name}

Для просмотра рекомендации перейдите по ссылке:
{$a->link}

Если Вам необходима помощь, обратитесь к администратору сайта,
{$a->admin}';
$string['notificationcompleted_short'] = 'Новая рекомендация';
$string['notificationcompleted_subject'] = '{$a->courseshortname}: {$a->modulename}: Новая рекомендация';
$string['notificationstatuschanged_body'] = 'Уважаемый(ая) {$a->recipient},

Статус запрошенной Вами рекомендации изменен.
Рекомендующее лицо: {$a->name}
E-mail: {$a->email}
Новый статус: <b>{$a->status}</b>

Для просмотра Ваших запросов на рекомендации перейдите по ссылке:
{$a->link}

Если Вам необходима помощь, обратитесь к администратору сайта,
{$a->admin}';
$string['notificationstatuschanged_short'] = '{$a->courseshortname}: {$a->modulename}: Статус запрошенной Вами рекомендации изменен';
$string['notificationstatuschanged_subject'] = 'Статус запрошенной Вами рекомендации изменен';
$string['options'] = 'Варианты';
$string['options_help'] = 'Укажите по одному варианту на строку, предварив каждое название его числовым "весом" и символом /. Все веса должны быть разными. Например:<br><pre>1/Плохо<br>3/Хорошо<br>5/Замечательно</pre>';
$string['pluginadministration'] = 'Администрирование запросов рекомендации';
$string['pluginname'] = 'Запрос рекомендации';
$string['prefillwith'] = 'По умолчанию:';
$string['preview'] = 'Просмотр рекомендации';
$string['question'] = 'Вопрос';
$string['questiontype'] = 'Тип';
$string['recommend:accept'] = 'Принимать и отклонять заполненные рекомендации';
$string['recommend:addinstance'] = 'Добавлять новый элемент "Запрос рекомендации"';
$string['recommendationaccepted'] = 'Рекомендация принята';
$string['recommendationfor'] = '{$a}. Рекомендация';
$string['recommendationrejected'] = 'Рекомендация отклонена';
$string['recommendationtitle'] = 'Рекомендация {$a}';
$string['recommendatorname'] = 'Имя рекомендующего лица';
$string['recommend:delete'] = 'Удалять любые рекомендации';
$string['recommend:editquestions'] = 'Редактировать вопросы в рекомендации';
$string['recommendname'] = 'Наименование';
$string['recommendname_help'] = 'Название модуля на странице курса. Не показывается рекомендующему лицу.';
$string['recommend:request'] = 'Запрашивать рекомендации';
$string['recommend:viewdetails'] = 'Просматривать все рекомендации и запросы';
$string['rejectrecommendation'] = 'Отклонить';
$string['requestdeleted'] = 'Запрос удален';
$string['requestemailsubject'] = 'Тема письма запроса';
$string['requestemailtemplate'] = 'Шаблон сообщения письма запроса';
$string['requestinstructions'] = 'Вы можете послать запросы нескольким людям (максимум - {$a}), которые могли бы Вас порекомендовать.
Рекомендующие лица получат письмо со ссылкой, пройдя по которой они смогут онлайн заполнить форму рекомендации.
Будьте внимательны, заполняя эту форму - после того как запрос отправлен, Вы не сможете внести никакие изменения.';
$string['requestinstructionsmult'] = 'Нет необходимости запрашивать все рекомендации одновременно. Вы можете вернуться в любой момент и отправить дополнительные запросы.';
$string['requestscreated'] = 'Запрос(ы) рекомендации созданы.';
$string['requestssettings'] = 'Настройки запросов';
$string['requesttemplatebody'] = 'Уважаемый(ая) {NAME}

{PARTICIPANT} запросил Вашу рекомендацию на сайте {SITE}.
Чтобы заполнить форму рекомендации, пожалуйста, пройдите по ссылке:
{LINK}

Если Вам необходима помощь, обратитесь к администратору сайта.
{ADMIN}';
$string['requesttemplatesubject'] = 'Запрос на рекомендацию на сайте {SITE}';
$string['requiredrecommendgroup'] = 'Полученные рекомендации';
$string['requiredrecommendgroup_help'] = 'Если не отмечено "Учитывать только одобренные рекомендации", то будут также учитываться заполненные рекомендации, которые учитель еще не видел. Однако, если впоследствии учитель отклонит такую рекомендацию, то выполненный элемент курса может стать снова невыполненным.';
$string['selectquestiontype'] = 'Выберите тип вопроса';
$string['status'] = 'Статус';
$string['status0'] = 'В очереди на отсылку';
$string['status1'] = 'Запрос рекомендации отправлен';
$string['status2'] = 'Отказ в выдаче рекомендации';
$string['status3'] = 'Рекомендация заполнена';
$string['status4'] = 'Рекомендация отклонена';
$string['status5'] = 'Рекомендация принята';
$string['suredeletequestion'] = 'Вы уверены, что хотите удалить этот вопрос. Все ответы на этот вопрос в уже заполненных рекомендациях также будут удалены.';
$string['taskname'] = 'Отправить ожидающие в очереди запросы на рекомендацию';
$string['thanksforrecommendation'] = 'Спасибо, Ваша рекомендация была сохранена.';
$string['timecompleted'] = 'Заполнено';
$string['timerequested'] = 'Запрошено';
$string['typelabel'] = 'Объяснительный текст без поля ввода';
$string['typeradio'] = 'Множественный выбор';
$string['typetextarea'] = 'Эссе';
$string['typetextfield'] = 'Короткий ответ';
$string['yourrecommendations'] = 'Ваши рекомендации';
