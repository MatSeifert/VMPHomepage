<?php
/**
* WoltLab Community Framework
* Template: optionTypeMessage
* Compiled at: Sun, 08 Jun 2014 21:37:10 +0000
* 
* DO NOT EDIT THIS FILE
*/
$this->v['tpl']['template'] = 'optionTypeMessage';
?>
<?php
if (!isset($this->v['tpl']['includedTemplates']['wysiwyg'])) {
$outerTemplateNamea81746c634b9aeb5bd8ba32d7b508e76bf509758 = $this->v['tpl']['template'];
$this->includeTemplate('wysiwyg', array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateNamea81746c634b9aeb5bd8ba32d7b508e76bf509758;
$this->v['tpl']['includedTemplates']['wysiwyg'] = 1;
}
?>
<textarea id="<?php echo StringUtil::encodeHTML($this->v['optionData']['optionName']); ?>" cols="40" rows="10" name="values[<?php echo StringUtil::encodeHTML($this->v['optionData']['optionName']); ?>]"><?php echo StringUtil::encodeHTML($this->v['optionData']['optionValue']); ?></textarea>
<script type="text/javascript">
//<![CDATA[
// language
tinyMCE.elements.push('<?php echo StringUtil::encodeHTML($this->v['optionData']['optionName']); ?>');
//]]>
</script>