<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="root">
        <div class="olympiads">
            <table class="table">
                <tr>
                    <th>Название</th>
                    <th>Даты проведения</th>
                    <th></th>
                </tr>

                <xsl:apply-templates select="app" />
            </table>
        </div>
    </xsl:template>


    <xsl:template match="app">
        <tr>
            <td><xsl:value-of select="fullname" /></td>

            <td>
                <span>С </span><xsl:value-of select="startdate_string" />
                <span> по </span><xsl:value-of select="enddate_string" />
            </td>

            <td>
                <a class="action edit" href="{//wwwroot}/blocks/olympiads/app_form.php?olid={olympiad_id}" title="Редактировать данные заявки"></a>
            </td>
        </tr>
    </xsl:template>

</xsl:stylesheet>