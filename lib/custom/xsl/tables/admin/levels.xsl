<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="root">
        <style>
            .edit {
            background: url('<xsl:value-of select="wwwroot" />/theme/klass/pix/edit.png');
            background-size: cover !important;
            }

            .delete {
            background: url('<xsl:value-of select="wwwroot" />/theme/klass/pix/delete.ico');
            background-size: cover !important;
            }
        </style>

        <div class="levels">
            <h3>Список уровней</h3>
            <xsl:choose>
                <xsl:when test="count(level) = 0">
                    <h5>Пока что нет ни одного уровня</h5>
                </xsl:when>
                <xsl:otherwise>
                    <table class="table">
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Сущьность</th>
                            <th>Действия</th>
                        </tr>
                        <xsl:apply-templates select="level" />
                    </table>
                </xsl:otherwise>
            </xsl:choose>

            <div class="right">
                <a href="#" class="btn btn-blue edit_level" data-id="0">Создать</a>
            </div>
        </div>
    </xsl:template>

    <xsl:template match="level">
        <xsl:variable name="entityid" select="entity_id" />
        <tr>
            <td><xsl:value-of select="id" /></td>
            <td><xsl:value-of select="title" /></td>
            <td>
                <xsl:value-of select="//entity[id = $entityid]/title" />
            </td>
            <td>
                <a href="#" class="action edit edit_level" data-id="{id}"></a>
                <a href="#" class="action delete" data-id="{id}" data-model_name="Level"></a>
            </td>
        </tr>
    </xsl:template>

</xsl:stylesheet>