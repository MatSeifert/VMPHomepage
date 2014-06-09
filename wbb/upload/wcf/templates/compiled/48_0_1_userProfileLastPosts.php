<?php
/**
* WoltLab Community Framework
* Template: userProfileLastPosts
* Compiled at: Mon, 09 Jun 2014 00:36:14 +0000
* 
* DO NOT EDIT THIS FILE
*/
$this->v['tpl']['template'] = 'userProfileLastPosts';
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
?><div class="contentBox">
	<h3 class="subHeadline"><a href="index.php?form=Search&amp;types[]=post&amp;userID=<?php echo $this->v['user']->userID; ?><?php echo SID_ARG_2ND; ?>">Beiträge</a> <span>(<?php echo StringUtil::formatNumeric($this->v['user']->posts); ?>)</span></h3>
	
	<ul class="dataList">
		<?php
if (count($this->v['posts']) > 0) {
foreach ($this->v['posts'] as $this->v['post']) {
?>
			<li class="<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array('values' => 'container-1,container-2'), $this); ?>">
				<div class="containerIcon">
					<img src="<?php echo StyleManager::getStyle()->getIconPath('postM.png'); ?>" alt="" />
				</div>
				<div class="containerContent">
					<h4><?php if ($this->v['post']->prefix) { ?><span class="prefix"><?php $this->tagStack[] = array('lang', array()); ob_start(); ?><?php echo StringUtil::encodeHTML($this->v['post']->prefix); ?><?php $_lang0caba3affaa2239fcedf5ebeb400711222111bc0 = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang0caba3affaa2239fcedf5ebeb400711222111bc0, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?></span> <?php } ?><a href="index.php?page=Thread&amp;postID=<?php echo $this->v['post']->postID; ?><?php echo SID_ARG_2ND; ?>#post<?php echo $this->v['post']->postID; ?>"><?php echo StringUtil::encodeHTML($this->v['post']->subject); ?></a></h4>
					<p class="firstPost smallFont light"><?php echo $this->pluginObjects['TemplatePluginModifierTime']->execute(array($this->v['post']->time), $this); ?></p>
				</div>
			</li>
		<?php } } ?>
	</ul>
	
	<div class="buttonBar">
		<div class="smallButtons">
			<ul>
				<li class="extraButton"><a href="#top" title="Zum Seitenanfang"><img src="<?php echo StyleManager::getStyle()->getIconPath('upS.png'); ?>" alt="Zum Seitenanfang" /> <span class="hidden">Zum Seitenanfang</span></a></li>
				<li><a href="index.php?form=Search&amp;types[]=post&amp;userID=<?php echo $this->v['user']->userID; ?><?php echo SID_ARG_2ND; ?>" title="Alle Beiträge anzeigen"><img src="<?php echo StyleManager::getStyle()->getIconPath('messageS.png'); ?>" alt="" /> <span>Alle Beiträge anzeigen</span></a></li>
				<li><a href="index.php?form=Search&amp;types[]=post&amp;userID=<?php echo $this->v['user']->userID; ?>&amp;findUserThreads=1<?php echo SID_ARG_2ND; ?>" title="Alle Themen anzeigen"><img src="<?php echo StyleManager::getStyle()->getIconPath('threadS.png'); ?>" alt="" /> <span>Alle Themen anzeigen</span></a></li>
			</ul>
		</div>
	</div>
</div>