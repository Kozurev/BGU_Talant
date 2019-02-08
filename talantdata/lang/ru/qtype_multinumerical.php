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
 * Strings for component 'qtype_multinumerical', language 'ru', branch 'MOODLE_35_STABLE'
 *
 * @package   qtype_multinumerical
 * @copyright 1999 onwards Martin Dougiamas  {@link http://moodle.com}
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

$string['answer'] = 'Ваш ответ: {$a}';
$string['badfeedbackperconditionsyntax'] = 'Каждая строка должна иметь вид: «Отзыв, если условие выполнено | Отзыв, если условие не выполнено»';
$string['badnumfeedbackperconditions'] = 'Количество отзывов не может быть больше, чем количество условий';
$string['binarygrade'] = 'Вычисление оценки';
$string['conditionnotverified'] = 'Условие не выполнено';
$string['conditions'] = 'Условия';
$string['conditionverified'] = 'Условие выполнено';
$string['displaycalc'] = 'Отображать результаты вычислений';
$string['feedbackperconditions'] = 'Отзыв к каждому условию';
$string['gradebinary'] = 'Всё или ничего';
$string['gradefractional'] = 'Дробная оценка';
$string['helponquestionoptions'] = 'Для подробной информации по данному типу вопроса и настройке следующих параметров нажмите кнопку «Справка по использованию элемента» в верхней части страницы.';
$string['noncomputable'] = '(правильные ответы автоматически не вычисляются)';
$string['onlyforcalculations'] = 'Только для вычислений';
$string['parameters'] = 'Параметры';
$string['pleaseenterananswer'] = 'Пожалуйста, введите ответ';
$string['pluginname'] = 'Несколько числовых ответов';
$string['pluginnameadding'] = 'Добавление вопроса «Несколько числовых ответов»';
$string['pluginnameediting'] = 'Редактирование вопроса «Несколько числовых ответов»';
$string['pluginname_help'] = '<h2>Как это работает</h2>
<p>Тип вопроса «Несколько числовых ответов» позволяет задать студентам вопрос, ответ на который состоит из нескольких числовых параметров.</p>
<p><strong>Пример:</strong> найдите такие <span style="font-family:monospace">X</span> и <span style="font-family:monospace">Y</span>, что</p>
<ul><li>X + Y &lt; 20</li><li>X * Y &gt; 35</li></ul>
<p>Существует несколько <em>возможных</em> правильных ответов на этот вопрос, и любой ответ, удовлетворяющий заданным условиям, считается правильным.</p>
<p>Далее в этом типе вопроса требуется указать параметры, которые мы будем использовать (в данном случае <span style="font-family:monospace">X</span> и <span style="font-family:monospace">Y</span>) и указать условия.</p>
<h2>Использование</h2>
<ul>
<li>Введите список параметров, разделяя их запятыми (в данном примере это «<span style="font-family:monospace">X, Y</span>»).<br />
<strong>Примечание:</strong>Для каждого параметра можно указать единицы измерения:
«<span style="font-family:monospace">X [m], Y [h]</span>» (параметр и единица измерения должны разделяться пробелом).</li>
<li>Введите условия, по одному на каждой строке. В нашем примере: <pre>X + Y &lt; 20
X * Y &gt; 35</pre>(пустые строки будут игнорироваться)
<p>Доступные операторы: <ul>
<li>«<span style="font-family:monospace">=</span>» (равенство)</li>
<li>«<span style="font-family:monospace">&lt;</span>» (меньше, чем)</li>
<li>«<span style="font-family:monospace">≤</span>» (меньше или равно)</li>
<li>«<span style="font-family:monospace">&gt;</span>» (больше, чем)</li>
<li>«<span style="font-family:monospace">≥</span>» (больше или равно)</li>
<li>Интервалы:
<pre><span style="font-family:monospace">X = [1;5]</span></pre> (закрытый)
<pre><span style="font-family:monospace">X = ]1;5[</span></pre> (открытый)
</li>
</ul></p></li>
<li>Введите, при необходимости, отзывы к каждому из условий. В нашем примере можно написать:
<pre>Верно : X + Y &lt; 20 | Нет, X + Y ≥ 20 !
Верно : X * Y &gt; 35 | Неверно, X + Y ≤ 35 !</pre>
</li>
<li>При включении параметра «Отображать результаты вычислений», в отзыве будет отображаться результат вычисления для каждого из условий (только в том случае, если отзыв для данного условия не пустой).<br />
При включении параметра «Только для вычислений», результат не будет отображаться для условий, в которых отсутствуют вычисления (например <span style="font-family:monospace">X &gt; 5</span>), для того, чтобы не дать подсказку обучаемому.</li>
<li>Параметр «Вычисление оценки» определяет, будет ли неполный ответ засчитан как частично правильный или полностью неправильный.</li>
</ul>';
$string['pluginnamesummary'] = 'Позволяет создать вопрос, правильных ответов на который может быть много. Условия задаются уравнениями или неравенствами.';
$string['qtypeoptions'] = 'Дополнительные настройки для данного типа вопроса';
$string['usecolorforfeedback'] = 'Использовать цвет для отзыва к каждому условию';
