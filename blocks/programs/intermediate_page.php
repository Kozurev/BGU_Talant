<?php
/**
 * Промежуточная страницамежду регистрацией на програму и ЛК/страницей с программами
 *
 * @author Bad Wolf
 * @date 04.02.2019 11:27
 */


require_once '../../config.php';
global $CFG, $PAGE, $OUTPUT, $USER;
require_once $CFG->libdir . '/custom/autoload.php';

$PAGE->set_url('/blocks/programs/intermediate_page.php' );
$PAGE->set_pagelayout( 'standard' );
$PAGE->set_cacheable( false );
$PAGE->set_context( context_system::instance() );

$PAGE->navbar->add( STR_PROGRAMS, $CFG->wwwroot . '/blocks/programs/' );
$PAGE->navbar->add( 'Завершение регистрации на подготовительный курс' );
$PAGE->set_title( 'Завершение регистрации на подготовительный курс' );

echo $OUTPUT->header();

echo '<h1>Ваши дальнейшие действия?</h1>';

echo '<a class="btn btn-primary" href="' . $CFG->wwwroot . '/blocks/programs/">к списку подготовительных курсов</a>';
echo '<a class="btn btn-primary" href="' . $CFG->wwwroot . '/my/">в личный кабинет</a>';

echo $OUTPUT->footer();