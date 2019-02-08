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
 * Strings for component 'cachestore_apcu', language 'ru', branch 'MOODLE_35_STABLE'
 *
 * @package   cachestore_apcu
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['clusternotice'] = 'Имейте в виду, что APCu является подходящим выбором только для одиночных сайтов или кеш-узлов, которые могут храниться локально.
Дополнительную информацию см. в <a href="{$a}">Документации по использованию пользовательского кэша APC </a>.';
$string['notice'] = 'Уведомление';
$string['pluginname'] = 'Пользовательский кэш APC (APCu)';
$string['prefix'] = 'Префикс';
$string['prefix_help'] = 'Приведенный выше префикс используется для всех ключей, хранящихся в этом экземпляре хранилища APC (акселератор для PHP). По умолчанию используется префикс базы данных.';
$string['prefixinvalid'] = 'Выбранный префикс недействителен. Вы можете использовать только a-z A-Z 0-9-_.';
$string['prefixnotunique'] = 'Выбранный префикс не уникален. Выберите уникальный префикс.';
$string['privacy:metadata'] = 'Плагин хранилища кэша «Пользовательский кэш APC (APCu)» хранит данные в течение короткого времени как часть своей функции кэширования, но эти данные регулярно очищаются и никоим образом не отправляются вне системы.';
$string['testperformance'] = 'Тест на производительность';
$string['testperformance_desc'] = 'Если включено, эффективность APCu будет отображена при просмотре теста на производительность. Включение этого параметра на рабочих сайтах НЕ рекомендуется.';
