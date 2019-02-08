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
 * Strings for component 'mlbackend_php', language 'ru', branch 'MOODLE_35_STABLE'
 *
 * @package   mlbackend_php
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['datasetsizelimited'] = 'Из-за большого размера была оценена только часть набора данных. Установите $CFG->mlbackend_php_no_memory_limit, если вы уверены, что система может справиться с набором данных {$a}.';
$string['errorcantloadmodel'] = 'Файл модели {$a} не существует. Модель должна быть обучена, прежде чем использовать её для прогнозирования.';
$string['errorlowscore'] = 'Точность предсказания оценивающей модели не очень высока, поэтому некоторые прогнозы могут быть неточными. Оценка модели = {$a->score}, минимальная оценка = {$a->minscore}';
$string['errornotenoughdata'] = 'Недостаточно данных для оценки этой модели с использованием метода разделения по времени.';
$string['errornotenoughdatadev'] = 'Результаты оценивания слишком сильно изменились. Рекомендуется собрать больше данных, чтобы убедиться, что модель действительно работает. Стандартное отклонение результатов оценки  = {$a->deviation}, максимальное рекомендуемое стандартное отклонение = {$a->accepteddeviation}';
$string['errorphp7required'] = 'PHP-механизму машинного обучения требуется PHP 7';
$string['pluginname'] = 'PHP-механизм машинного обучения';
