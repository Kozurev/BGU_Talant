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
 * Strings for component 'qtype_matrix', language 'ru', branch 'MOODLE_35_STABLE'
 *
 * @package   qtype_matrix
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['all'] = 'Подпункты';
$string['allow_dnd_ui'] = 'Разрешить использование перетаскивания (Drag&Drop)';
$string['allow_dnd_ui_descr'] = 'Если разрешено, то учителя получат возможность включать перетаскивание в любом вопросе Matrix';
$string['cols_description'] = 'Описание';
$string['colsheader'] = 'Столбцы матрицы';
$string['colsheader_desc'] = '<p>Короткий текст будет выводиться, если он указан, длинный текст будет использоваться в качестве всплывающей подсказки<br />Учитывайте, как это будет выглядеть.</p>
<p>Ученики могут выбирать несколько или один столбец для каждой строки, в зависимости от того как был настроен вопрос, и каждая строка оценивается, в соответствии с одним из методов оценки.</p>
<p>Итоговая оценка за вопрос это среднее из оценок за каждую строку с исключением для вопроса типа Kprime, где все ответы должны быть правильными.</p>';
$string['cols_shorttext'] = 'Отклик';
$string['false'] = 'Ложь';
$string['grademethod'] = 'Метод оценки';
$string['grademethod_help'] = '<ul>
<li><b>Kprime</b>: Ученик получает один балл, если все ответы верные, половину балла, если один ответ неверный, а остальные верные, в противном случае ученик получает ноль баллов.
<li><b>Kprime1/0</b>: Ученик получает один балл, если все ответы верны и ноль баллов в противном случае.
<li><b>Подпункты</b>: Ученик получает балл подпункта за каждый верный ответ.
</ul>';
$string['kany'] = 'Kprime (по меньшей мере один верный, без неверных ответов)';
$string['kprime'] = 'Kprime1/0';
$string['matrixheader'] = 'Матрица отклика';
$string['multipleallowed'] = 'Разрешить множественные отклики на каждый ответ?';
$string['mustaddupto100'] = 'Сумма всех неотрицательных весов в строке должна быть 100%';
$string['mustdefine1by1'] = 'Вы должны определить матрицу размером не менее 1 x 1; для каждой строки и каждого столбца должен быть определен короткий или длинный ответ.';
$string['oneanswerperrow'] = 'Вы должны указать ответ для каждой строки';
$string['pluginname'] = 'Kprime';
$string['pluginnameadding'] = 'Добавление вопроса Kprime';
$string['pluginnameediting'] = 'Редактирование вопроса Kprime';
$string['pluginname_help'] = 'Вопрос Kprime состоит из основания и четырёх соответствующих утверждений-ответов. Для каждого утверждения-ответа студент должен определить верно ли оно или ложно.';
$string['pluginnamesummary'] = 'В вопросах Kprime ровно 4 таких утверждения должны быть корректно оценены как «истина» или «ложь».';
$string['refresh_matrix'] = 'Обновить матрицу отклика';
$string['rows_description'] = 'Описание';
$string['rows_feedback'] = 'Отзыв';
$string['rowsheader'] = 'Строки матрицы';
$string['rowsheader_desc'] = '<p>Короткий текст будет выводиться, если он указан, длинный текст будет использоваться в качестве всплывающей подсказки<br />Учитывайте, как это будет выглядеть.</p>
<p>Ученики могут выбирать несколько или один столбец для каждой строки, в зависимости от того как был настроен вопрос, и каждая строка оценивается, в соответствии с одним из методов оценки.</p> <p>Итоговая оценка за вопрос это среднее из оценок за каждую строку с исключением для вопроса типа Kprime, где все ответы должны быть правильными.</p>';
$string['rows_shorttext'] = 'Формулировка ответа';
$string['show_non_kprime_gui'] = 'Показывать графический интерфейс пользователя для вариантов, которые не являются точными вариантами матрицы Kprime (более четырех строк, более двух столбцов, множественные варианты).';
$string['shuffleanswers'] = 'Перемешивать формулировки ответов?';
$string['shuffleanswers_help'] = 'Если включено, порядок утверждений-ответов будет перемешан в случайном порядке при каждой попытке, при условии, что параметр «Случайный порядок ответов» в настройках элемента курса также включен.';
$string['true'] = 'Истина';
$string['use_dnd_ui'] = 'Использовать перетаскивание?';
$string['weightednomultiple'] = 'Не имеет смысла выбирать взвешенную оценку в варианте, когда множественные ответы с запрещенны';
