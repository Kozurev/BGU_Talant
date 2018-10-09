<?php
/**
 *
 *
 * @author Bad Wolf
 * @date 03.10.2018 11:57
 */

require_once "../../config.php";
global $PAGE, $CFG, $USER, $OUTPUT;
require_once $CFG->libdir . "/custom/autoload.php";

$PAGE->set_url('/blocks/programs/help.php' );
$PAGE->set_pagelayout('standard');
$PAGE->set_cacheable(false);
$context = context_system::instance();
$PAGE->set_context( $context );
$PAGE->set_title( "Инструкция" );
echo $OUTPUT->header();
?>

<div class="help">

    <section class="block card mb-3">
        <div class="card-body">
            <h5 class="card-title d-inline">Общие сведенья</h5>

            <div class="card-text content mt-3">
                <p>
                    Основной частью системы являются программы. Программы создаются и редактируются администратором в личном кабинете.
                    На форме создания/редактирования программы также создается период(ы) проведения. Свойства "начало видимости" и "окончание видимости"
                    это дата начала и окончания периода видимости программы в списке и возможности подачи заявки пользователем для записи.
                    На этой же форме создается связь между програмой и курсами, к которым у потребителя появится доступ после подачи заявки
                    и проверки всех прикрепленных документов модератором. У пользователей сайта есть возможность подачи заявкми на одну и ту же программу, но на разные периоды
                    (не более одной заявки на период). Подавать заявки могут лишь те пользователи, согласие на обработку персональных данных которых было одобрено модератором.
                </p>
            </div>
        </div>
    </section>


    <section class="block card mb-3">
        <div class="card-body">
            <h5 class="card-title d-inline">Документооборот</h5>

            <div class="card-text content mt-3">
                <p>
                    Со стороны администратора все новые документы, загруаемые пользователями, отображаются в блоке "Документы".
                    Администратор может скачать документы и после просмотра одобрить или отклонить документы по каким-то причинам.
                    После одобрения администратором согласия на обработку персональных данных у пользователя появляется возможность подачи заявки на программу,
                    а после одобрения ряда документов, прикрепленных к заявке, пользователь автоматически подписывается на курсы, принадлежащие программе.
                </p>
            </div>
        </div>
    </section>


    <section class="block card mb-3">
        <div class="card-body">
            <h5 class="card-title d-inline">Курсы</h5>

            <div class="card-text content mt-3">
                <p>Курсы создаются администратором через админ. панель. Путь к разделу работы с курсами указан на рисунке 1.</p>

                <div class="help-img">
                    <img src="/theme/klass/pix/help/screen1.png" width="100%" />
                    <p>Рисунок №1</p>
                </div>

                <p>При создании курса, для корректной работы программ, необходимо убирать галочку напротив даты окончания курса, как показано ни рисунке 2,
                а дата начала курса должна быть меньше либо равной дате начала самого раннего из периодов программы, к которой будет привязан курс.</p>

                <div class="help-img">
                    <img src="/theme/klass/pix/help/screen2.png" width="100%" />
                    <p>Рисунок №2.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="block card mb-3">
        <div class="card-body">
            <h5 class="card-title d-inline">Программы</h5>

            <div class="card-text content mt-3">
                <p>Курсы создаются администратором через админ. панель. Путь к разделу работы с курсами указан на рисунке 1.</p>

                <div class="help-img">
                    <img src="/theme/klass/pix/help/screen1.png" width="100%" />
                    <p>Рисунок №1</p>
                </div>


            </div>
        </div>
    </section>


    <section class="block card mb-3">
        <div class="card-body">
            <h5 class="card-title d-inline">Доступы</h5>

            <div class="card-text content mt-3">
                <table class="table">
                    <tr>
                        <th>Роль</th>
                        <th>Логин</th>
                        <th>Пароль</th>
                    </tr>
                    <tr>
                        <td>Администратор</td>
                        <td>admin</td>
                        <td>rh54gr16351rr65АВ*</td>
                    </tr>
                    <tr>
                        <td>Студент</td>
                        <td>kjnjkndi@df.ri</td>
                        <td>rh54gr16351rr65АВ*</td>
                    </tr>
                </table>
            </div>
        </div>
    </section>


</div>

<?
echo $OUTPUT->footer();