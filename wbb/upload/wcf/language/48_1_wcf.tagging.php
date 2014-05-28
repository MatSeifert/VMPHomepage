<?php
/**
* WoltLab Community Framework
* language: de
* encoding: UTF-8
* category: wcf.tagging
* generated at Wed, 28 May 2014 19:04:12 +0000
* 
* DO NOT EDIT THIS FILE
*/
$this->items[$this->languageID]['wcf.tagging.filter'] = 'Filter nach Tag{if $tag|isset}: &raquo;{$tag}&laquo;{/if}';
$this->dynamicItems[$this->languageID]['wcf.tagging.filter'] = 'Filter nach Tag<?php if (isset($this->v[\'tag\'])) { ?>: &raquo;<?php echo StringUtil::encodeHTML($this->v[\'tag\']); ?>&laquo;<?php } ?>';
$this->items[$this->languageID]['wcf.tagging.tags'] = 'Tags';
$this->items[$this->languageID]['wcf.tagging.tags.add'] = 'Tags';
$this->items[$this->languageID]['wcf.tagging.tags.add.description'] = 'Mehrere Tags müssen durch ein Komma getrennt werden.';
$this->items[$this->languageID]['wcf.tagging.tags.used'] = 'Verwendete Tags';
$this->items[$this->languageID]['wcf.tagging.by'] = 'Von';
$this->items[$this->languageID]['wcf.tagging.mostPopular'] = 'Die beliebtesten Tags';
$this->items[$this->languageID]['wcf.tagging.overview'] = 'Übersicht';
$this->items[$this->languageID]['wcf.tagging.title'] = 'Ergebnisse für &raquo;{$tagObj->getName()}&laquo;';
$this->dynamicItems[$this->languageID]['wcf.tagging.title'] = 'Ergebnisse für &raquo;<?php echo StringUtil::encodeHTML($this->v[\'tagObj\']->getName()); ?>&laquo;';
$this->items[$this->languageID]['wcf.tagging.taggable.all.com.woltlab.wbb.thread'] = 'Alle Themen';
$this->items[$this->languageID]['wcf.tagging.taggable.com.woltlab.wbb.thread'] = 'Themen';
?>