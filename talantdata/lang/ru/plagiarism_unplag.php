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
 * Strings for component 'plagiarism_unplag', language 'ru', branch 'MOODLE_33_STABLE'
 *
 * @package   plagiarism_unplag
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['attempts'] = 'Количество сделанных попыток';
$string['check_all_submitted_assignments'] = 'Проверить все представленные работы';
$string['check_confirm'] = 'Вы уверены, что хотите начать проверку на плагиат с помощью плагина UNPLAG?';
$string['check_file'] = 'Начать проверку';
$string['check_start'] = 'Процесс проверки оригинальности';
$string['check_type'] = 'Выбор типа проверки на плагиат';
$string['cronwarning'] = 'Скрипт <a href="../../admin/cron.php">cron.php</a> не был запущен, по крайней мере, 30 мин - Cron должен быть настроен так, чтобы UNPLAG мог правильно функционировать.';
$string['defaultsdesc'] = 'Следующие настройки используются по умолчанию при включении UNPLAG внутри модуля элементов курса';
$string['defaultupdated'] = 'Настройки по умолчанию обновлены';
$string['delete'] = 'Удалить';
$string['deletedwarning'] = 'Этот файл не найден - возможно, он был удален пользователем';
$string['exclude_citations'] = 'Автоматическое исключение Цитат и Ссылок';
$string['exclude_self_plagiarism'] = 'Исключить самоплагиат';
$string['explainerrors'] = 'На этой странице перечислены все файлы, которые сейчас находятся в состоянии ошибки. <br/> Когда файлы будут удалены на этой странице, они не смогут быть повторно представлены и ошибки больше не будут отображаться преподавателям или студентам';
$string['file'] = 'Файл';
$string['filedeleted'] = 'Файл удален из очереди';
$string['filereset'] = 'Файл был повторно подан в UNPLAG';
$string['fileresubmitted'] = 'Файл в очереди на повторную подачу';
$string['generalinfo'] = 'Общая информация';
$string['getscore'] = 'Получить результат';
$string['heldevents'] = 'Повторные проверки';
$string['heldeventsdescription'] = 'Это проверки, которые не были завершены с первой попытки и были поставлены в очередь для повторной подачи. Это может помешать завершению последующих проверок и может потребовать дальнейшего исследования. Некоторые из этих событий могут не иметь отношения к UNPLAG.';
$string['id'] = 'ID';
$string['identifier'] = 'Идентификатор';
$string['max_100000_words'] = 'Файл должен содержать не более 100 000 слов и быть не более 70 МБ';
$string['min_30_words'] = 'Необходимо указать не менее 30 слов';
$string['module'] = 'Модуль';
$string['my_library'] = 'Документ против Библиотеки';
$string['name'] = 'Имя';
$string['no_index_files'] = 'Исключить представление от ведомственной библиотеки';
$string['noreceiver'] = 'Не было определено ни одного адреса получателя';
$string['pending'] = 'Этот файл находится в очереди на подачу в UNPLAG';
$string['plagiarism'] = 'Потенциальный плагиат';
$string['plagiarism_run_success'] = 'Отправить файл для проверки на плагиат';
$string['pluginname'] = 'UNPLAG - плагин проверки на плагиат';
$string['previouslysubmitted'] = 'Предварительно поданы как';
$string['processing'] = 'Этот файл был подан в UNPLAG; ожидание доступа к анализу';
$string['progress'] = 'Проверка';
$string['receivernotvalid'] = 'Это некорректный адрес получателя';
$string['refresh'] = 'Обновите страницу, чтобы увидеть результаты';
$string['report'] = 'Открыть полный отчет';
$string['reportready'] = 'Отчет готов';
$string['resubmit'] = 'Подать повторно';
$string['savedconfigfailed'] = 'Введена некорректная комбинация Ключ API/API секрет. UNPLAG был отключен, попробуйте еще раз.';
$string['savedconfigsuccess'] = 'Настройки обнаружения плагиата сохранены';
$string['scoreavailable'] = 'Этот файл был проверен UNPLAG и отчет уже доступен';
$string['scorenotavailableyet'] = 'Этот файл еще не проверен UNPLAG.';
$string['showwhenclosed'] = 'Когда Элементы курса закрыты';
$string['similarity'] = 'Сходство';
$string['similarity_sensitivity'] = 'Скрыть источники с совпадениями меньше, чем (%)';
$string['status'] = 'Статус';
$string['studentdisclosure'] = 'Ознакомить студентов с Политикой конфиденциальности UNPLAG';
$string['studentdisclosuredefault'] = 'Все загруженные файлы будут поданы в систему обнаружения плагиата UNPLAG.';
$string['studentdisclosure_help'] = 'Этот текст будет отображаться всем студентам на странице загрузки файла.';
$string['studentemailcontent'] = 'Файл, который Вы подали в {$a->modulename} в курсе {$a->coursename}, уже проверен системой обнаружения плагиата UNPLAG
{$a->modulelink}';
$string['studentemailsubject'] = 'Файл проверен на плагиат';
$string['submitondraft'] = 'Подать файл при первой загрузке';
$string['submitonfinal'] = 'Подать файл, когда студент отправляет его для оценки';
$string['toolarge'] = 'Этот файл слишком большой для обработки UNPLAG';
$string['unknownwarning'] = 'Произошла ошибка при попытке отправить этот файл в UNPLAG';
$string['unplag'] = 'UNPLAG - плагин антиплагиата';
$string['unplag_api_secret'] = 'API секрет';
$string['unplag_api_secret_help'] = 'API секрет предоставляется Вам сервисом UNPLAG для доступа к API. Эти данные Вы можете найти здесь: <a href="https://unplag.com/profile/apisettings">https://unplag.com/profile/apisettings</a>';
$string['unplag_client_id'] = 'Ключ API';
$string['unplag_client_id_help'] = 'Ключ API предоставляется Вам сервисом UNPLAG для доступа к API. Эти данные Вы можете найти здесь: <a href="https://unplag.com/profile/apisettings">https://unplag.com/profile/apisettings</a>';
$string['unplagdebug'] = 'Отладка';
$string['unplagdefaults'] = 'Настройки UNPLAG по умолчанию';
$string['unplag_draft_submit'] = 'Когда файл следует подать в UNPLAG';
$string['unplag:enable'] = 'Включать/отключать UNPLAG внутри активного элемента';
$string['unplag_enableplugin'] = 'Включить UNPLAG для {$a}';
$string['unplagfiles'] = 'Файлы Unplag';
$string['unplag_lang'] = 'Язык';
$string['unplag_lang_help'] = 'Код языка, предоставленный UNPLAG';
$string['unplag:resetfile'] = 'Повторно подавать файл в UNPLAG после возникновения ошибки';
$string['unplag_settings_url_text'] = 'Открыть административный аккаунт Unplag.com, чтобы посмотреть или скопировать Ключ API/API секрет';
$string['unplag_show_student_report'] = 'Показать отчет сходства студенту';
$string['unplag_show_student_report_help'] = 'Отчет сходства предоставляет разбивку материала на части, которые уличены в плагиате и источник, где UNPLAG нашел это содержимое.';
$string['unplag_show_student_score'] = 'Показывать процент сходства студенту';
$string['unplag_show_student_score_help'] = 'Процент сходства это процент ответа, который имеет сходство с другим текстом';
$string['unplag_studentemail'] = 'Отправить по электронной почте студенту';
$string['unplag_studentemail_help'] = 'Когда файл будет обработан, на электронную почту студенту будет отправлено сообщение, что отчет уже доступен';
$string['unplag:vieweditreport'] = 'Просматривать и редактировать полный отчет UNPLAG';
$string['unplag:viewreport'] = 'Просматривать полный отчет UNPLAG';
$string['unsupportedfiletype'] = 'Этот тип файла не поддерживается UNPLAG';
$string['use_unplag'] = 'Включить UNPLAG';
$string['useunplag_assign_desc_param'] = 'Чтобы разблокировать настройки Unplag';
$string['useunplag_assign_desc_value'] = 'Задать: Настройки задания → Параметры ответа → Требовать нажатия кнопки «Отправить» = Да';
$string['use_unplag_help'] = 'Чтобы использовать Unplag, сначала установите для параметра «Требовать нажатия кнопки Отправить» значение «Да» (Настройки задания - Параметры ответа).';
$string['waitingevents'] = 'Есть события ({$a->countallevents}), которые ждут cron и события ({$a->countheld}), ожидающие повторной подачи';
$string['web'] = 'Документ против Интернета';
$string['web_and_my_library'] = 'Документ против Интернета + Библиотеки';
