<?php
/**
 * Промежуточная страницамежду регистрацией на олимпиаду и ЛК/страницей с олимпиадами
 *
 * @author Bad Wolf
 * @date 04.02.2019 11:26
 */


require_once '../../config.php';
global $CFG, $PAGE, $OUTPUT, $USER;
require_once $CFG->libdir . '/custom/autoload.php';

$PAGE->set_url('/blocks/olympiads/intermediate_page.php' );
$PAGE->set_pagelayout( 'standard' );
$PAGE->set_cacheable( false );
$PAGE->set_context( context_system::instance() );

$PAGE->navbar->add( STR_OLYMPIADS, $CFG->wwwroot . '/blocks/olympiads/' );
$PAGE->navbar->add( 'Завершение регистрации на олимпиаду' );
$PAGE->set_title( 'Завершение регистрации на олимпиаду' );

echo $OUTPUT->header();

echo '<h1>Ваши дальнейшие действия?</h1>';

echo '<a class="btn btn-primary" href="' . $CFG->wwwroot . '/blocks/olympiads/">к списку олимпиад</a>';
echo '<a class="btn btn-primary" href="' . $CFG->wwwroot . '/my/">в личный кабинет</a>';

echo $OUTPUT->footer();