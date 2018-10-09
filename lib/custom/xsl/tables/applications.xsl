<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">


    <xsl:template match="root">

        <style>
            form .row {
                margin-bottom: 20px;
            }
        </style>

        <div class="applications">
            <xsl:choose>
                <xsl:when test="count(app) = 0">
                    <h5>Вы не подали ни одной заявки на программу</h5>
                </xsl:when>
                <xsl:otherwise>
                    <table class="table">
                        <tr>
                            <th>Программа</th>
                            <th>Период проведения <br/>программы</th>
                            <th>Документы</th>
                            <th>Действия</th>
                        </tr>
                        <xsl:apply-templates select="app" />
                    </table>
                </xsl:otherwise>
            </xsl:choose>
        </div>
    </xsl:template>


    <xsl:template match="app">
        <tr>
            <td>
                <a href="/blocks/programs?prid={program_id}"><xsl:value-of select="title" /></a>
            </td>

            <td>
                <xsl:value-of select="date_start" />
                <xsl:text> - </xsl:text>
                <xsl:value-of select="date_end" />
            </td>

            <td>
                <xsl:if test="count(file) = 0">
                    <p>Для записи на программу необходимо загрузить заявление, договор и квитанцию об оплате.</p>
                </xsl:if>

                <xsl:if test="count(file) = 4 and file/confirmed = 0">
                    <p style="color: orange">Ваши документы будут проверены модератором в течении одного рабочего дня.</p>
                    <p style="color: orange">До тех пор Вы можете загрузить их заново.</p>
                </xsl:if>

                <xsl:if test="count(file) = 4 and file/confirmed = -1">
                    <p style="color: red">Загруженные ранее Вами документы для записи на программу были отклонены модератором.</p>
                    <p style="color: red">Необходимо проверить загружаемые документы на наличие </p>
                </xsl:if>

                <xsl:choose>
                    <xsl:when test="count(file) = 4 and file/confirmed = 1">
                        <p style="color: green">Документы на данную программу были одобрены модератором</p>
                    </xsl:when>
                    <xsl:otherwise>
                        <form action="/blocks/programs/app_form.php" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="upload_app_docs" />
                            <input type="hidden" name="program_id" value="{program_id}" />
                            <input type="hidden" name="period_id" value="{period_id}" />

                            <div class="row">
                                <div class="col-md-4"><label for="application">Заявление на запись:</label></div>
                                <div class="col-md-4"><input type="file" name="application" id="application" required="required" /></div>
                                <div class="col-md-4"><a href="/blocks/docs/get_template.php?template_type=application&amp;appid={id}" class="btn btn-orange">Шаблон</a></div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"><label for="contract">Договор:</label></div>
                                <div class="col-md-4"><input type="file" name="contract" id="contract" required="required" /></div>
                                <div class="col-md-4"><a href="/blocks/docs/get_template.php?template_type=contract&amp;appid={id}" class="btn btn-orange">Шаблон</a></div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"><label for="ticket">Квитанция об оплате:</label></div>
                                <div class="col-md-4"><input type="file" name="ticket" id="ticket" required="required" /></div>
                                <div class="col-md-4"><a href="/blocks/docs/get_template.php?template_type=ticket&amp;appid={id}" class="btn btn-orange">Шаблон</a></div>
                            </div>

                            <div class="row">
                                <div class="col-md-4"><label for="passport">Копия пасспорта:</label></div>
                                <div class="col-md-4"><input type="file" name="passport" id="passport" required="required" /></div>
                                <!--<div class="col-md-4"><a href="/blocks/docs/templates/get_template.php?template_type=passport&amp;appid={id}" class="btn btn-orange">Шаблон</a></div>-->
                            </div>

                            <div class="row">
                                <div class="offset-md-8 col-md-4"><input type="submit" class="btn btn-blue" value="Загрузить" /></div>
                            </div>
                        </form>
                    </xsl:otherwise>
                </xsl:choose>
            </td>

            <td>
                <xsl:if test="count(file) = 0 or (count(file) = 4 and file/confirmed = 0) or (count(file) = 4 and file/confirmed = -1)">
                    <a href="/blocks/programs/app_form.php?period_id={period_id}" class="action edit" data-id="{id}"></a>
                    <a href="#" class="action delete" data-id="{id}" data-model_name="Program_Application"></a>
                </xsl:if>
            </td>
        </tr>
    </xsl:template>


</xsl:stylesheet>