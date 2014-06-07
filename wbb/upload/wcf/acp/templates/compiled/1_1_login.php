<?php
/**
* WoltLab Community Framework
* Template: login
* Compiled at: Wed, 28 May 2014 19:41:22 +0000
* 
* DO NOT EDIT THIS FILE
*/
$this->v['tpl']['template'] = 'login';
?>
<?php
if (!isset($this->pluginObjects['TemplatePluginModifierEncodejs'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginModifierEncodejs.class.php');
$this->pluginObjects['TemplatePluginModifierEncodejs'] = new TemplatePluginModifierEncodejs;
}
?><?php ob_start(); ?>Anmeldung<?php
$this->v['tpl']['capture']['default'] = ob_get_contents();
ob_end_clean();
$this->assign('pageTitle', $this->v['tpl']['capture']['default']);
?>
<?php
$outerTemplateName4d19c6f403b6a9999770242776f99c4eb1cf807f = $this->v['tpl']['template'];
$this->includeTemplate('setupHeader', array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName4d19c6f403b6a9999770242776f99c4eb1cf807f;
$this->v['tpl']['includedTemplates']['setupHeader'] = 1;
?>

<script type="text/javascript">
	//<![CDATA[
	onloadEvents.push(function() { if (!'<?php echo StringUtil::encodeHTML($this->pluginObjects['TemplatePluginModifierEncodejs']->execute(array($this->v['username']), $this)); ?>' || '<?php echo StringUtil::encodeHTML($this->v['errorField']); ?>' == 'username') document.getElementById('username').focus(); else document.getElementById('password').focus(); });
	//]]>
</script>

<img class="icon" src="<?php echo RELATIVE_WCF_DIR; ?>icon/loginXL.png" alt="" />

<h1><b><?php echo $this->v['pageTitle']; ?></b></h1>

<hr />

<?php if ($this->v['errorField'] != '') { ?>
<p class="error">Ihre Angaben sind ungültig. Bitte überprüfen Sie die markierten Eingabefelder.</p>
<?php } ?>

<form method="post" action="index.php?form=Login">
	<fieldset>
		<legend>Zugangsdaten</legend>
		
		<div class="inner">
			<div<?php if ($this->v['errorField'] == 'username') { ?> class="errorField"<?php } ?>>
				<label for="username">Benutzername</label>
				<input type="text" class="inputText" id="username" name="username" value="<?php echo StringUtil::encodeHTML($this->v['username']); ?>" />
				<?php if ($this->v['errorField'] == 'username') { ?>
					<p>
						<img src="<?php echo RELATIVE_WCF_DIR; ?>icon/errorS.png" alt="" />
						<?php if ($this->v['errorType'] == 'empty') { ?>Bitte füllen Sie dieses Eingabefeld aus.<?php } ?>
						<?php if ($this->v['errorType'] == 'notFound') { ?>Der Benutzername &raquo;<?php echo StringUtil::encodeHTML($this->v['username']); ?>&laquo; konnte nicht gefunden werden.<?php } ?>
					</p>
				<?php } ?>
			</div>

			
			<div<?php if ($this->v['errorField'] == 'password') { ?> class="errorField"<?php } ?>>
				<label for="password">Kennwort</label>
				<input type="password" class="inputText" id="password" name="password" value="" />
				<?php if ($this->v['errorField'] == 'password') { ?>
					<p>
						<img src="<?php echo RELATIVE_WCF_DIR; ?>icon/errorS.png" alt="" />
						<?php if ($this->v['errorType'] == 'empty') { ?>Bitte füllen Sie dieses Eingabefeld aus.<?php } ?>
						<?php if ($this->v['errorType'] == 'false') { ?>Dieses Kennwort ist falsch.<?php } ?>
					</p>
				<?php } ?>
			</div>
			
			<?php if (isset($this->v['additionalFields'])) { ?><?php echo $this->v['additionalFields']; ?><?php } ?>
		</div>
	</fieldset>
	
	<div class="nextButton">
		<input type="submit" accesskey="s" value="Absenden" />
		<input type="hidden" name="packageID" value="<?php echo PACKAGE_ID; ?>" />
		<input type="hidden" name="url" value="<?php echo StringUtil::encodeHTML($this->v['url']); ?>" />
 		<?php echo SID_INPUT_TAG; ?>
	</div>
</form>

<?php
$outerTemplateName537d7272e9a86daaa13a0b832dcfa5bc7fe0e5ea = $this->v['tpl']['template'];
$this->includeTemplate('setupFooter', array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName537d7272e9a86daaa13a0b832dcfa5bc7fe0e5ea;
$this->v['tpl']['includedTemplates']['setupFooter'] = 1;
?>