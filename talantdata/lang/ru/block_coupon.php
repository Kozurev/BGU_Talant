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
 * Strings for component 'block_coupon', language 'ru', branch 'MOODLE_35_STABLE'
 *
 * @package   block_coupon
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['and'] = 'и';
$string['blockname'] = 'Купон';
$string['button:next'] = 'Далее';
$string['button:save'] = 'Генерировать купоны';
$string['button:submit_coupon_code'] = 'Отправлять купон';
$string['cohort'] = 'когорта';
$string['confirm_coupons_sent_body'] = 'Здравствуйте.<br /><br />

Сообщаем, что все созданные Вами купоны {$а->timecreated} были отправлены.<br /><br />
С наилучшими пожеланиями,<br /><br />
администратор Moodle.';
$string['confirm_coupons_sent_subject'] = 'Все Купоны были отправлены';
$string['coupon:addinstance'] = 'Добавлять новый блок Купон';
$string['coupon:administration'] = 'Управлять блоком Купон';
$string['coupon:generatecoupons'] = 'Создавать новый купон';
$string['coupon:inputcoupons'] = 'Использовать купон для записи на курс';
$string['coupon_mail_content'] = 'Уважаемый(ая) {$a->to_name},<br /><br />

Вы получили это письмо потому, что недавно были сгенерированы купоны. Купоны в приложении к этому сообщению. <br /><br />

С уважением, <br /><br />
{$a->from_name}';
$string['coupon_mail_csv_content'] = 'Уважаемый(ая) ##to_gender## ##to_name##, <br /> <br />

Вы недавно были зачислены на наш учебный курс ##course_fullnames##.
При обучении на курсе у Вас есть доступ к нашему сайту: ##site_name##.<br /> <br />.

На сайте, помимо учебных материалов, Вы будете иметь возможность пообщаться с другими студентами.
Курс начинается с ряда подготовительных заданий, желательно ознакомиться с ними за 3 дня до начала курса.
И Вы, и учитель можете хорошо подготовиться к курсу. <br /> <br />

Все учебные материалы будут доступны для Вас в последние 4 дня до начала курса.
Может случиться, что преподаватель разместит дополнительные материалы, которые будут добавлены в более позднее время, например, после сессии. Если это произойдет, Вы уведите их на сайте.
Во время встреч Вы не будете получать печатные материалы курса, мы советуем Вам взять с собой ноутбук или планшет. <br /> <br />

В приложении Вы найдете купон для входа на курс. Этот купон является персональным и уникальным, и дает доступ к соответствующим курсам для вашего образования.
Пожалуйста, внимательно изучите инструкцию к купону. <br /> <br />

Если у Вас есть какие-либо вопросы, касающиеся создания учетной записи или возникают какие-либо другие проблемы, Вы можете связаться со службой поддержки.
Информацию можно найти на сайте.
Когда никто не готов ответить на Ваш вопрос, пожалуйста, оставьте свое имя, адрес электронной почты и номер телефона и мы свяжемся с Вами как можно скорее. <br /> <br />

Мы желаем Вам успешной работы в курсе. <br /> <br />

С уважением, <br /> <br />

##site_name##';
$string['coupon_mail_subject'] = 'Сгенерированный купон Moodle';
$string['coupon:viewallreports'] = 'Видеть отчеты по Купонам (для всех купонов)';
$string['coupon:viewreports'] = 'Видеть отчеты по Купонам (для своих купонов)';
$string['course'] = 'курс';
$string['download-sample-csv'] = 'Скачать пример CSV-файла';
$string['error:coupon_reserved'] = 'Код этого купона зарезервирован за другим пользователем.';
$string['error:course-not-found'] = 'Курс не найден.';
$string['error:invalid_coupon_code'] = 'Вы ввели неверный код купона';
$string['error:invalid_email'] = 'Пожалуйста, введите правильный адрес электронной почты';
$string['error:nopermission'] = 'У Вас нет прав для этого';
$string['error:recipients-empty'] = 'Пожалуйста, введите хотя бы одного пользователя.';
$string['error:recipients-extension'] = 'Вы можете загрузить только CSV-файлы';
$string['error:recipients-max-exceeded'] = 'Ваш файл CSV превысил максимум 10 000 купонов для пользователей. Ограничьте его.';
$string['error:wrong_code_length'] = 'Пожалуйста, введите число между 6 и 32';
$string['heading:administration'] = 'Управлять';
$string['heading:coupon_type'] = 'Тип купона';
$string['heading:csvForm'] = 'Настройки CSV';
$string['heading:general_settings'] = 'Последние настройки';
$string['heading:generatecoupons'] = 'Генерировать купоны';
$string['heading:imageupload'] = 'Загрузить изображение';
$string['heading:info'] = 'Информация';
$string['heading:input_cohorts'] = 'Выбор глобальных групп';
$string['heading:input_course'] = 'Выбор курса';
$string['heading:input_groups'] = 'Выбор групп';
$string['heading:label_instructions'] = 'Инструкции';
$string['label:cohort'] = 'Глобальная группа';
$string['label:coupon_code'] = 'Код купона';
$string['label:coupon_code_length'] = 'Длина кода';
$string['label:coupon_recipients'] = 'Получатели';
$string['label:coupon_recipients_txt'] = 'Получатели';
$string['label:coupon_type'] = 'Генерировать на основе';
$string['label:date_send_coupons'] = 'Дата отправки';
$string['label:enter_coupon_code'] = 'Пожалуйста, введите здесь код своего купона';
$string['label:image'] = 'Фон купона';
$string['label:redirect_url'] = 'URL-адрес перенаправления';
$string['label:type_cohorts'] = 'Глобальная(ые) группа(ы)';
$string['label:type_course'] = 'Курс';
$string['page:generate_coupon.php:title'] = 'Генерировать купоны';
$string['page:generate_coupon_step_five.php:title'] = 'Генерировать купоны';
$string['page:generate_coupon_step_four.php:title'] = 'Генерировать купоны';
$string['page:generate_coupon_step_three.php:title'] = 'Генерировать купоны';
$string['page:generate_coupon_step_two.php:title'] = 'Генерировать купоны';
$string['page:unused_coupons.php:title'] = 'Неиспользованные купоны';
$string['report:cohorts'] = 'Глобальная группа';
$string['report:dateformat'] = '%d-%m-%Y %H:%M:%S';
$string['report:dateformatymd'] = '%d-%m-%Y';
$string['report:download-excel'] = 'Скачать неиспользованные купоны';
$string['report:heading:coursename'] = 'Название курса';
$string['report:heading:coursetype'] = 'Тип курса';
$string['report:heading:datecomplete'] = 'Дата окончания';
$string['report:heading:user'] = 'Пользователь';
$string['report:immediately'] = 'Немедленно';
$string['report:issend'] = 'отправить';
$string['report:senddate'] = 'Дата отправки';
$string['report:status_completed'] = 'Курс завершен';
$string['report:status_not_started'] = 'Курс не начался';
$string['report:status_started'] = 'Курс начался';
$string['showform-amount'] = 'Я хочу создать произвольное количество купонов';
$string['showform-csv'] = 'Я хочу создать купоны, используя CSV-файл с получателями';
$string['showform-manual'] = 'Я хочу вручную настроить получателей';
$string['th:cohorts'] = 'Глобальная группа';
$string['th:course'] = 'Курс';
$string['th:for_user_email'] = 'Планируется';
$string['th:immediately'] = 'Немедленно';
$string['th:senddate'] = 'Дата отправки';
$string['timeafter'] = 'Создано после';
$string['timebefore'] = 'Создано до';
$string['unlimited_access'] = 'не ограничен';
$string['url:generate_coupons'] = 'Генерировать Купон';
$string['url:view_reports'] = 'Просмотр отчетов';
$string['url:view_unused_coupons'] = 'Посмотреть неиспользованные купоны';
$string['view:generate_coupon:heading'] = 'Генерировать Купон';
$string['view:generate_coupon:title'] = 'Генерировать Купон';
