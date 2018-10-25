<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="root">
        <div id="table_content" align="center">
            <div class="s-menu">
                <xsl:apply-templates select="olympiad" />
            </div>
        </div>
    </xsl:template>


    <xsl:template match="olympiad">
        <div class="box">
            <a href="{//wwwroot}/blocks/olympiads?olid={id}">
                <img width="260" height="260" >
                    <xsl:choose>
                        <xsl:when test="itemid = 0">
                            <xsl:attribute name="src"><xsl:value-of select="//wwwroot" />/theme/klass/pix/boxes/default.png</xsl:attribute>
                        </xsl:when>
                        <xsl:otherwise>
                            <xsl:attribute name="src"><xsl:value-of select="//wwwroot" />/draftfile.php/5/user/draft/<xsl:value-of select="itemid" />/<xsl:value-of select="logo" /></xsl:attribute>
                        </xsl:otherwise>
                    </xsl:choose>
                </img>
                <b><xsl:value-of select="shortname" /></b>
            </a>
        </div>
    </xsl:template>

</xsl:stylesheet>