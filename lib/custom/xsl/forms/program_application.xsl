<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">


    <xsl:template match="root">

        <style>
            hr {
                margin-bottom: 30px;
            }

            .row div {
                margin-bottom: 20px;
            }
        </style>


        <form action="{wwwroot}/blocks/programs/app_form.php" method="POST" id="app_form">
            <div class="row center">
                <h3>Данные потребителя</h3>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="surname1">Фамилия (в именительном падеже)</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="surname1" id="surname1" class="form-control" required="required" value="{app/surname1}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="surname11">Фамилия (в родительном падеже)</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="surname11" id="surname11" class="form-control" required="required" value="{app/surname11}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="name1">Имя (в именительном падеже)</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="name1" id="name1" class="form-control" required="required" value="{app/name1}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="name11">Имя (в родительном падеже)</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="name11" id="name11" class="form-control" required="required" value="{app/name11}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="patronymic1">Отчество (в именительном падеже)</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="patronymic1" id="patronymic1" class="form-control" required="required" value="{app/patronymic1}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="patronymic11">Отчество (в родительном падеже)</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="patronymic11" id="patronymic11" class="form-control" required="required" value="{app/patronymic11}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="birthday1">Дата рождения</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="date" name="birthday1" id="birthday1" class="form-control" required="required" value="{app/birthday1}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="phone1">Номер(а) телефона(ов)</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="phone1" id="phone1" class="form-control" required="required" value="{app/phone1}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="country_id1">Страна</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <select class="form-control" name="country_id1" id="country_id" data-selector="1">
                        <option value="0">Выберите из списка</option>
                        <xsl:call-template name="country">
                            <xsl:with-param name="type">1</xsl:with-param>
                        </xsl:call-template>
                    </select>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="passport_number1">Серия и номер паспорта</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="passport_number1" id="passport_number1" class="form-control" required="required" value="{app/passport_number1}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="region_id1">Регион</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <select class="form-control" name="region_id1" id="region_id" data-selector="1">
                        <option value="0">Выберите из списка</option>
                        <xsl:call-template name="region">
                            <xsl:with-param name="type">1</xsl:with-param>
                        </xsl:call-template>
                    </select>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="passport_author1">Кем выдан</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="passport_author1" id="passport_author1" class="form-control" required="required" value="{app/passport_author1}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="city_id1">Населенный пункт</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <select class="form-control" name="city_id1" id="city_id" data-selector="1">
                        <option value="0">Выберите из списка</option>
                        <xsl:call-template name="city">
                            <xsl:with-param name="type">1</xsl:with-param>
                        </xsl:call-template>
                    </select>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="passport_date1">Когда выдан</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="date" name="passport_date1" id="passport_date1" class="form-control" required="required" value="{app/passport_date1}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="address1">Адрес:</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="address1" id="address1" class="form-control" required="required" value="{app/address1}" placeholder="ул. Ленина д. 47 кв. 94" />
                </div>

            </div>

            <!--<xsl:if test="full_years &gt; 18">-->
                <hr/>

                <div class="row center">
                    <label for="equal">Данные потребителя совпадают с данными заказчика</label>
                    <input type="checkbox" id="equal" />
                </div>
            <!--</xsl:if>-->


            <hr/>

            <div class="row center">
                <h3>Данные заказчика</h3>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="surname2">Фамилия (в именительном падеже)</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="surname2" id="surname2" class="form-control" required="required" value="{app/surname2}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="surname12">Фамилия (в родительном падеже)</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="surname12" id="surname12" class="form-control" required="required" value="{app/surname12}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="name2">Имя (в именительном падеже)</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="name2" id="name2" class="form-control" required="required" value="{app/name2}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="name12">Имя (в родительном падеже)</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="name12" id="name12" class="form-control" required="required" value="{app/name12}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="patronymic2">Отчество (в именительном падеже)</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="patronymic2" id="patronymic2" class="form-control" required="required" value="{app/patronymic2}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="patronymic12">Отчество (в родительном падеже)</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="patronymic12" id="patronymic12" class="form-control" required="required" value="{app/patronymic12}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="birthday2">Дата рождения</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="date" name="birthday2" id="birthday2" class="form-control" required="required" value="{app/birthday2}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="phone2">Номер(а) телефона(ов)</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="phone2" id="phone2" class="form-control" required="required" value="{app/phone2}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="country_id2">Страна</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <select class="form-control" name="country_id2" id="country_id" data-selector="2">
                        <option value="0">Выберите из списка</option>
                        <xsl:call-template name="country">
                            <xsl:with-param name="type">2</xsl:with-param>
                        </xsl:call-template>
                    </select>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="passport_number2">Серия и номер паспорта</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="passport_number2" id="passport_number2" class="form-control" required="required" value="{app/passport_number2}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="region_id2">Регион</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <select class="form-control" name="region_id2" id="region_id" data-selector="2">
                        <option value="0">Выберите из списка</option>
                        <xsl:call-template name="region">
                            <xsl:with-param name="type">2</xsl:with-param>
                        </xsl:call-template>
                    </select>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="passport_author2">Кем выдан</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="passport_author2" id="passport_author2" class="form-control" required="required" value="{app/passport_author2}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="city_id2">Населенный пункт</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <select class="form-control" name="city_id2" id="city_id" data-selector="2">
                        <option value="0">Выберите из списка</option>
                        <xsl:call-template name="city">
                            <xsl:with-param name="type">2</xsl:with-param>
                        </xsl:call-template>
                    </select>
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="passport_date2">Когда выдан</label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="date" name="passport_date2" id="passport_date2" class="form-control" required="required" value="{app/passport_date2}" />
                </div>

                <div class="col-md-3 col-sm-6 col-xs-12 right">
                    <label for="address2">Адрес: </label>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12 left">
                    <input type="text" name="address2" id="address2" class="form-control" required="required" value="{app/address2}" placeholder="ул. Ленина д. 47 кв. 94" />
                </div>

            </div>


            <input type="hidden" name="user_id" value="{user/id}" />
            <input type="hidden" name="period_id" value="{program_period/id}" />
            <input type="hidden" name="id" value="{app/id}" />
            <input type="hidden" name="action" value="save_app_data" />

            <hr/>

            <div class="row right">
                <input type="submit" value="Сохранить" class="btn btn-green" />
            </div>

        </form>
    </xsl:template>


    <xsl:template name="country">
        <xsl:param name="type" />

        <xsl:for-each select="country">
            <xsl:variable name="id" select="id" />
            <option value="{id}">
                <xsl:choose>
                    <xsl:when test="$type = 1">
                        <xsl:if test="//app/country_id1 = $id">
                            <xsl:attribute name="selected">selected</xsl:attribute>
                        </xsl:if>
                    </xsl:when>
                    <xsl:otherwise>
                        <xsl:if test="//app/country_id2 = $id">
                            <xsl:attribute name="selected">selected</xsl:attribute>
                        </xsl:if>
                    </xsl:otherwise>
                </xsl:choose>
                <xsl:value-of select="name" />
            </option>
        </xsl:for-each>
    </xsl:template>


    <xsl:template name="region">
        <xsl:param name="type" />

        <xsl:variable name="country_id">
            <xsl:choose>
                <xsl:when test="$type=1"><xsl:value-of select="//app/country_id1" /></xsl:when>
                <xsl:otherwise><xsl:value-of select="//app/country_id2" /></xsl:otherwise>
            </xsl:choose>
        </xsl:variable>

        <xsl:for-each select="region[country_id=$country_id]">
            <xsl:variable name="id" select="id" />
            <option value="{id}">
                <xsl:choose>
                    <xsl:when test="$type = 1">
                        <xsl:if test="//app/region_id1 = $id">
                            <xsl:attribute name="selected">selected</xsl:attribute>
                        </xsl:if>
                    </xsl:when>
                    <xsl:otherwise>
                        <xsl:if test="//app/region_id2 = $id">
                            <xsl:attribute name="selected">selected</xsl:attribute>
                        </xsl:if>
                    </xsl:otherwise>
                </xsl:choose>
                <xsl:value-of select="name" />
            </option>
        </xsl:for-each>
    </xsl:template>


    <xsl:template name="city">
        <xsl:param name="type" />

        <xsl:variable name="region_id">
            <xsl:choose>
                <xsl:when test="$type=1"><xsl:value-of select="//app/region_id1" /></xsl:when>
                <xsl:otherwise><xsl:value-of select="//app/region_id2" /></xsl:otherwise>
            </xsl:choose>
        </xsl:variable>

        <xsl:for-each select="city[region_id=$region_id]">
            <xsl:variable name="id" select="id" />
            <option value="{id}">
                <xsl:choose>
                    <xsl:when test="$type = 1">
                        <xsl:if test="//app/city_id1 = $id">
                            <xsl:attribute name="selected">selected</xsl:attribute>
                        </xsl:if>
                    </xsl:when>
                    <xsl:otherwise>
                        <xsl:if test="//app/city_id2 = $id">
                            <xsl:attribute name="selected">selected</xsl:attribute>
                        </xsl:if>
                    </xsl:otherwise>
                </xsl:choose>
                <xsl:value-of select="name" />
            </option>
        </xsl:for-each>
    </xsl:template>


</xsl:stylesheet>