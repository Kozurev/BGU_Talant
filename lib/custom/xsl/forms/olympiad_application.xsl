<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="root">

        <!--<script type="text/javascript" src="{wwwroot}/theme/klass/javascript/jquery.validate.min.js"></script>-->

        <form method="POST" action="app_form.php" name="olympiad_form" id="olympiad_form">
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
                    <input type="text" class="form-control" name="surname" id="surname" required="required" value="{app/surname}" />
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="country_id">Страна</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <select class="form-control" name="country_id" id="country_id">
                        <option value="0">Выберите из списка</option>
                        <xsl:apply-templates select="country" />
                    </select>
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="educational_institution" class="required">Название образовательного учреждения</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="text" class="form-control" name="educational_institution" id="educational_institution" required="required" value="{app/educational_institution}" />
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="name" class="required">Имя</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="text" class="form-control" name="name" id="name" required="required" value="{app/name}" />
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="region_id">Регион</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <select class="form-control" name="region_id" id="region_id">
                        <option value="0">Выберите из списка</option>
                        <xsl:apply-templates select="region" />
                    </select>
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
                    <label for="patronymic">Отчество</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="text" class="form-control" name="patronymic" id="patronymic" required="required" value="{app/patronymic}" />
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="city_id">Населенный пункт</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <select class="form-control" name="city_id" id="city_id">
                        <option value="0">Выберите из списка</option>
                        <xsl:apply-templates select="city" />
                    </select>
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="phone" class="required">Номер телефона (с кодом города)</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="text" class="form-control" name="phone" id="phone" required="required" value="{app/phone}" />
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
                    <label for="address" class="required">Адрес проживания (улица, дом)</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="text" class="form-control" name="address" id="address" required="required" value="{app/address}" />
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="additional_phone">Дополнительный номер телефона (с кодом города)</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="text" class="form-control" name="additional_phone" id="additional_phone" value="{app/additional_phone}" />
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="nationality_id" class="required">Гражданство</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <!--<input type="text" class="form-control" name="nationality_id" id="nationality_id" value="{app/nationality_id}" />-->
                    <select class="form-control" name="nationality_id" id="nationality_id" required="required">
                        <xsl:for-each select="country">
                            <option value="{id}">
                                <xsl:variable name="id" select="id" />
                                <xsl:if test="//app/nationality_id = $id">
                                    <xsl:attribute name="selected">selected</xsl:attribute>
                                </xsl:if>
                                <xsl:value-of select="name" />
                            </option>
                        </xsl:for-each>
                    </select>
                </div>

                <div class="col-md-2 col-sm-6 col-xs-6 right">
                    <label for="email" class="required">Email</label>
                </div>
                <div class="col-md-2 col-sm-6 col-xs-6 left">
                    <input type="email" class="form-control" name="email" id="email" required="required" value="{app/email}" />
                </div>

                <div class="col-md-4 col-sm-6 col-xs-6 left">
                    <input type="checkbox" name="agreement" id="agreement" required="required" />
                    <label for="agreement" class="required">Даю свое согласие на обработку данных</label>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6 right">
                    <input type="checkbox" name="correct" id="correct" required="required"/>
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


    <xsl:template match="country">
        <option value="{id}">
            <xsl:if test="id = //app/country_id">
                <xsl:attribute name="selected">selected</xsl:attribute>
            </xsl:if>
            <xsl:value-of select="name" />
        </option>
    </xsl:template>


    <xsl:template match="region">
        <option value="{id}">
            <xsl:if test="id = //app/region_id">
                <xsl:attribute name="selected">selected</xsl:attribute>
            </xsl:if>
            <xsl:value-of select="name" />
        </option>
    </xsl:template>


    <xsl:template match="city">
        <option value="{id}">
            <xsl:if test="id = //app/city_id">
                <xsl:attribute name="selected">selected</xsl:attribute>
            </xsl:if>
            <xsl:value-of select="name" />
        </option>
    </xsl:template>



</xsl:stylesheet>