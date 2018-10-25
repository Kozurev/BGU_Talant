<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="root">

        <div class="programs">
            <xsl:choose>
                <xsl:when test="count(olympiad) = 0">
                    <h5>Пока что не создано ни одной олимпиады</h5>
                </xsl:when>
                <xsl:otherwise>
                    <table class="table">
                        <tr>
                            <th>Название</th>
                            <th>Период</th>
                            <th>Редактировать</th>
                        </tr>
                        <xsl:apply-templates select="olympiad" />
                    </table>
                </xsl:otherwise>
            </xsl:choose>

            <div class="right">
                <a href="{/root/wwwroot}/course/edit.php?category=3" class="btn btn-blue" data-id="0">Создать</a>
            </div>
        </div>
    </xsl:template>


    <xsl:template match="olympiad">
        <tr>
            <td><xsl:value-of select="fullname" /></td>

            <td>
                <xsl:if test="startdate_string != ''">
                    <xsl:text>с </xsl:text>
                    <xsl:value-of select="startdate_string" />
                </xsl:if>

                <xsl:if test="enddate_string != ''">
                    <xsl:text> по </xsl:text>
                    <xsl:value-of select="enddate_string" />
                </xsl:if>
            </td>

            <td class="center">
                <a href="{/root/wwwroot}/course/edit.php?id={id}&amp;terurnto=my" class="action edit"></a>
            </td>
        </tr>
    </xsl:template>

</xsl:stylesheet>