<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="root">

        <style>
            .course_assignments .form-control {
            width: 80% !important;
            display: inline-block;
            }
        </style>

        <form action="/blocks/programs/edit.php" method="POST" class="level_edit" accept-charset="utf-8" enctype="multipart/form-data">
            <xsl:choose>
                <xsl:when test="level/id != ''">
                    <h5>Редактирование уровня</h5>
                </xsl:when>
                <xsl:otherwise>
                    <h5>Создание уровня</h5>
                </xsl:otherwise>
            </xsl:choose>
            <hr/>

            <div class="row">
                <div class="col-md-3 col-sm-12 right">
                    <label for="title">Название</label>
                </div>
                <div class="col-md-4 col-sm-12 col-md-offset-1 col-sm-offset-0 left">
                    <input type="text" name="title" id="title" class="form-control" required="required" value="{level/title}" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-12 right">
                    <label for="form_id">Принадлежность к:</label>
                </div>
                <div class="col-md-4 col-md-offset-1 col-sm-offset-0 col-sm-12 left">
                    <select class="form-control" name="entity_id" id="entity_id">
                        <xsl:variable name="entityid" select="level/entity_id" />

                        <xsl:for-each select="//entity">
                            <xsl:variable name="id" select="id" />
                            <option value="{id}">
                                <xsl:if test="id = $entityid">
                                    <xsl:attribute name="selected">selected</xsl:attribute>
                                </xsl:if>
                                <xsl:value-of select="title" />
                            </option>
                        </xsl:for-each>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-12 right">
                    <label for="logo">Логотип</label>
                </div>
                <div class="col-md-4 col-md-offset-1 col-sm-offset-0 col-sm-12 left">
                    <input name="logo" id="logo" type="file" />
                </div>
            </div>


            <input type="hidden" name="id" value="{level/id}" />
            <input type="hidden" name="action" value="level_save" />

            <div class="row right">
                <a href="#" class="btn btn-green level_submit">Сохранить</a>
                <!--<input class="btn btn-green" type="submit" value="Сохранить" />-->
                <a href="#" class="btn btn-orange level_cancel">Отменить</a>
            </div>
        </form>
    </xsl:template>

</xsl:stylesheet>