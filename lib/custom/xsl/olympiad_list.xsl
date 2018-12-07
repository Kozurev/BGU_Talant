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
            <xsl:value-of select="src" />
            <a href="{//wwwroot}/blocks/olympiads?olid={id}">
                <img width="260" height="260" src="{src}" />
                <b><xsl:value-of select="shortname" /></b>
            </a>
        </div>
    </xsl:template>

</xsl:stylesheet>