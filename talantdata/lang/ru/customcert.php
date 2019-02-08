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
 * Strings for component 'customcert', language 'ru', branch 'MOODLE_35_STABLE'
 *
 * @package   customcert
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['awardedto'] = 'Награждается';
$string['certificate'] = 'Сертификат';
$string['code'] = 'Код';
$string['copy'] = 'Копировать';
$string['coursetimereq'] = 'Необходимые минуты в курсе';
$string['coursetimereq_help'] = 'Введите минимальное время (в минутах), которое студент должен провести в курсе для возможности получить сертификат.';
$string['createtemplate'] = 'Создать шаблон';
$string['customcert:addinstance'] = 'Добавлять новый экземпляр сертификата';
$string['customcert:manage'] = 'Управлять сертификатом';
$string['customcert:verifycertificate'] = 'Подтверждать сертификат';
$string['customcert:view'] = 'Просматривать сертификат';
$string['customcert:viewallcertificates'] = 'Просматривать все сертификаты';
$string['customcert:viewreport'] = 'Просматривать отчет по курсу';
$string['deletecertpage'] = 'Удалить страницу сертификата';
$string['deleteconfirm'] = 'Подтверждение удаления';
$string['deleteelement'] = 'Удалить элемент';
$string['deleteelementconfirm'] = 'Вы уверены, что хотите удалить элемент?';
$string['deletepageconfirm'] = 'Вы уверены, что хотите удалить страницу сертификата?';
$string['deletetemplateconfirm'] = 'Вы уверены, что хотите удалить шаблон сертификата?';
$string['description'] = 'Описание';
$string['editcustomcert'] = 'Редактировать сетрификат';
$string['editelement'] = 'Редактировать элемент';
$string['edittemplate'] = 'Редактировать шаблон';
$string['elementname'] = 'Название элемента';
$string['elementname_help'] = 'Оно будет использовано для идентификации этого элемента в процессе редактирования сертификата. Например, на странице сертификата может быть несколько изображений и Вам будет необходимо отличать их друг от друга при редактировании. Примечание: название не будет отображаться на PDF.';
$string['elements'] = 'Элементы';
$string['elements_help'] = 'Это список элементов, которые будут отображены на сертификате. Обратите внимание, что элементы отображаются в данном порядке. Порядок отображения может быть изменен при помощи стрелок, расположенных рядом с каждым элементом.';
$string['elementwidth'] = 'Ширина';
$string['elementwidth_help'] = 'Укажите ширину элемента - «0» означает, что ширина не ограничена.';
$string['emailnonstudentbody'] = 'Во вложении сертификат «{$a->certificatename}»  курса «{$a->coursefullname}». Получатель - {$a->userfullname}.';
$string['emailnonstudentcertificatelinktext'] = 'Посмотреть отчет по сертификатам';
$string['emailnonstudentgreeting'] = 'Привет';
$string['emailnonstudentsubject'] = '{$a->coursename}: {$a->certificatename}';
$string['emailothers'] = 'Отправить эл. почту другим';
$string['emailothers_help'] = 'При выбранном параметре на указанные здесь адреса (разделенные запятой) будут высланы электронные письма с копией сертификата (когда он станет доступным).';
$string['emailstudentbody'] = 'Во вложении Ваш сертификат «{$a->certificatename}» курса «{$a->coursefullname}».';
$string['emailstudentcertificatelinktext'] = 'Просмотреть сертификат';
$string['emailstudentgreeting'] = 'Уважаемый (ая) {$a}';
$string['emailstudents'] = 'Отправить эл. почту студентам';
$string['emailstudents_help'] = 'При выбранном параметре студент получит письмо с копией сертификата (когда он станет доступным).';
$string['emailstudentsubject'] = '{$a->coursename}: {$a->certificatename}';
$string['emailteachers'] = 'Отправить эл. почту учителям';
$string['emailteachers_help'] = 'При выбранном параметре учителя получат письма с копией сертификата (когда он станет доступным).';
$string['font'] = 'Шрифт';
$string['fontcolour'] = 'Цвет';
$string['fontcolour_help'] = 'Цвет шрифта.';
$string['font_help'] = 'Шрифт, используемый при создании данного элемента.';
$string['fontsize'] = 'Размер';
$string['fontsize_help'] = 'Размер шрифта в пунктах.';
$string['getcustomcert'] = 'Скачать сертификат';
$string['height'] = 'Высота';
$string['height_help'] = 'Это высота (в мм) сертификата в формате PDF. Для справки, высота листа формата А4 равна 297 мм, а высота листа формата Letter - 279 мм.';
$string['invalidcode'] = 'Введен недопустимый код.';
$string['invalidcolour'] = 'Выбран недопустимый цвет, пожалуйста введите допустимое для HTML название цвета (шестизначный или трехзначный шестнадцатеричный цвет).';
$string['invalidelementwidth'] = 'Введите положительное число.';
$string['invalidheight'] = 'Высота должна быть равна числу больше 0.';
$string['invalidmargin'] = 'Отступ должен быть равен числу больше 0.';
$string['invalidposition'] = 'Выберите положительное число для позиции {$a}.';
$string['invalidwidth'] = 'Ширина должна быть равна числу больше 0.';
$string['landscape'] = 'Альбомная';
$string['leftmargin'] = 'Левый отступ';
$string['load'] = 'Загрузить';
$string['loadtemplate'] = 'Загрузить шаблон';
$string['managetemplates'] = 'Управление шаблонами';
$string['modify'] = 'Изменить';
$string['modulename'] = 'Сертификат';
$string['modulename_help'] = 'Этот модуль позволяет динамическое создание сертификатов в формате PDF.';
$string['modulenameplural'] = 'Сертификаты';
$string['mycertificates'] = 'Мои сертификаты';
$string['name'] = 'Название';
$string['nametoolong'] = 'Вы превысили максимальную длину названия';
$string['nocustomcerts'] = 'Для данного курса нет сертификатов';
$string['noimage'] = 'Нет изображения';
$string['notemplates'] = 'Нет шаблонов';
$string['notissued'] = 'Не выдано';
$string['notverified'] = 'Не подтверждено';
$string['options'] = 'Опции';
$string['page'] = 'Страница {$a}';
$string['pluginadministration'] = 'Управление сертификатом';
$string['pluginname'] = 'Сертификат';
$string['portrait'] = 'Книжная';
$string['posx'] = 'Позиция X';
$string['posy'] = 'Позиция Y';
$string['print'] = 'Печать';
$string['rearrangeelements'] = 'Изменить расположение элементов';
$string['rearrangeelementsheading'] = 'Перетащите элементы для изменения их расположения на сертификате.';
$string['receiveddate'] = 'Дата получения';
$string['refpoint'] = 'Расположение точки привязки';
$string['refpoint_help'] = 'Точка привязки - это местоположение, из которого определяются координаты элемента X и Y. Она обозначается знаком «+», который появляется в центре или по углам элемента.';
$string['replacetemplate'] = 'Заменить';
$string['requiredtimenotmet'] = 'Вам нужно провести как минимум {$a->requiredtime} минут в курсе, прежде чем сертификат станет доступным.';
$string['rightmargin'] = 'Правый отступ';
$string['rightmargin_help'] = 'Правый отступ сертификата в мм.';
$string['save'] = 'Сохранить';
$string['saveandclose'] = 'Сохранить и закрыть';
$string['saveandcontinue'] = 'Сохранить и продолжить';
$string['savechangespreview'] = 'Сохранить изменения и начать предварительный просмотр';
$string['savetemplate'] = 'Сохранить шаблон';
$string['setprotection'] = 'Установить защиту';
$string['showposxy'] = 'Показать позиции X и Y';
$string['templatename'] = 'Название шаблона';
$string['topcenter'] = 'Центр';
$string['topleft'] = 'Верхний левый';
$string['topright'] = 'Верхний правый';
$string['type'] = 'Тип';
$string['uploadimage'] = 'Загрузить изображение';
$string['verified'] = 'Подтверждено';
$string['verify'] = 'Подтвердить';
$string['verifycertificate'] = 'Подтвердить сертификат';
$string['verifycertificateanyone'] = 'Разрешить всем подтверждать  сертификат';
$string['width'] = 'Ширина';
$string['width_help'] = 'Это ширина (в мм) сертификата в формате PDF. Для справки, ширина листа формата А4 равна 210 мм, а ширина листа формата Letter - 216 мм.';
