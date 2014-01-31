<?php
namespace Ameblo\Builder;
class Rawdata implements RawdataInterface{
    public function getRaw($title, $text){
        return sprintf('<?xml version="1.0" encoding="utf-8"?>
<entry xmlns="http://purl.org/atom/ns#"
xmlns:app="http://www.w3.org/2007/app#"
xmlns:mt="http://www.movabletype.org/atom/ns#">
<title>%s</title>
<content type="application/xhtml+xml">
<![CDATA[%s]]>
</content>
</entry>
', $title, $text);
    }
}