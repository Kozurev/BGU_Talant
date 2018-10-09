<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="root">
        <div class="program">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <img width="100%">
                        <xsl:attribute name="src">
                            <xsl:choose>
                                <xsl:when test="program/logo_id = 0">
                                    /theme/klass/pix/boxes/default.png
                                </xsl:when>
                                <xsl:otherwise>
                                    /blocks/docs/files.php?fileid=<xsl:value-of select="program/logo_id" />
                                </xsl:otherwise>
                            </xsl:choose>
                        </xsl:attribute>
                    </img>
                </div>

                <div class="col-md-8 col-sm-12">
                    <h2><xsl:value-of select="program/title" /></h2>
                    <p class="program_type">Тип программы: <b><xsl:value-of select="program_type/full_name" /></b></p>
                    <p class="program_form">Форма обучения: <xsl:value-of select="program_form/title" /></p>
                    <p class="program_document">Тип выдаваемого документа: <xsl:value-of select="program/document_type" /></p>
                    <p class="description"><xsl:value-of select="program/description" /></p>
                </div>
            </div>

            <div class="row bottom right">
                <span class="price">Цена <b><xsl:value-of select="program/price" /> руб.</b></span>
                <xsl:choose>
                    <xsl:when test="count(program_period) = 0">
                        <span>На данный момент запись на программу невозможна.</span>
                    </xsl:when>
                    <xsl:otherwise>
                        <xsl:choose>
                            <xsl:when test="isset_agreement = 1">
                                <form method="GET" action="/blocks/programs/app_form.php">
                                    <select name="period_id">
                                        <xsl:for-each select="program_period">
                                            <option value="{id}">
                                                <xsl:value-of select="date_start" />
                                                <xsl:text> - </xsl:text>
                                                <xsl:value-of select="date_end" />
                                            </option>
                                        </xsl:for-each>
                                    </select>
                                    <input type="submit" value="Подать заявку" class="btn btn-green" />
                                </form>
                            </xsl:when>
                            <xsl:otherwise>
                                <br/><span>Для подачи заявки записи на курс необходимо загрузить фотографию или скан-копию соглашения на обработку персональных данных в личном кабинете.<br/>
                                Загруденный Вами файл будет проверен модератором в течении одного рабочего дня. <br/>
                                При одобрении загруденного согласия модератором у Вас появится возможность подачи заявки для записи на курс</span>
                            </xsl:otherwise>
                        </xsl:choose>
                    </xsl:otherwise>
                </xsl:choose>
            </div>
        </div>
    </xsl:template>
</xsl:stylesheet>