<?php
/**
* WoltLab Community Framework
* Template: styleImportPreview
* Compiled at: Wed, 28 May 2014 19:44:37 +0000
* 
* DO NOT EDIT THIS FILE
*/
$this->v['tpl']['template'] = 'styleImportPreview';
?>
<?php
if (!isset($this->pluginObjects['TemplatePluginFunctionCycle'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginFunctionCycle.class.php');
$this->pluginObjects['TemplatePluginFunctionCycle'] = new TemplatePluginFunctionCycle;
}
?><?php ob_start(); ?>
<style type="text/css">
	@import url("<?php echo RELATIVE_WCF_DIR; ?>acp/style/extra/styleEditor<?php if (PAGE_DIRECTION == 'rtl') { ?>-rtl<?php } ?>.css");
</style>
<?php
$this->v['tpl']['capture']['default'] = ob_get_contents();
ob_end_clean();
$this->append('specialStyles', $this->v['tpl']['capture']['default']);
?><?php
$outerTemplateNamee40a6a55a8908d47e46e6f7a3171838df361b90c = $this->v['tpl']['template'];
$this->includeTemplate('header', array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateNamee40a6a55a8908d47e46e6f7a3171838df361b90c;
$this->v['tpl']['includedTemplates']['header'] = 1;
?>

<div class="mainHeadline">
	<img src="<?php echo RELATIVE_WCF_DIR; ?>icon/styleImportL.png" alt="" />
	<div class="headlineContainer">
		<h2>Stil importieren</h2>
	</div>
</div>

<div class="message content styleList">
	<div class="messageInner container-<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array('name' => 'styles', 'values' => '1,2'), $this); ?>">
		
		<h3 class="subHeadline">
			<?php echo StringUtil::encodeHTML($this->v['style']['name']); ?>
		</h3>
		
		<div class="messageBody">
			<span class="styleImage"><img src="<?php echo RELATIVE_WCF_DIR; ?><?php if ($this->v['style']['image']) { ?>tmp/<?php echo $this->v['style']['image']; ?><?php } else { ?>images/styleNoPreview.jpg<?php } ?>" alt="" /></span>
		
			<?php if ($this->v['style']['authorName'] != '') { ?>
				<div class="formElement">
					<div class="formFieldLabel">
						<label>Autor</label>
					</div>
					<div class="formField">
						<span><?php echo StringUtil::encodeHTML($this->v['style']['authorName']); ?></span>
					</div>
				</div>
			<?php } ?>
			<?php if ($this->v['style']['copyright'] != '') { ?>
				<div class="formElement">
					<div class="formFieldLabel">
						<label>Copyright</label>
					</div>
					<div class="formField">
						<span><?php echo StringUtil::encodeHTML($this->v['style']['copyright']); ?></span>
					</div>
				</div>
			<?php } ?>
			<?php if ($this->v['style']['version'] != '') { ?>
				<div class="formElement">
					<div class="formFieldLabel">
						<label>Version</label>
					</div>
					<div class="formField">
						<span><?php echo StringUtil::encodeHTML($this->v['style']['version']); ?></span>
					</div>
				</div>
			<?php } ?>
			<?php if ($this->v['style']['date'] != '0000-00-00') { ?>
				<div class="formElement">
					<div class="formFieldLabel">
						<label>Datum</label>
					</div>
					<div class="formField">
						<span><?php echo StringUtil::encodeHTML($this->v['style']['date']); ?></span>
					</div>
				</div>
			<?php } ?>
			<?php if ($this->v['style']['license'] != '') { ?>
				<div class="formElement">
					<div class="formFieldLabel">
						<label>Lizenz</label>
					</div>
					<div class="formField">
						<span><?php echo StringUtil::encodeHTML($this->v['style']['license']); ?></span>
					</div>
				</div>
			<?php } ?>
			<?php if ($this->v['style']['authorURL'] != '') { ?>
				<div class="formElement">
					<div class="formFieldLabel">
						<label>Website</label>
					</div>
					<div class="formField">
						<a href="<?php echo RELATIVE_WCF_DIR; ?>acp/dereferrer.php?url=<?php echo StringUtil::encodeHTML(rawurlencode($this->v['style']['authorURL'])); ?>" class="externalURL"><?php echo StringUtil::encodeHTML($this->v['style']['authorURL']); ?></a>
					</div>
				</div>
			<?php } ?>
			<?php if ($this->v['style']['description'] != '') { ?>
				<div class="formElement">
					<div class="formFieldLabel">
						<label>Beschreibung</label>
					</div>
					<div class="formField">
						<span><?php echo StringUtil::encodeHTML($this->v['style']['description']); ?></span>
					</div>
				</div>
			<?php } ?>
		</div>
		
		<hr />
	</div>
</div>
	
<form method="post" action="index.php?form=StyleImport">	
	<div class="formSubmit">
		<input type="button" accesskey="c" value="&laquo; Zurück" onclick="document.location.href=fixURL('index.php?form=StyleImport&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>')" />
		<input type="submit" accesskey="s" value="Weiter &raquo;" />
		
		<input type="hidden" name="filename" value="<?php echo StringUtil::encodeHTML($this->v['filename']); ?>" />
		<input type="hidden" name="packageID" value="<?php echo PACKAGE_ID; ?>" />
		<input type="hidden" name="destinationStyleID" value="<?php echo $this->v['destinationStyleID']; ?>" />
	 	<?php echo SID_INPUT_TAG; ?>
	</div>
</form>

<?php
$outerTemplateName7a4019b2e005ce62cd8e0f9919383a42488932fa = $this->v['tpl']['template'];
$this->includeTemplate('footer', array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName7a4019b2e005ce62cd8e0f9919383a42488932fa;
$this->v['tpl']['includedTemplates']['footer'] = 1;
?>