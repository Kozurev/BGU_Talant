<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="root">

        <style>
            .course_assignments .form-control {
                width: 80% !important;
                display: inline-block;
            }
        </style>

        <form action="/blocks/programs/edit.php" method="POST" class="program_edit" accept-charset="utf-8" enctype="multipart/form-data">
            <xsl:choose>
                <xsl:when test="program/id != ''">
                    <h5>Редактирование программы</h5>
                </xsl:when>
                <xsl:otherwise>
                    <h5>Создание программы</h5>
                </xsl:otherwise>
            </xsl:choose>
            <hr/>

            <div class="row">
                <div class="col-md-3 col-sm-12 right">
                    <label for="title">Название</label>
                </div>
                <div class="col-md-4 col-sm-12 col-md-offset-1 col-sm-offset-0 left">
                    <input name="title" id="title" class="form-control" value="{program/title}" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-12 right">
                    <label for="description">Описание</label>
                </div>
                <div class="col-md-4 col-sm-12 col-md-offset-1 col-sm-offset-0 left">
                    <textarea class="form-control" name="description" id="description">
                        <xsl:value-of select="program/description" />
                    </textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-12 right">
                    <label for="hours">Кол-во часов</label>
                </div>
                <div class="col-md-4 col-md-offset-1 col-sm-offset-0 col-sm-12 left">
                    <input type="number" name="hours" id="hours" class="form-control" value="{program/hours}" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-12 right">
                    <label for="code">Код</label>
                </div>
                <div class="col-md-4 col-md-offset-1 col-sm-offset-0 col-sm-12 left">
                    <input name="code" id="code" class="form-control" value="{program/code}" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-12 right">
                    <label for="document_type">Тип выдаваемого документа</label>
                </div>
                <div class="col-md-4 col-md-offset-1 col-sm-offset-0 col-sm-12 left">
                    <input name="document_type" id="document_type" class="form-control" value="{program/document_type}" />
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-12 right">
                    <label for="form_id">Форма проведения</label>
                </div>
                <div class="col-md-4 col-md-offset-1 col-sm-offset-0 col-sm-12 left">
                    <select class="form-control" name="form_id" id="form_id">
                        <option value="0"> ... </option>
                        <xsl:variable name="formid" select="program/form_id" />

                        <xsl:for-each select="//program_form">
                            <xsl:variable name="id" select="id" />
                            <option value="{id}">
                                <xsl:if test="id = $formid">
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
                    <label for="type_id">Тип</label>
                </div>
                <div class="col-md-4 col-md-offset-1 col-sm-offset-0 col-sm-12 left">
                    <select class="form-control" name="type_id" id="type_id">
                        <option value="0"> ... </option>
                        <xsl:variable name="typeid" select="program/type_id" />

                        <xsl:for-each select="//program_type">
                            <xsl:variable name="id" select="id" />
                            <option value="{id}">
                                <xsl:if test="id = $typeid">
                                    <xsl:attribute name="selected">selected</xsl:attribute>
                                </xsl:if>
                                <xsl:value-of select="short_name" />
                            </option>
                        </xsl:for-each>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3 col-sm-12 right">
                    <label for="level_id">Уровень</label>
                </div>
                <div class="col-md-4 col-md-offset-1 col-sm-offset-0 col-sm-12 left">
                    <select class="form-control" name="level_id" id="level_id">
                        <xsl:variable name="levelid" select="program/level_id" />

                        <option value="0"> ... </option>

                        <xsl:for-each select="//level">
                            <xsl:variable name="id" select="id" />
                            <option value="{id}">
                                <xsl:if test="id = $levelid">
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
                    <label for="price">Цена</label>
                </div>
                <div class="col-md-4 col-md-offset-1 col-sm-offset-0 col-sm-12 left">
                    <input name="price" id="price" class="form-control" value="{program/price}" />
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

            <br/><h5>Список курсов программы <a href="#" class="btn btn-green clone_program_assignment">+</a></h5><hr/>
            <div class="course_assignment">
                <xsl:choose>
                    <xsl:when test="count(program_course_assignment) = 0">
                        <div class="row">
                            <div class="col-md-2">
                                <select class="form-control" name="course[]">
                                    <option value="0"> ... </option>
                                    <xsl:for-each select="course">
                                        <option value="{id}"><xsl:value-of select="shortname" /></option>
                                    </xsl:for-each>
                                </select>
                            </div>
                            <div class="col-md-2">
                                <a class="btn btn-red">Удалить</a>
                            </div>
                        </div>
                    </xsl:when>
                    <xsl:otherwise>
                        <xsl:for-each select="program_course_assignment">
                            <xsl:variable name="courseid" select="course_id" />
                            <div class="row">
                                <div class="col-md-2">
                                    <select class="form-control" name="course[]">
                                        <xsl:for-each select="//course">
                                            <option value="{id}">
                                                <xsl:if test="id = $courseid">
                                                    <xsl:attribute name="selected">true</xsl:attribute>
                                                </xsl:if>
                                                <xsl:value-of select="shortname" />
                                            </option>
                                        </xsl:for-each>
                                    </select>
                                </div>
                                <div class="col-md-1">
                                    <a class="btn btn-red remove_program_assignment">-</a>
                                </div>
                            </div>
                        </xsl:for-each>
                    </xsl:otherwise>
                </xsl:choose>
            </div>

            <br/><h5>Периоды проведения программы <a href="#" class="btn btn-green clone_period">+</a></h5><hr/>
            <div class="program_periods">
                <xsl:choose>
                    <xsl:when test="count(program_period) = 0">
                        <div class="row">
                            <input type="hidden" name="period_id[]" value="" data-iutbg="etge" />
                            <div class="col-md-2">
                                <span>Дата начала</span><br/>
                                <input type="date" class="form-control" name="date_start[]"/>
                            </div>
                            <div class="col-md-2">
                                <span>Дата окончания</span><br/>
                                <input type="date" class="form-control" name="date_end[]"/>
                            </div>
                            <div class="col-md-2">
                                <span>Начало видимости</span><br/>
                                <input type="date" class="form-control" name="visible_start[]"/>
                            </div>
                            <div class="col-md-2">
                                <span>Окон-ие видимости</span><br/>
                                <input type="date" class="form-control" name="visible_end[]"/>
                            </div>
                            <div class="col-md-1">
                                <br/><a class="btn btn-red remove_program_assignment">-</a>
                            </div>
                        </div>
                    </xsl:when>
                    <xsl:otherwise>
                        <xsl:for-each select="program_period">
                            <div class="row">
                                <input type="hidden" name="period_id[]" value="{id}" />
                                <div class="col-md-2">
                                    <span>Дата начала</span><br/>
                                    <input type="date" class="form-control" value="{date_start}" name="date_start[]"/>
                                </div>
                                <div class="col-md-2">
                                    <span>Дата окончания</span><br/>
                                    <input type="date" class="form-control" value="{date_end}" name="date_end[]"/>
                                </div>
                                <div class="col-md-2">
                                    <span>Начало видимости</span><br/>
                                    <input type="date" class="form-control" value="{visible_start}" name="visible_start[]"/>
                                </div>
                                <div class="col-md-2">
                                    <span>Окон-ие видимости</span><br/>
                                    <input type="date" class="form-control" value="{visible_end}" name="visible_end[]"/>
                                </div>
                                <div class="col-md-1">
                                    <br/><a class="btn btn-red remove_program_assignment">-</a>
                                </div>
                            </div>
                        </xsl:for-each>
                    </xsl:otherwise>
                </xsl:choose>
            </div>

            <input type="hidden" name="id" value="{program/id}" />
            <input type="hidden" name="action" value="program_save" />

            <div class="row right">
                <a href="#" class="btn btn-green program_submit">Сохранить</a>
                <!--<input class="btn btn-green" type="submit" value="Сохранить" />-->
                <a href="#" class="btn btn-orange cancel">Отменить</a>
            </div>
        </form>
    </xsl:template>

</xsl:stylesheet>