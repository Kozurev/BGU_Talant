<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="root">
        <form action="/blocks/docs/files.php" enctype="multipart/form-data" method="POST" >
            <input type="hidden" name="file_id" value="{file_id}" />
            <input type="hidden" name="action" value="upload" />
            <input type="hidden" name="file_type_id" value="1" />

            <label for="file">Соглашение на обработку персональных данных:</label><br/>
            <input type="file" name="file" id="file" required="required" />

            <input type="submit" class="btn btn-blue" value="Загрузить" />
            <a href="/blocks/docs/get_template.php?template_type=agreement" class="btn btn-orange">Скачать шаблон</a>
        </form>
    </xsl:template>

</xsl:stylesheet>