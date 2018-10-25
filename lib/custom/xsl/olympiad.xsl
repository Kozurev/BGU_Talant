<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="root">

        <div class="olympiad">
            <div class="row">
                <div class="col-md-4 col-sm-12">
                    <img width="100%">
                        <xsl:attribute name="src">
                            <xsl:choose>
                                <xsl:when test="olympiad/logo = 0">
                                    <xsl:value-of select="wwwroot" />/theme/klass/pix/boxes/default.png
                                </xsl:when>
                                <xsl:otherwise>
                                    <xsl:value-of select="wwwroot" />/draftfile.php/5/user/draft/<xsl:value-of select="olympiad/logo" />/<xsl:value-of select="logo/filename" />
                                </xsl:otherwise>
                            </xsl:choose>
                        </xsl:attribute>
                    </img>
                </div>

                <div class="col-md-8 col-sm-12">
                    <h2><xsl:value-of select="olympiad/fullname" /></h2>
                    <xsl:value-of select="olympiad/summary" />
                </div>
            </div>
        </div>

    </xsl:template>
</xsl:stylesheet>