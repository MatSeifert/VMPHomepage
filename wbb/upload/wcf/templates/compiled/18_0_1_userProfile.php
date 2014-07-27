<?php
/**
* WoltLab Community Framework
* Template: userProfile
* Compiled at: Mon, 09 Jun 2014 00:36:14 +0000
* 
* DO NOT EDIT THIS FILE
*/
$this->v['tpl']['template'] = 'userProfile';
?>
<?php
if (!isset($this->pluginObjects['TemplatePluginFunctionCycle'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginFunctionCycle.class.php');
$this->pluginObjects['TemplatePluginFunctionCycle'] = new TemplatePluginFunctionCycle;
}
if (!isset($this->pluginObjects['TemplatePluginModifierTime'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginModifierTime.class.php');
$this->pluginObjects['TemplatePluginModifierTime'] = new TemplatePluginModifierTime;
}
?><?php
$outerTemplateNamedb26bdfa8b290a32efafb4a61b3a5b0670051a9f = $this->v['tpl']['template'];
$this->includeTemplate("documentHeader", array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateNamedb26bdfa8b290a32efafb4a61b3a5b0670051a9f;
$this->v['tpl']['includedTemplates']["documentHeader"] = 1;
?>
<head>
	<title>Profil von &raquo;<?php echo StringUtil::encodeHTML($this->v['user']->username); ?>&laquo; - Mitglieder - <?php $this->tagStack[] = array('lang', array()); ob_start(); ?><?php echo StringUtil::encodeHTML(PAGE_TITLE); ?><?php $_lang0d5fa8cfc2a132e66183aeb61663a2ec09d8f765 = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang0d5fa8cfc2a132e66183aeb61663a2ec09d8f765, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?></title>
	<?php
$outerTemplateNamef965ed5c75d9135ef60fca67d8c28ec5c02c5c52 = $this->v['tpl']['template'];
$this->includeTemplate('headInclude', array(), (false ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateNamef965ed5c75d9135ef60fca67d8c28ec5c02c5c52;
$this->v['tpl']['includedTemplates']['headInclude'] = 1;
?>
	<script type="text/javascript">
		//<![CDATA[
		var INLINE_IMAGE_MAX_WIDTH = <?php echo INLINE_IMAGE_MAX_WIDTH; ?>; 
		//]]>
	</script>
	<script type="text/javascript" src="<?php echo RELATIVE_WCF_DIR; ?>js/ImageResizer.class.js"></script>
</head>
<body<?php if (isset($this->v['templateName'])) { ?> id="tpl<?php echo StringUtil::encodeHTML(ucfirst($this->v['templateName'])); ?>"<?php } ?>>

<?php $this->assign('searchFieldTitle', 'Benutzerbeiträge durchsuchen'); ?>
<?php ob_start(); ?>
	<input type="hidden" name="userID" value="<?php echo $this->v['user']->userID; ?>" />
<?php
$this->v['tpl']['capture']['default'] = ob_get_contents();
ob_end_clean();
$this->assign('searchHiddenFields', $this->v['tpl']['capture']['default']);
?>

<?php
$outerTemplateName0cd76e1f83e8d64e39ac19a22d059aaa8a6cf81a = $this->v['tpl']['template'];
$this->includeTemplate('header', array(), (false ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName0cd76e1f83e8d64e39ac19a22d059aaa8a6cf81a;
$this->v['tpl']['includedTemplates']['header'] = 1;
?>

<div id="main">
	<?php
$outerTemplateNamefe4a9718a2071ed61edd623bc2b8fb4cbc105c00 = $this->v['tpl']['template'];
$this->includeTemplate("userProfileHeader", array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateNamefe4a9718a2071ed61edd623bc2b8fb4cbc105c00;
$this->v['tpl']['includedTemplates']["userProfileHeader"] = 1;
?>
	
	<div class="border">
		<div class="layout-2">
			<div class="columnContainer">	
				<div class="container-1 column first">
					<div class="columnInner">
						
						<?php if (isset($this->v['additionalContent1'])) { ?><?php echo $this->v['additionalContent1']; ?><?php } ?>
					
						<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array('values' => 'container-1,container-2', 'print' => false, 'advance' => false), $this); ?>

						<?php
if (count($this->v['categories']) > 0) {
foreach ($this->v['categories'] as $this->v['category']) {
?>
							<div class="contentBox">
								<h3 class="subHeadline"><?php $this->tagStack[] = array('lang', array()); ob_start(); ?>wcf.user.option.category.<?php echo StringUtil::encodeHTML($this->v['category']['categoryName']); ?><?php $_lang03527480b1ae70166f41d6a98ff5d7a0e7b0b430 = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang03527480b1ae70166f41d6a98ff5d7a0e7b0b430, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?></h3>
								
								<ul class="dataList">
									<?php
if (count($this->v['category']['options']) > 0) {
foreach ($this->v['category']['options'] as $this->v['option']) {
?>
										<?php if ($this->v['option']['optionName'] == 'aboutMe') { ?>
											<li class="<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array(), $this); ?> messageBody">
												<?php echo $this->v['option']['optionValue']; ?>
											</li>
										<?php } else { ?>
											<li class="<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array(), $this); ?> formElement">
												<p class="formFieldLabel"><?php $this->tagStack[] = array('lang', array()); ob_start(); ?>wcf.user.option.<?php echo StringUtil::encodeHTML($this->v['option']['optionName']); ?><?php $_lang27280672fbf6377ac4c7c8b8264b4f0cc84ad26e = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang27280672fbf6377ac4c7c8b8264b4f0cc84ad26e, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?></p>
												<p class="formField"><?php echo $this->v['option']['optionValue']; ?></p>
											</li>
										<?php } ?>
									<?php } } ?>
								</ul>
								
								<?php if ($this->v['category']['categoryName'] == 'profile.aboutMe') { ?>
									<?php if (isset($this->v['additionalAboutMeContent'])) { ?><?php echo $this->v['additionalAboutMeContent']; ?><?php } ?>
								<?php } ?>
								
								<div class="buttonBar">
									<div class="smallButtons">
										<ul><li class="extraButton"><a href="#top" title="Zum Seitenanfang"><img src="<?php echo StyleManager::getStyle()->getIconPath('upS.png'); ?>" alt="Zum Seitenanfang" /> <span class="hidden">Zum Seitenanfang</span></a></li></ul>
									</div>
								</div>
							</div>
						<?php } } else { { ?>
							<div class="contentBox">
								<h3 class="subHeadline">Über mich</h3>
								
								<div class="messageBody">Der Benutzer hat keine Beschreibung über sich angegeben.</div>
								
								<?php if (isset($this->v['additionalAboutMeContent'])) { ?><?php echo $this->v['additionalAboutMeContent']; ?><?php } ?>
								
								<div class="buttonBar">
									<div class="smallButtons">
										<ul><li class="extraButton"><a href="#top" title="Zum Seitenanfang"><img src="<?php echo StyleManager::getStyle()->getIconPath('upS.png'); ?>" alt="Zum Seitenanfang" /> <span class="hidden">Zum Seitenanfang</span></a></li></ul>
									</div>
								</div>						
							</div>	
						<?php } } ?>
						
						<?php if (isset($this->v['additionalContent2'])) { ?><?php echo $this->v['additionalContent2']; ?><?php } ?>
						
						<?php if (count($this->v['friends']) > 0) { ?>
							<div class="contentBox">
								<h3 class="subHeadline"><a href="index.php?page=UserFriendList&amp;userID=<?php echo $this->v['userID']; ?><?php echo SID_ARG_2ND; ?>">Freunde</a> <span>(<?php echo StringUtil::formatNumeric($this->v['user']->friends); ?>)</span></h3>
								
								<ul class="dataList thumbnailView floatContainer container-1">
									<?php
$this->v['tpl']['foreach']['friends']['total'] = count($this->v['friends']);
$this->v['tpl']['foreach']['friends']['show'] = ($this->v['tpl']['foreach']['friends']['total'] > 0 ? true : false);
$this->v['tpl']['foreach']['friends']['iteration'] = 0;
if (count($this->v['friends']) > 0) {
foreach ($this->v['friends'] as $this->v['friend']) {
$this->v['tpl']['foreach']['friends']['first'] = ($this->v['tpl']['foreach']['friends']['iteration'] == 0 ? true : false);
$this->v['tpl']['foreach']['friends']['last'] = (($this->v['tpl']['foreach']['friends']['iteration'] == $this->v['tpl']['foreach']['friends']['total'] - 1) ? true : false);
$this->v['tpl']['foreach']['friends']['iteration']++;
?>
										<li class="floatedElement smallFont<?php if ($this->v['tpl']['foreach']['friends']['iteration'] == 5) { ?> last<?php } ?>">
											<a href="index.php?page=User&amp;userID=<?php echo $this->v['friend']->userID; ?><?php echo SID_ARG_2ND; ?>" title="<?php $this->tagStack[] = array('lang', array('username' => StringUtil::encodeHTML($this->v['friend']->username))); ob_start(); ?>wcf.user.viewProfile<?php $_lang9b441ff0bb0286f0043200d21f298216455532e0 = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang9b441ff0bb0286f0043200d21f298216455532e0, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?>">
												<?php if ($this->v['friend']->getAvatar()) { ?>
													<?php $this->assign('x', $this->v['friend']->getAvatar()->setMaxSize(48,48)); ?>
													<span class="thumbnail" style="width: <?php echo $this->v['friend']->getAvatar()->getWidth(); ?>px;"><?php echo $this->v['friend']->getAvatar(); ?></span>
												<?php } else { ?>
													<span class="thumbnail" style="width: 48px;"><img src="<?php echo RELATIVE_WCF_DIR; ?>images/avatars/avatar-default.png" alt="" style="width: 48px; height: 48px" /></span>
												<?php } ?>
												<span class="avatarCaption"><?php echo StringUtil::encodeHTML($this->v['friend']->username); ?></span>
											</a>
										</li>
									<?php } } ?>
								</ul>
								<div class="buttonBar">
									<div class="smallButtons">
										<ul>
											<li class="extraButton"><a href="#top" title="Zum Seitenanfang"><img src="<?php echo StyleManager::getStyle()->getIconPath('upS.png'); ?>" alt="Zum Seitenanfang" /> <span class="hidden">Zum Seitenanfang</span></a></li>
											<li><a href="index.php?page=UserFriendList&amp;userID=<?php echo $this->v['userID']; ?><?php echo SID_ARG_2ND; ?>" title="Alle Freunde anzeigen"><img src="<?php echo StyleManager::getStyle()->getIconPath('friendsS.png'); ?>" alt="" /> <span>Alle Freunde anzeigen</span></a></li>
										</ul>
									</div>
								</div>
							</div>
						<?php } ?>
						
						<?php if (isset($this->v['additionalContent3'])) { ?><?php echo $this->v['additionalContent3']; ?><?php } ?>
					</div>
				</div>
					
				<div class="container-3 column second sidebar profileSidebar">
					<div class="columnInner">
					
						<?php if (isset($this->v['additionalBoxes1'])) { ?><?php echo $this->v['additionalBoxes1']; ?><?php } ?>
					
						<?php if (count($this->v['contactInformation']) > 0) { ?>
							<div class="contentBox">
								<div class="border"> 
									<div class="containerHead"> 
										<h3>Kontakt</h3> 
									</div> 
									<div class="pageMenu"> 
										<ul class="twoRows">
											<?php
if (count($this->v['contactInformation']) > 0) {
foreach ($this->v['contactInformation'] as $this->v['contact']) {
?>
												<li class="<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array('values' => 'container-1,container-2'), $this); ?>">
													<a<?php if ($this->v['contact']['url']) { ?> href="<?php echo $this->v['contact']['url']; ?>"<?php } ?>><?php if ($this->v['contact']['icon']) { ?><img src="<?php echo $this->v['contact']['icon']; ?>" alt="" /> <?php } ?><label class="smallFont"><?php echo $this->v['contact']['title']; ?></label> <span><?php echo $this->v['contact']['value']; ?></span></a>
												</li>
											<?php } } ?>
										</ul>
									</div> 
								</div>
							</div>
						<?php } ?>
						
						<?php if (count($this->v['generalInformation']) > 0) { ?>
							<div class="contentBox">
								<div class="border">
									<div class="containerHead">
										<h3>Allgemeine Informationen</h3>
									</div>
									
									<ul class="dataList">
										<?php
if (count($this->v['generalInformation']) > 0) {
foreach ($this->v['generalInformation'] as $this->v['general']) {
?>
											<li class="<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array('values' => 'container-1,container-2'), $this); ?>">
												<div class="containerIcon">
													<?php if ( ! empty($this->v['general']['icon'])) { ?><img src="<?php echo $this->v['general']['icon']; ?>" alt="" title="<?php echo $this->v['general']['title']; ?>" /><?php } ?>
												</div>
												<div class="containerContent">
													<h4 class="smallFont"><?php echo $this->v['general']['title']; ?></h4>
													<p><?php echo $this->v['general']['value']; ?></p>
												</div>
											</li>
										<?php } } ?>
									</ul>
								</div>
							</div>
						<?php } ?>
						
						<?php if (isset($this->v['additionalBoxes2'])) { ?><?php echo $this->v['additionalBoxes2']; ?><?php } ?>
					
						<?php if (count($this->v['profileVisitors']) > 0) { ?>
							<div class="contentBox">
								<div class="border">
									<div class="containerHead">
										<h3>Profilbesucher</h3>
									</div>
									
									<ul class="dataList">
										<?php
if (count($this->v['profileVisitors']) > 0) {
foreach ($this->v['profileVisitors'] as $this->v['profileVisitor']) {
?>
											<li class="<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array('values' => 'container-1,container-2'), $this); ?>">
												<div class="containerIcon">
													<a href="index.php?page=User&amp;userID=<?php echo $this->v['profileVisitor']->userID; ?><?php echo SID_ARG_2ND; ?>" title="<?php $this->tagStack[] = array('lang', array('username' => StringUtil::encodeHTML($this->v['profileVisitor']->username))); ob_start(); ?>wcf.user.viewProfile<?php $_lang4446b34362fd72a0e059630075778b91ae1fb402 = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang4446b34362fd72a0e059630075778b91ae1fb402, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?>">
														<?php if ($this->v['profileVisitor']->getAvatar()) { ?>
															<?php $this->assign('x', $this->v['profileVisitor']->getAvatar()->setMaxSize(24,24)); ?>
															<?php echo $this->v['profileVisitor']->getAvatar(); ?>
														<?php } else { ?>
															<img src="<?php echo RELATIVE_WCF_DIR; ?>images/avatars/avatar-default.png" alt="" style="width: 24px; height: 24px" />
														<?php } ?>
													</a>
												</div>
												<div class="containerContent">
													<h4><a href="index.php?page=User&amp;userID=<?php echo $this->v['profileVisitor']->userID; ?><?php echo SID_ARG_2ND; ?>" title="<?php $this->tagStack[] = array('lang', array('username' => StringUtil::encodeHTML($this->v['profileVisitor']->username))); ob_start(); ?>wcf.user.viewProfile<?php $_lang62c5018bec5b370192dca725bbecc020a19a16aa = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang62c5018bec5b370192dca725bbecc020a19a16aa, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?>"><?php echo StringUtil::encodeHTML($this->v['profileVisitor']->username); ?></a></h4>
													<p class="light smallFont"><?php echo $this->pluginObjects['TemplatePluginModifierTime']->execute(array($this->v['profileVisitor']->time), $this); ?></p>
												</div>
											</li>
										<?php } } ?>
									</ul>
								</div>
							</div>
						<?php } ?>
						
						<?php if (isset($this->v['additionalBoxes3'])) { ?><?php echo $this->v['additionalBoxes3']; ?><?php } ?>
		
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
$outerTemplateName0a988a03afc7c9e619ea9928ce3e05d8b35cc547 = $this->v['tpl']['template'];
$this->includeTemplate('footer', array(), (false ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName0a988a03afc7c9e619ea9928ce3e05d8b35cc547;
$this->v['tpl']['includedTemplates']['footer'] = 1;
?>
</body>
</html>