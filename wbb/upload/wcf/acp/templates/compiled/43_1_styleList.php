<?php
/**
* WoltLab Community Framework
* Template: styleList
* Compiled at: Wed, 28 May 2014 19:44:18 +0000
* 
* DO NOT EDIT THIS FILE
*/
$this->v['tpl']['template'] = 'styleList';
?>
<?php
if (!isset($this->pluginObjects['TemplatePluginFunctionPages'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginFunctionPages.class.php');
$this->pluginObjects['TemplatePluginFunctionPages'] = new TemplatePluginFunctionPages;
}
if (!isset($this->pluginObjects['TemplatePluginModifierConcat'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginModifierConcat.class.php');
$this->pluginObjects['TemplatePluginModifierConcat'] = new TemplatePluginModifierConcat;
}
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
$outerTemplateName5bf29ed543d23b7e78fdc92c50171cc3f53978cf = $this->v['tpl']['template'];
$this->includeTemplate('header', array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName5bf29ed543d23b7e78fdc92c50171cc3f53978cf;
$this->v['tpl']['includedTemplates']['header'] = 1;
?>

<div class="mainHeadline">
	<img src="<?php echo RELATIVE_WCF_DIR; ?>icon/styleL.png" alt="" />
	<div class="headlineContainer">
		<h2>Stile</h2>
	</div>
</div>

<div class="contentHeader">
	<?php echo $this->pluginObjects['TemplatePluginFunctionPages']->execute(array('print' => true, 'assign' => 'pagesLinks', 'link' => $this->pluginObjects['TemplatePluginModifierConcat']->execute(array("index.php?page=StyleList&pageNo=%d&packageID=",PACKAGE_ID,SID_ARG_2ND_NOT_ENCODED), $this)), $this); ?>
	<?php if ($this->v['this']->user->getPermission('admin.style.canAddStyle')) { ?>
		<div class="largeButtons">
			<ul>
				<li><a href="index.php?form=StyleImport&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" title="Stil importieren"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/styleImportM.png" alt="" /> <span>Stil importieren</span></a></li>
				<li><a href="index.php?form=StyleWriteFiles&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" title="Stile aktualisieren"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/styleRefreshM.png" alt="" /> <span>Stile aktualisieren</span></a></li>
			</ul>
		</div>
	<?php } ?>
</div>

<?php
if (count($this->v['styles']) > 0) {
foreach ($this->v['styles'] as $this->v['style']) {
?>
	<div class="message content styleList">
		<div class="messageInner container-<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array('name' => 'styles', 'values' => '1,2'), $this); ?>">
			
			<h3 class="subHeadline">
				<?php if ($this->v['this']->user->getPermission('admin.style.canEditStyle')) { ?>
					<?php if ($this->v['style']['disabled']) { ?>
						<a href="index.php?action=StyleEnable&amp;styleID=<?php echo $this->v['style']['styleID']; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/disabledS.png" alt="" title="Stil aktivieren" /></a>
					<?php } elseif ( ! $this->v['style']['isDefault']) { ?>
						<a href="index.php?action=StyleDisable&amp;styleID=<?php echo $this->v['style']['styleID']; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/enabledS.png" alt="" title="Stil deaktivieren" /></a>
					<?php } else { ?>
						<img src="<?php echo RELATIVE_WCF_DIR; ?>icon/defaultS.png" alt="" />
					<?php } ?>
				<?php } else { ?>
					<?php if ($this->v['style']['disabled']) { ?>
						<img src="<?php echo RELATIVE_WCF_DIR; ?>icon/disabledDisabledS.png" alt="" title="Stil aktivieren" />
					<?php } elseif ( ! $this->v['style']['isDefault']) { ?>
						<img src="<?php echo RELATIVE_WCF_DIR; ?>icon/enabledDisabledS.png" alt="" title="Stil deaktivieren" />
					<?php } else { ?>
						<img src="<?php echo RELATIVE_WCF_DIR; ?>icon/defaultDisabledS.png" alt="" />
					<?php } ?>
				<?php } ?>
				<a href="index.php?form=StyleEdit&amp;styleID=<?php echo $this->v['style']['styleID']; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>"><?php echo StringUtil::encodeHTML($this->v['style']['styleName']); ?></a>
			</h3>

			<div class="messageBody">
				<a href="index.php?form=StyleEdit&amp;styleID=<?php echo $this->v['style']['styleID']; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" class="styleImage"><img src="<?php echo RELATIVE_WCF_DIR; ?><?php if ($this->v['style']['image']) { ?><?php echo $this->v['style']['image']; ?><?php } else { ?>images/styleNoPreview.jpg<?php } ?>" alt="" /></a>
			
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
				<?php if ($this->v['style']['styleVersion'] != '') { ?>
					<div class="formElement">
						<div class="formFieldLabel">
							<label>Version</label>
						</div>
						<div class="formField">
							<span><?php echo StringUtil::encodeHTML($this->v['style']['styleVersion']); ?></span>
						</div>
					</div>
				<?php } ?>
				<?php if ($this->v['style']['styleDate'] != '0000-00-00') { ?>
					<div class="formElement">
						<div class="formFieldLabel">
							<label>Datum</label>
						</div>
						<div class="formField">
							<span><?php echo StringUtil::encodeHTML($this->v['style']['styleDate']); ?></span>
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
				<div class="formElement">
					<div class="formFieldLabel">
						<label>Benutzer</label>
					</div>
					<div class="formField">
						<?php echo $this->v['style']['users']; ?>
					</div>
				</div>
				<?php if ($this->v['style']['styleDescription'] != '') { ?>
					<div class="formElement">
						<div class="formFieldLabel">
							<label>Beschreibung</label>
						</div>
						<div class="formField">
							<span><?php echo StringUtil::encodeHTML($this->v['style']['styleDescription']); ?></span>
						</div>
					</div>
				<?php } ?>
			</div>
			
			<div class="messageFooter">
				<div class="smallButtons">
					<ul>
						<li class="extraButton"><a href="#top" title="Zum Seitenanfang"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/upS.png" alt="Zum Seitenanfang" /></a></li>
						<?php if (isset($this->v['style']['additionalButtons'])) { ?><?php echo $this->v['style']['additionalButtons']; ?><?php } ?>
						<?php if ( ! $this->v['style']['isDefault'] && $this->v['this']->user->getPermission('admin.style.canEditStyle')) { ?>
							<li class="extraButton"><a href="index.php?action=StyleSetAsDefault&amp;styleID=<?php echo $this->v['style']['styleID']; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/defaultS.png" alt="" title="" /> <span>Zum Standard machen</span></a></li>
						<?php } ?>
						<?php if ($this->v['this']->user->getPermission('admin.style.canExportStyle')) { ?>
							<li><a href="index.php?form=StyleExport&amp;styleID=<?php echo $this->v['style']['styleID']; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" title="Exportieren"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/exportS.png" alt="" /> <span>Exportieren</span></a></li>
						<?php } ?>
						<?php if ( ! $this->v['style']['isDefault'] && $this->v['this']->user->getPermission('admin.style.canDeleteStyle')) { ?>
							<li><a onclick="return confirm('Wollen Sie diesen Stil wirklich löschen?')" href="index.php?action=StyleDelete&amp;styleID=<?php echo $this->v['style']['styleID']; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" title="Löschen"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/deleteS.png" alt="" /> <span>Löschen</span></a></li>
						<?php } ?>
						<?php if ($this->v['this']->user->getPermission('admin.style.canEditStyle')) { ?>
							<li><a href="index.php?form=StyleCopy&amp;styleID=<?php echo $this->v['style']['styleID']; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" title="Kopieren"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/copyS.png" alt="" /> <span>Kopieren</span></a></li>
							<li><a href="index.php?form=StyleEdit&amp;styleID=<?php echo $this->v['style']['styleID']; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" title="Bearbeiten"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/editS.png" alt="" /> <span>Bearbeiten</span></a></li>
						<?php } ?>
					</ul>
				</div>
			</div>
			<hr />
		</div>
	</div>
<?php } } ?>

<div class="contentFooter">
	<?php echo $this->v['pagesLinks']; ?>
	<?php if ($this->v['this']->user->getPermission('admin.style.canAddStyle')) { ?>
		<div class="largeButtons">
			<ul>
				<li><a href="index.php?form=StyleImport&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" title="Stil importieren"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/styleImportM.png" alt="" /> <span>Stil importieren</span></a></li>
				<li><a href="index.php?form=StyleWriteFiles&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" title="Stile aktualisieren"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/styleRefreshM.png" alt="" /> <span>Stile aktualisieren</span></a></li>
			</ul>
		</div>
	<?php } ?>
</div>

<?php
$outerTemplateName99a3f7b4bec5ccda0c1b97ec033ab36dd3bac72c = $this->v['tpl']['template'];
$this->includeTemplate('footer', array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName99a3f7b4bec5ccda0c1b97ec033ab36dd3bac72c;
$this->v['tpl']['includedTemplates']['footer'] = 1;
?>