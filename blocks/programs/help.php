<?php
/**
 * Раздел "Инструкции"
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
            <h5 class="card-title d-inline">Регистрация</h5>
            <!--«»-->
            <div class="card-text content mt-3">
                <p>Для регистрации на портале необходимо нажать на «Вход» в верх-нем правом углу главной страницы сайта.</p>
                <div class="help-img">
                    <img src="<?php $CFG->wwwroot;?>/theme/klass/pix/help/screen1.png" width="100%" />
                    <p></p>
                </div>

                <p>После чего выбрать в открывшемся окне «Создать учетную запись».</p>
                <div class="help-img">
                    <img src="<?php $CFG->wwwroot;?>/theme/klass/pix/help/screen2.png" width="100%" />
                    <p></p>
                </div>

                <p>Необходимо заполнить форму, в которой указать адрес электронной почты, пароль, подтверждение пароля. После чего следует
                    ознакомиться с пользовательским соглашением, которое можно скачать по одноименной ссылке. Для продолжения регистрации необходимо
                    установить флажок в поле «Я понял(а) и согласен(на)» и нажать на кнопку «Сохранить». При отказе от пользовательского соглашения,
                    для завершения работы с порта-лом нажмите «Отмена», регистрация не будет произведена, данные будут удалены.</p>
                <div class="help-img">
                    <img src="<?php $CFG->wwwroot;?>/theme/klass/pix/help/screen3.png" width="100%" />
                    <p></p>
                </div>

                <p>После сохранения, по указанному адресу электронной почты придет письмо с подтверждением регистрации.</p>
                <div class="help-img">
                    <img src="<?php $CFG->wwwroot;?>/theme/klass/pix/help/screen4.png" width="100%" />
                    <p></p>
                </div>

                <p>При переходе по ссылке из письма, необходимо заполнить регистра-ционную карточку пользователя. Все обязательные поля помечены крас-ным. </p>
                <div class="help-img">
                    <img src="<?php $CFG->wwwroot;?>/theme/klass/pix/help/screen5.png" width="100%" />
                    <p></p>
                </div>

                <p>При заполнении личной информации возможно загрузить свою фо-тографию. Для этого необходимо перетащить файл с рабочего стола в по-ле для загрузки файлов.</p>
                <div class="help-img">
                    <img src="<?php $CFG->wwwroot;?>/theme/klass/pix/help/screen6.png" width="100%" />
                    <p></p>
                </div>

                <p>Нажав на «Обновить профиль», регистрация успешно завершается.</p>
                <div class="help-img">
                    <img src="<?php $CFG->wwwroot;?>/theme/klass/pix/help/screen7.png" width="100%" />
                    <p></p>
                </div>

                <p>Для продолжения работы на портале, нажмите кнопку «Продол-жить». Осуществится переход в личный кабинет.</p>
                <div class="help-img">
                    <img src="<?php $CFG->wwwroot;?>/theme/klass/pix/help/screen8.png" width="100%" />
                    <p></p>
                </div>

                <p>Для редактирования информации, изменения пароля, нажмите на ФИО в верхнем правом углу страницы и выберите из выпадающего списка «Настройки».</p>
                <div class="help-img">
                    <img src="<?php $CFG->wwwroot;?>/theme/klass/pix/help/screen9.png" width="100%" />
                    <p></p>
                </div>



            </div>
        </div>
    </section>


<!--    <section class="block card mb-3">-->
<!--        <div class="card-body">-->
<!--            <h5 class="card-title d-inline">Документооборот</h5>-->
<!---->
<!--            <div class="card-text content mt-3">-->
<!--                <p>-->
<!--                    Со стороны администратора все новые документы, загружаемые пользователями, отображаются в блоке «Документы».-->
<!--                    Администратор может скачать документы и после просмотра одобрить или отклонить документы по каким-то причинам.-->
<!--                    После одобрения администратором согласия на обработку персональных данных у пользователя появляется возможность подачи заявки на программу,-->
<!--                    а после одобрения ряда документов, прикрепленных к заявке, пользователь автоматически подписывается на курсы, принадлежащие программе.-->
<!--                </p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
<!---->
<!---->
<!--    <section class="block card mb-3">-->
<!--        <div class="card-body">-->
<!--            <h5 class="card-title d-inline">Курсы</h5>-->
<!---->
<!--            <div class="card-text content mt-3">-->
<!--                <p>Курсы создаются администратором через админ. панель. Путь к разделу работы с курсами указан на рисунке 1.</p>-->
<!---->
<!--                <div class="help-img">-->
<!--                    <img src="--><?php //$CFG->wwwroot;?><!--/theme/klass/pix/help/screen1.png" width="100%" />-->
<!--                    <p>Рисунок №1</p>-->
<!--                </div>-->
<!---->
<!--                <p>-->
<!--                    При создании курса, для корректной работы программ, необходимо убирать галочку напротив даты окончания курса, как показано ни рисунке 2,-->
<!--                    а дата начала курса должна быть меньше либо равной дате начала самого раннего из периодов программы, к которой будет привязан курс.-->
<!--                </p>-->
<!---->
<!--                <div class="help-img">-->
<!--                    <img src="--><?php //$CFG->wwwroot;?><!--/theme/klass/pix/help/screen2.png" width="100%" />-->
<!--                    <p>Рисунок №2.</p>-->
<!--                </div>-->
<!---->
<!--                <p>Создавая курс для олимпиады галочку напротив даты окончания убирать не надо.</p>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
<!---->
<!---->
<!--    <section class="block card mb-3">-->
<!--        <div class="card-body">-->
<!--            <h5 class="card-title d-inline">Доступы</h5>-->
<!---->
<!--            <div class="card-text content mt-3">-->
<!--                <table class="table">-->
<!--                    <tr>-->
<!--                        <th>Роль</th>-->
<!--                        <th>Логин</th>-->
<!--                        <th>Пароль</th>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Администратор</td>-->
<!--                        <td>admin</td>-->
<!--                        <td>rh54gr16351rr65АВ*</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Студент</td>-->
<!--                        <td>kjnjkndi@df.ri</td>-->
<!--                        <td>rh54gr16351rr65АВ*</td>-->
<!--                    </tr>-->
<!--                    <tr>-->
<!--                        <td>Студент</td>-->
<!--                        <td>kjnjkn@df.ri</td>-->
<!--                        <td>rh54gr16351rr65АВ*</td>-->
<!--                    </tr>-->
<!--                </table>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->


</div>

<?php
echo $OUTPUT->footer();