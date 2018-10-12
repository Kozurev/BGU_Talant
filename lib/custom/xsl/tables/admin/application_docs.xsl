<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">


    <xsl:template match="root">
        <xsl:if test="count(row) != 0">
            <h5>Документы для записи на программы</h5>
            <table class="table app_docs">
                <tr>
                    <th>ФИО</th>
                    <th>Программа</th>
                    <th>Период</th>
                    <th>Документы</th>
                    <th>Действия</th>
                </tr>
                <xsl:apply-templates select="row" />
            </table>
        </xsl:if>
    </xsl:template>


    <xsl:template match="row">
        <tr>
            <td>
                <xsl:value-of select="item/lastname" />
                <xsl:text> </xsl:text>
                <xsl:value-of select="item/firstname" />
            </td>

            <td>
                <a href="{//wwwroot}/blocks/programs?prid={item/program_id}"><xsl:value-of select="item/title" /></a>
            </td>

            <td>
                <xsl:value-of select="item/date_start" />
                <xsl:text> - </xsl:text>
                <xsl:value-of select="item/date_end" />
            </td>

            <td>
                <xsl:for-each select="file">
                    <a href="{//wwwroot}/blocks/docs/files.php?fileid={id}"><xsl:value-of select="file_name" /> (<xsl:value-of select="title" />)</a><br/>
                </xsl:for-each>
            </td>

            <xsl:variable name="href"><xsl:for-each select="file">&amp;fileid[]=<xsl:value-of select="id" /></xsl:for-each></xsl:variable>

            <td>
                <a class="btn btn-green doc_confirm" href="{//wwwroot}/blocks/docs/files.php?action=confirm{$href}&amp;val=1&amp;subscribe=1">Подтвердить</a>
                <a class="btn btn-red doc_confirm" href="{//wwwroot}/blocks/docs/files.php?action=confirm{$href}&amp;val=-1">Отклонить</a>
            </td>

        </tr>
    </xsl:template>


</xsl:stylesheet>