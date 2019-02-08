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
 * Strings for component 'qtype_formulas', language 'ru', branch 'MOODLE_35_STABLE'
 *
 * @package   qtype_formulas
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['abserror'] = 'Абсолютная ошибка';
$string['addmorepartsblanks'] = 'Добавить еще части - {no}';
$string['algebraic_formula'] = 'Алгебраическая формула';
$string['answer'] = 'Ответ*';
$string['answer_help'] = '** Требование**.
Должен быть перечень чисел или список значений в зависимости от выбранного типа ответа. При единственном ответе число или значение могут быть введены непосредственно. Обратите внимание на то, что количество элементов в списке задает число полей ответа для этой части.

<pre class="prettyprint">123<br>[1, 0, 0, 1]<br>a<br>[1, a, b]<br>"exp(-a t)"<br>["vx t","vy t - 0.5 a t^2"]</pre>';
$string['answermark'] = 'Оценка части*';
$string['answermark_help'] = '** Требование **.
Оценка за эту часть ответа должна больше 0.
По умолчанию оценка за весь вопрос - сумма оценок за все части.

Примечание: Если поле оценки этой части будет пустым, то часть будет удалена при сохранении вопроса.';
$string['answerno'] = 'Часть {$a}';
$string['answertype'] = 'Тип ответа';
