<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="root">
        <xsl:if test="count(file) != 0">
            <h5>Согласия на обработку персональных данных, ожидающих проверки</h5>

            <table class="table">
                <tr>
                    <th>ФИО</th><th>Ссылка на файл</th><th>Действие</th>
                </tr>
                <xsl:apply-templates select="file" />
            </table>
        </xsl:if>
    </xsl:template>


    <xsl:template match="file">
        <tr>
            <td>
                <xsl:value-of select="lastname" />
                <xsl:text> </xsl:text>
                <xsl:value-of select="firstname" />
            </td>

            <td>
                <a href="/blocks/docs/files.php?fileid={id}"><xsl:value-of select="file_name" /></a>
            </td>

            <td>
                <a href="/blocks/docs/files.php?action=confirm&amp;fileid={id}&amp;val=1" class="btn btn-green doc_confirm">Подтвердить</a>
                <a href="/blocks/docs/files.php?action=confirm&amp;fileid={id}&amp;val=-1" class="btn btn-red doc_confirm">Отклонить</a>
            </td>
        </tr>
    </xsl:template>


</xsl:stylesheet>