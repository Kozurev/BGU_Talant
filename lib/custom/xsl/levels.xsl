<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">


    <xsl:template match="root">
        <section class="block card mb-3">
            <div class="card-body">
                <h5 class="card-title d-inline">Выберите уровень:</h5>
                <!--«»-->
                <!--<div class="card-text content mt-3">-->
                    <!--<ul >-->
                        <!--<xsl:apply-templates select="level" />-->
                    <!--</ul>-->
                <!--</div>-->

                <div id='table_content' align='center'>
                    <div class='s-menu'>
                        <xsl:apply-templates select="level" />
                    </div>
                </div>
            </div>
        </section>
    </xsl:template>


    <!--<xsl:template match="level">-->
        <!--<li>-->
            <!--<a href="{//href}?lvlid={id}">-->
                <!--<xsl:value-of select="title" />-->
            <!--</a>-->
        <!--</li>-->
    <!--</xsl:template>-->


    <xsl:template match="level">
        <xsl:variable name="src">
            <xsl:choose>
                <xsl:when test="logo_id != 0">
                    <xsl:value-of select="//wwwroot" />/blocks/docs/files.php?fileid=<xsl:value-of select="logo_id" />
                </xsl:when>
                <xsl:otherwise>
                    <xsl:value-of select="//wwwroot" />/theme/klass/pix/boxes/default.png
                </xsl:otherwise>
            </xsl:choose>
        </xsl:variable>

        <div class='box'>
            <a href="{//href}?lvlid={id}">
                <img width='260' height='260' src="{$src}" />
                <b><xsl:value-of select="title" /></b>
                <!--<xsl:value-of select="title" />-->
            </a>
        </div>
    </xsl:template>


</xsl:stylesheet>