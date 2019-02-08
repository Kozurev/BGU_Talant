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
 * Strings for component 'tool_httpsreplace', language 'ru', branch 'MOODLE_35_STABLE'
 *
 * @package   tool_httpsreplace
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['count'] = 'Количество встроенных элементов содержимого';
$string['disclaimer'] = 'Я понимаю риски этой операции';
$string['doclink'] = 'Инструмент преобразования HTTPS';
$string['doit'] = 'Выполнить преобразование';
$string['domain'] = 'Проблемный домен';
$string['domainexplain'] = 'Когда сайт переносится с HTTP на HTTPS, весь встроенный контент HTTP перестает работать. Этот инструмент позволяет вам автоматически преобразовывать HTTP-контент в HTTPS.

Перед выполнением преобразования содержимое сканируется, чтобы найти URL-адреса, которые могут не работать после преобразования. Вы можете проверить, доступен ли каждый по HTTPS или найти альтернативные ресурсы.';
$string['domainexplainhelp'] = 'Эти домены найдены в вашем контенте, но они не поддерживают HTTPS. После перехода на HTTPS контент, содержащийся на этих сайтах, больше не будет отображаться в Moodle пользователям, использующим безопасные современные браузеры. Возможно, эти сайты временно или постоянно будут недоступны по безопасному соединению.
Продолжайте только после просмотра этих результатов и определения того, является ли этот внешний контент несущественным. Примечание: этот контент больше не будет работать после перехода на HTTPS.';
$string['httpwarning'] = 'Этот экземпляр по-прежнему работает по протоколу HTTP. Вы все равно можете запустить этот инструмент и внешний контент будет изменен на HTTPS, но внутренний контент останется на HTTP. Вам нужно будет запустить этот скрипт снова после переключения на HTTPS для преобразования внутреннего контента.';
$string['notimplemented'] = 'К сожалению, эта функция не реализована в управлении вашей базой данных.';
$string['oktoprocede'] = 'Сканирование не обнаружило проблем с вашим контентом. Вы можете продолжить обновление любого HTTP-контента для использования HTTPS.';
$string['pageheader'] = 'Обновление  на HTTPS URL-адресов, размещенных на внешнем сервере,';
$string['pluginname'] = 'Инструмент преобразования HTTPS';
$string['replacing'] = 'Замена HTTP-контента на HTTPS ...';
$string['searching'] = 'Поиск {$a}';
$string['takeabackupwarning'] = 'Предупреждение: после запуска этого инструмента изменения не могут быть отменены.
Перед продолжением рекомендуется создать резервную копию сайта, так как есть небольшой риск неправильной замены существующего контента.';
$string['toolintro'] = 'Если вы планируете преобразовать свой сайт в HTTPS, то можете использовать <a href="{$a}">инструмент преобразования HTTPS </a> для преобразования встроенного контента в HTTPS.';
