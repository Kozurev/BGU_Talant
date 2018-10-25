<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="root">

        <script>
            /*$(function(){

                var errorMessage = "Это поле обязательно к заполнению";

                $("form[name=olympiad_form]").validate({
                    rules: {
                        surname:    { required: true },
                        name:       { required: true },
                    },
                    messages: {
                        surname:    { required: errorMessage },
                        name:       { required: errorMessage }
                    }
                });
            });*/
        </script>

        <form method="POST" action="app_form.php" name="olympiad_form">
            <div class="row center">
                <div class="col-lg-12">
                    <h3>Карточка участника</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="surname" class="required">Фамилия</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="text" class="form-control" name="surname" id="surname" value="{app/surname}" />
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="name" class="required">Имя</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="text" class="form-control" name="name" id="name" value="{app/name}" />
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="patronymic">Отчество</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="text" class="form-control" name="patronymic" id="patronymic" value="{app/patronymic}" />
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="country">Страна</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="text" class="form-control" name="country" id="country" value="{app/country}" />
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="city">Город</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="text" class="form-control" name="city" id="city" value="{app/city}" />
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="sex" class="required">Пол</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <select name="sex" id="sex" class="form-control">
                        <option value="1">
                            <xsl:if test="app/sex = 1">
                                <xsl:attribute name="selected">selected</xsl:attribute>
                            </xsl:if>
                            Мужской
                        </option>
                        <option value="2">
                            <xsl:if test="app/sex = 2">
                                <xsl:attribute name="selected">selected</xsl:attribute>
                            </xsl:if>
                            Женский
                        </option>
                    </select>
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="nationality" class="required">Гражданство</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="text" class="form-control" name="nationality" id="nationality" value="{app/nationality}" />
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="educational_institution" class="required">Название образовательного учреждения</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="text" class="form-control" name="educational_institution" id="educational_institution" value="{app/educational_institution}" />
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="class" class="required">Класс</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <select class="form-control" name="class" id="class">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                    </select>

                    <script>
                        $("#class").val("<xsl:value-of select="app/class" />");
                    </script>

                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="address" class="required">Адрес проживания (с индексом)</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="text" class="form-control" name="address" id="address" value="{app/address}" />
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="phone" class="required">Номер телефона (с кодом города)</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="text" class="form-control" name="phone" id="phone" value="{app/phone}" />
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="additional_phone">Дополнительный номер телефона (с кодом города)</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="text" class="form-control" name="additional_phone" id="additional_phone" value="{app/additional_phone}" />
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="email" class="required">Email</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="email" class="form-control" name="email" id="email" value="{app/email}" />
                </div>

                <div class="col-md-4 col-sm-6 col-xs-6 left">
                    <input type="checkbox" name="agreement" id="agreement" />
                    <label for="agreement" class="required">Даю свое согласие на обработку данных</label>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6 left">
                    <input type="checkbox" name="correct" id="correct" />
                    <label for="correct" class="required">Подтверждаю достоверность предоставленных данных</label>
                </div>

            </div>

            <input type="hidden" name="action" value="save_app_data" />
            <input type="hidden" name="id" value="{app/id}" />
            <input type="hidden" name="user_id" value="{user_id}" />
            <input type="hidden" name="olympiad_id" value="{olid}" />

            <div class="row center">
                <p>Обязательные поля отмечены <span style="color: red;">*</span></p>
                <input type="submit" class="btn btn-primary" value="Сохранить" />
            </div>
        </form>

    </xsl:template>
</xsl:stylesheet>