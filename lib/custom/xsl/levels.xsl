<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">


    <xsl:template match="root">
        <section class="block card mb-3">
            <div class="card-body">
                <h5 class="card-title d-inline">Выберите уровень:</h5>
                <!--«»-->
                <div class="card-text content mt-3">
                    <ul >
                        <xsl:apply-templates select="level" />
                    </ul>
                </div>
            </div>
        </section>
    </xsl:template>


    <xsl:template match="level">
        <li>
            <a href="{//href}?lvlid={id}">
                <xsl:value-of select="title" />
            </a>
        </li>
    </xsl:template>


</xsl:stylesheet>