<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

    <xsl:template match="root">
        <xsl:choose>
            <xsl:when test="count(test) = 0">
                <h3>Олимпиада <b><xsl:value-of select="olympiad/fullname" /></b> не содержит ни одного теста</h3>
            </xsl:when>
            <xsl:otherwise>
                <h3>Тесты олимпиады:</h3>

                <form name="olympiad_tests" method="GET" action="">
                    <ul>
                        <xsl:apply-templates select="test" />
                    </ul>

                    <input type="hidden" name="report_type" value="{report-type}" />
                    <input type="submit" value="Сформировать отчет" />
                </form>
            </xsl:otherwise>
        </xsl:choose>
    </xsl:template>


    <xsl:template match="test">
        <li>
            <input type="checkbox" name="testid[]" value="{id}" id="test_{position()}" />
            <label for="test_{position()}"><xsl:value-of select="itemname" /></label>
        </li>
    </xsl:template>

</xsl:stylesheet>