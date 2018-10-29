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

        <!--<input type="hidden" id="wwwroot" value="{wwwroot}" />-->

        <div class="programs">
            <xsl:choose>
                <xsl:when test="count(program) = 0">
                    <h5>Пока что нет ни одной программы</h5>
                </xsl:when>
                <xsl:otherwise>
                    <table class="table">
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Код</th>
                            <th>Тип</th>
                            <th>Форма проведения</th>
                            <th>Цена</th>
                            <th>Действия</th>
                        </tr>
                        <xsl:apply-templates select="program" />
                    </table>
                </xsl:otherwise>
            </xsl:choose>

            <div class="right">
                <a href="#" class="btn btn-blue edit_program" data-id="0">Создать</a>
            </div>
        </div>
    </xsl:template>


    <xsl:template match="program">
        <xsl:variable name="typeid" select="type_id" />
        <xsl:variable name="formid" select="form_id" />

        <tr>
            <td><xsl:value-of select="id" /></td>
            <td><xsl:value-of select="title" /></td>
            <td><xsl:value-of select="code" /></td>
            <td><xsl:value-of select="//program_type[id = $typeid]/short_name" /></td>
            <td><xsl:value-of select="//program_form[id = $formid]/title" /></td>
            <td><xsl:value-of select="price" /></td>
            <td>
                <a href="#" class="action edit edit_program" data-id="{id}"></a>
                <a href="#" class="action delete" data-id="{id}" data-model_name="Program"></a>
            </td>
        </tr>
    </xsl:template>


</xsl:stylesheet>