<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet 
	 version="1.0" 
	 xmlns:xsl="http://www.w3.org/1999/XSL/Transform"         
	 xmlns:atom="http://www.w3.org/2005/Atom" 
	 xmlns:media="http://search.yahoo.com/mrss/"     
	 xmlns:openSearch="http://a9.com/-/spec/opensearch/1.1/"     
	 xmlns:gd="http://schemas.google.com/g/2005"     
	 xmlns:yt="http://gdata.youtube.com/schemas/2007"     
	 gd:etag="W/&quot;Ak8EQX47eCp7I2A9WhdSEkQ.&quot;">

    <xsl:template match="/atom:feed">
        <xsl:for-each select="atom:entry">
        	<div class="XslHeadline" style="border: 1px solid">
               <xsl:value-of select="atom:title"/>
            </div>
            
            <div class="XslDate">
            	<xsl:value-of select="atom:published" />
            </div>

            <div class="XslLink">
            	<xsl:value-of select="atom:id" />
            </div>
        </xsl:for-each>
   	</xsl:template>
</xsl:stylesheet>

