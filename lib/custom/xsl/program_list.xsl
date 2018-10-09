<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="root">
        <div id="table_content" align="center">
            <div class="s-menu">
                <xsl:apply-templates select="program" />
            </div>
        </div>
    </xsl:template>


    <xsl:template match="program">
        <div class="box">
            <a href="/blocks/programs?prid={id}">
                <img width="260" height="260" >
                    <xsl:choose>
                        <xsl:when test="logo_id = 0">
                            <xsl:attribute name="src">/theme/klass/pix/boxes/default.png</xsl:attribute>
                        </xsl:when>
                        <xsl:otherwise>
                            <xsl:attribute name="src">/blocks/docs/files.php?fileid=<xsl:value-of select="logo_id" /></xsl:attribute>
                        </xsl:otherwise>
                    </xsl:choose>
                </img>
                <b><xsl:value-of select="title" /></b>
            </a>
        </div>
    </xsl:template>


</xsl:stylesheet>