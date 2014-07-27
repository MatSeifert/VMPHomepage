<?php
/**
* WoltLab Community Framework
* Template: header
* Compiled at: Wed, 28 May 2014 19:04:09 +0000
* 
* DO NOT EDIT THIS FILE
*/
$this->v['tpl']['template'] = 'header';
?>
<?php
if (!isset($this->pluginObjects['TemplatePluginFunctionCounter'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginFunctionCounter.class.php');
$this->pluginObjects['TemplatePluginFunctionCounter'] = new TemplatePluginFunctionCounter;
}
if (!isset($this->pluginObjects['TemplatePluginModifierEncodejs'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginModifierEncodejs.class.php');
$this->pluginObjects['TemplatePluginModifierEncodejs'] = new TemplatePluginModifierEncodejs;
}
if (!isset($this->pluginObjects['TemplatePluginModifierFulldate'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginModifierFulldate.class.php');
$this->pluginObjects['TemplatePluginModifierFulldate'] = new TemplatePluginModifierFulldate;
}
?><?php if (stripos($this->v['this']->session->userAgent,'MSIE') === false) { ?><?php echo '<?'; ?>
xml version="1.0" encoding="<?php echo CHARSET; ?>"<?php echo '?>'; ?>

<?php } ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="<?php echo LANGUAGE_CODE; ?>">
	<head>
		<title><?php if (isset($this->v['pageTitle'])) { ?><?php echo $this->v['pageTitle']; ?><?php } else { ?>WoltLab&reg; Community Framework&trade;<?php } ?> - Administrationsoberfläche</title>
		<meta http-equiv="Content-Type" content="text/html; charset=<?php echo CHARSET; ?>" />
		<meta http-equiv="X-UA-Compatible" content="IE=8" />
		<script type="text/javascript">
			//<![CDATA[
			var SID_ARG_2ND	= '<?php echo SID_ARG_2ND_NOT_ENCODED; ?>';
			var RELATIVE_WCF_DIR = '<?php echo RELATIVE_WCF_DIR; ?>';
			var PACKAGE_ID = <?php echo PACKAGE_ID; ?>;
			//]]>
		</script>
		<script type="text/javascript" src="<?php echo RELATIVE_WCF_DIR; ?>js/3rdParty/protoaculous.1.8.2.min.js"></script>
		<script type="text/javascript" src="<?php echo RELATIVE_WCF_DIR; ?>js/default.js"></script>
		<script type="text/javascript" src="<?php echo RELATIVE_WCF_DIR; ?>js/StringUtil.class.js"></script>
		<script type="text/javascript" src="<?php echo RELATIVE_WCF_DIR; ?>js/AjaxRequest.class.js"></script>
		<script type="text/javascript" src="<?php echo RELATIVE_WCF_DIR; ?>js/PopupMenuList.class.js"></script>
		<script type="text/javascript" src="<?php echo RELATIVE_WCF_DIR; ?>acp/js/default.js"></script>
		<script type="text/javascript" src="<?php echo RELATIVE_WCF_DIR; ?>acp/js/ACPMenu.class.js"></script>
		
		<?php if (isset($this->v['specialStyles'])) { ?>
			<!-- special styles -->
			<?php echo $this->v['specialStyles']; ?>
		<?php } ?>
		
		<style type="text/css">
			@import url("<?php echo RELATIVE_WCF_DIR; ?>acp/style/style-<?php echo PAGE_DIRECTION; ?>.css");
		</style>
		
		<!-- opera styles -->
		<script type="text/javascript">
			//<![CDATA[
			if (Prototype.Browser.Opera) {
				document.write('<style type="text/css">.columnContainer { border: 0; }</style>');
			}
			//]]>
		</script>
		
		<!--[if lt IE 7]>
			<style type="text/css">
				@import url("<?php echo RELATIVE_WCF_DIR; ?>style/extra/ie6-fix<?php if (PAGE_DIRECTION == 'rtl') { ?>-rtl<?php } ?>.css");
				@import url("<?php echo RELATIVE_WCF_DIR; ?>acp/style/extra/ie6-fix<?php if (PAGE_DIRECTION == 'rtl') { ?>-rtl<?php } ?>.css");
			</style>
		<![endif]-->
		
		<!--[if IE 7]>
			<style type="text/css">
				@import url("<?php echo RELATIVE_WCF_DIR; ?>style/extra/ie7-fix<?php if (PAGE_DIRECTION == 'rtl') { ?>-rtl<?php } ?>.css");
				@import url("<?php echo RELATIVE_WCF_DIR; ?>acp/style/extra/ie7-fix<?php if (PAGE_DIRECTION == 'rtl') { ?>-rtl<?php } ?>.css");
			</style>
		<![endif]-->
		
		<!--[if IE 8]>
			<style type="text/css">
				@import url("<?php echo RELATIVE_WCF_DIR; ?>style/extra/ie8-fix<?php if (PAGE_DIRECTION == 'rtl') { ?>-rtl<?php } ?>.css");
			</style>
		<![endif]-->
		
		<script type="text/javascript">
			//<![CDATA[
			var menuItemData = new Array();
			<?php echo $this->pluginObjects['TemplatePluginFunctionCounter']->execute(array('start' => -1, 'print' => false), $this); ?>
			<?php
if (count($this->v['menu']->getMenuItems()) > 0) {
foreach ($this->v['menu']->getMenuItems() as $this->v['items']) {
?>
				<?php
if (count($this->v['items']) > 0) {
foreach ($this->v['items'] as $this->v['item']) {
?>
					<?php ob_start(); ?><?php $this->tagStack[] = array('lang', array()); ob_start(); ?><?php echo $this->v['item']['menuItem']; ?><?php $_langfe15f8779812b47bd03b5828d27b9e53a569fb81 = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_langfe15f8779812b47bd03b5828d27b9e53a569fb81, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?><?php
$this->v['tpl']['capture']['default'] = ob_get_contents();
ob_end_clean();
$this->assign('menuItemName', $this->v['tpl']['capture']['default']);
?>
					menuItemData[<?php echo $this->pluginObjects['TemplatePluginFunctionCounter']->execute(array(), $this); ?>] = ['<?php echo $this->pluginObjects['TemplatePluginModifierEncodejs']->execute(array($this->v['item']['parentMenuItem']), $this); ?>', '<?php echo $this->pluginObjects['TemplatePluginModifierEncodejs']->execute(array($this->v['item']['menuItem']), $this); ?>', '<?php echo $this->pluginObjects['TemplatePluginModifierEncodejs']->execute(array($this->v['menuItemName']), $this); ?>', '<?php echo $this->pluginObjects['TemplatePluginModifierEncodejs']->execute(array($this->v['item']['menuItemLink']), $this); ?>', '<?php echo $this->pluginObjects['TemplatePluginModifierEncodejs']->execute(array($this->v['item']['menuItemIcon']), $this); ?>'];
				<?php } } ?>
			<?php } } ?>
			
			var activeMenuItems = new Array();
			<?php echo $this->pluginObjects['TemplatePluginFunctionCounter']->execute(array('start' => -1, 'print' => false), $this); ?>
			<?php
if (count($this->v['menu']->getActiveMenuItems()) > 0) {
foreach ($this->v['menu']->getActiveMenuItems() as $this->v['menuItem']) {
?>
				activeMenuItems[<?php echo $this->pluginObjects['TemplatePluginFunctionCounter']->execute(array(), $this); ?>] = '<?php echo $this->pluginObjects['TemplatePluginModifierEncodejs']->execute(array($this->v['menuItem']), $this); ?>';
			<?php } } ?>
			
			// acp menu
			acpMenu.init(menuItemData, activeMenuItems);
			//]]>
		</script>
		
		
		<script type="text/javascript" src="<?php echo RELATIVE_WCF_DIR; ?>acp/js/InlineHelp.class.js"></script>
	</head>
<body<?php if (isset($this->v['templateName'])) { ?> id="tpl<?php echo StringUtil::encodeHTML(ucfirst($this->v['templateName'])); ?>"<?php } ?>>
<div id="headerContainer">
	<a id="top"></a>
	
	<div id="userPanel" class="userPanel">
		<p id="date">
			<img src="<?php echo RELATIVE_WCF_DIR; ?>icon/dateS.png" alt="" /> <span><?php echo $this->pluginObjects['TemplatePluginModifierFulldate']->execute(array(TIME_NOW), $this); ?> UTC<?php if ($this->v['timezone'] > 0) { ?>+<?php echo $this->v['timezone']; ?><?php } elseif ($this->v['timezone'] < 0) { ?><?php echo $this->v['timezone']; ?><?php } ?></span>
		</p>
		<div class="userPanelInner">
			<p id="userNote"> 
				<?php if ($this->v['this']->user->userID != 0) { ?>Angemeldet als <?php echo StringUtil::encodeHTML($this->v['this']->user->username); ?>.<?php } ?>
			</p>
			<div id="userMenu">
				<ul>
					<li><a href="index.php?action=Logout&amp;t=<?php echo SECURITY_TOKEN; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/logoutS.png" alt="" /> <span>Abmelden</span></a></li>
					<li><a id="sitemapButton" href="javascript:void(0);"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/sitemapS.png" alt="" /> <span>Sitemap</span></a></li>
					<li><a id="menuPopupHelp" href="javascript:void(0);"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/helpOptionsS.png" alt="" /> <span>Hilfe</span></a>
						<div class="hidden" id="menuPopupHelpMenu">
							<ul>
								<li id="helpLinkDisable"><a onclick="inlineHelp.disableHelp();" href="javascript:void(0);"><span>Hilfe deaktivieren</span></a></li>
								<li id="helpLinkComplete"><a onclick="inlineHelp.enableHelp();" href="javascript:void(0);"><span>Vollständige Hilfe</span></a></li>
								<li id="helpLinkInteractive"><a onclick="inlineHelp.enableInteractiveHelp();" href="javascript:void(0);"><span>Interaktive Hilfe</span></a></li>
							</ul>
						</div>
	
						<script type="text/javascript">
							//<![CDATA[
							popupMenuList.register('menuPopupHelp');
							onloadEvents.push(function() { inlineHelp.setStatus('<?php echo StringUtil::encodeHTML($this->v['this']->user->inlineHelpStatus); ?>'); });
							//]]>
						</script>
					</li>
					<?php if (count($this->v['quickAccessPackages']) > 1) { ?>
						<li><a id="packageQuickAccess"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/packageOptionsS.png" alt="" /> <span>Paket wechseln</span></a>
							<div class="hidden" id="packageQuickAccessMenu">
								<ul>
									<?php
if (count($this->v['quickAccessPackages']) > 0) {
foreach ($this->v['quickAccessPackages'] as $this->v['quickAccessPackage']) {
?>
										<li<?php if (PACKAGE_ID == $this->v['quickAccessPackage']['packageID']) { ?> class="active"<?php } ?>><a href="<?php echo RELATIVE_WCF_DIR; ?><?php echo StringUtil::encodeHTML($this->v['quickAccessPackage']['packageDir']); ?>acp/index.php<?php echo SID_ARG_1ST; ?>"><span><?php echo StringUtil::encodeHTML($this->v['quickAccessPackage']['packageName']); ?><?php if ($this->v['quickAccessPackage']['instanceNo'] > 1 && $this->v['quickAccessPackage']['instanceName'] == '') { ?> #<?php echo StringUtil::formatNumeric($this->v['quickAccessPackage']['instanceNo']); ?><?php } ?></span></a></li>
									<?php } } ?>
								</ul>
							</div>
	
							<script type="text/javascript">
								//<![CDATA[
								popupMenuList.register('packageQuickAccess');
								//]]>
							</script>
						</li>
					<?php } ?>
					<?php if (isset($this->v['additionalHeaderButtons'])) { ?><?php echo $this->v['additionalHeaderButtons']; ?><?php } ?>
					
				</ul>
			</div>
		</div>
	</div>
	
	<div id="header" class="border">
		<div id="logo">
			<div class="logoInner">
				<h1 class="pageTitle"><a href="index.php?packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>">Administrationsoberfläche</a></h1>			
				<a href="index.php?packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" class="pageLogo">
					<img src="images/acpLogo.png" title="" alt="" />
				</a>
			</div>
		</div>

		<div id="sidebar">
			<ul>
				<?php
if (count($this->v['menu']->getMenuItems('')) > 0) {
foreach ($this->v['menu']->getMenuItems('') as $this->v['item']) {
?>
					<li id="tab<?php echo StringUtil::encodeHTML($this->v['item']['menuItem']); ?>"><a onclick="acpMenu.showMenuBar('<?php echo StringUtil::encodeHTML($this->v['item']['menuItem']); ?>')"><?php if ($this->v['item']['menuItemIcon'] != '') { ?><img src="<?php echo StringUtil::encodeHTML($this->v['item']['menuItemIcon']); ?>" alt="" /> <?php } ?><span><?php $this->tagStack[] = array('lang', array()); ob_start(); ?><?php echo StringUtil::encodeHTML($this->v['item']['menuItem']); ?><?php $_lang1bbea1b2ccb34e6b00a74d9907b9c5ecee46eb96 = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang1bbea1b2ccb34e6b00a74d9907b9c5ecee46eb96, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?></span></a></li>
				<?php } } ?>
			</ul>
		</div>
		
		<div class="mainMenu" id="menuBar"><div class="mainMenuInner"><ul></ul></div></div>
	</div>
</div>	
<div id="mainContainer">
	<div id="content">