<?php
/**
* WoltLab Community Framework
* Template: userList
* Compiled at: Wed, 28 May 2014 19:44:07 +0000
* 
* DO NOT EDIT THIS FILE
*/
$this->v['tpl']['template'] = 'userList';
?>
<?php
if (!isset($this->pluginObjects['TemplatePluginModifierEncodejs'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginModifierEncodejs.class.php');
$this->pluginObjects['TemplatePluginModifierEncodejs'] = new TemplatePluginModifierEncodejs;
}
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
?><?php
$outerTemplateNamea94f43734b7f3ac37946ee1882709310267ea81d = $this->v['tpl']['template'];
$this->includeTemplate('header', array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateNamea94f43734b7f3ac37946ee1882709310267ea81d;
$this->v['tpl']['includedTemplates']['header'] = 1;
?>
<script type="text/javascript" src="<?php echo RELATIVE_WCF_DIR; ?>js/MultiPagesLinks.class.js"></script>
<script type="text/javascript" src="<?php echo RELATIVE_WCF_DIR; ?>js/AjaxRequest.class.js"></script>
<script type="text/javascript" src="<?php echo RELATIVE_WCF_DIR; ?>js/InlineListEdit.class.js"></script>
<script type="text/javascript" src="<?php echo RELATIVE_WCF_DIR; ?>acp/js/UserListEdit.class.js"></script>
<script type="text/javascript">
	//<![CDATA[
	// data array
	var userData = new Hash();
	var url = '<?php echo $this->pluginObjects['TemplatePluginModifierEncodejs']->execute(array($this->v['url']), $this); ?>';
	
	// language
	var language = new Object();
	language['wcf.global.button.mark']		= 'Markieren';
	language['wcf.global.button.unmark']		= 'Demarkieren';
	language['wcf.global.button.delete']		= 'Löschen';
	language['wcf.acp.user.button.sendMail']	= 'E-Mail senden';
	language['wcf.acp.user.button.exportMail']	= 'E-Mail-Adressen exportieren';
	language['wcf.acp.user.button.assignGroup']	= 'Benutzergruppe zuweisen';
	language['wcf.acp.user.deleteMarked.sure']	= 'Wollen Sie die markierten Benutzer wirklich löschen?';
	language['wcf.acp.user.delete.sure']		= 'Wollen Sie diesen Benutzer wirklich löschen?';
	language['wcf.acp.user.markedUsers']		= 'this.count == 1 ? "Einen Benutzer markiert" : this.count+" Benutzer markiert"';
	
	// additional options
	var additionalOptions = new Array();
	var additionalUserOptions = new Array();
	<?php if (isset($this->v['additionalMarkedOptions'])) { ?><?php echo $this->v['additionalMarkedOptions']; ?><?php } ?>
	
	// permissions
	var permissions = new Object();
	permissions['canEditUser'] = <?php if ($this->v['this']->user->getPermission('admin.user.canEditUser')) { ?>1<?php } else { ?>0<?php } ?>;
	permissions['canDeleteUser'] = <?php if ($this->v['this']->user->getPermission('admin.user.canDeleteUser')) { ?>1<?php } else { ?>0<?php } ?>;
	permissions['canMailUser'] = <?php if ($this->v['this']->user->getPermission('admin.user.canMailUser')) { ?>1<?php } else { ?>0<?php } ?>;
	permissions['canEditMailAddress'] = <?php if ($this->v['this']->user->getPermission('admin.user.canEditMailAddress')) { ?>1<?php } else { ?>0<?php } ?>;
	permissions['canEditPassword'] = <?php if ($this->v['this']->user->getPermission('admin.user.canEditPassword')) { ?>1<?php } else { ?>0<?php } ?>;
	
	onloadEvents.push(function() { userListEdit = new UserListEdit(userData, <?php echo $this->v['markedUsers']; ?>, additionalUserOptions, additionalOptions); });
	//]]>
</script>

<div class="mainHeadline">
	<img src="<?php echo RELATIVE_WCF_DIR; ?>icon/<?php if ($this->v['searchID']) { ?>userSearch<?php } else { ?>users<?php } ?>L.png" alt="" />
	<div class="headlineContainer">
		<h2><?php $this->tagStack[] = array('lang', array()); ob_start(); ?>wcf.acp.user.<?php if ($this->v['searchID']) { ?>search<?php } else { ?>list<?php } ?><?php $_lang94d09a19fd2e53fdf3840aae8eb602987f18c9db = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang94d09a19fd2e53fdf3840aae8eb602987f18c9db, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?></h2>
		<p><?php if ($this->v['searchID']) { ?><?php if ($this->v['items'] == 1) { ?>Ein Ergebnis<?php } else { ?><?php echo StringUtil::formatNumeric($this->v['items']); ?> Ergebnisse<?php } ?><?php } else { ?>Insgesamt <?php echo StringUtil::formatNumeric($this->v['items']); ?> Benutzer<?php } ?></p>
	</div>
</div>

<?php $this->assign('encodedURL', rawurlencode($this->v['url'])); ?>
<?php $this->assign('encodedAction', rawurlencode($this->v['action'])); ?>
<div class="contentHeader">
	<?php echo $this->pluginObjects['TemplatePluginFunctionPages']->execute(array('print' => true, 'assign' => 'pagesLinks', 'link' => $this->pluginObjects['TemplatePluginModifierConcat']->execute(array("index.php?page=UserList&pageNo=%d&searchID={$this->v['searchID']}&action={$this->v['encodedAction']}&sortField={$this->v['sortField']}&sortOrder={$this->v['sortOrder']}&packageID=",PACKAGE_ID,SID_ARG_2ND_NOT_ENCODED), $this)), $this); ?>
	
	<div class="largeButtons">
		<ul>
			<?php if ($this->v['this']->user->getPermission('admin.user.canAddUser')) { ?>
				<li><a href="index.php?form=UserAdd&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" title="Benutzer hinzufügen"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/userAddM.png" alt="" /> <span>Benutzer hinzufügen</span></a></li>
			<?php } ?>
			<li><a href="index.php?form=UserSearch&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" title="Benutzer suchen"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/searchM.png" alt="" /> <span>Benutzer suchen</span></a></li>
			<?php if (isset($this->v['additionalLargeButtons'])) { ?><?php echo $this->v['additionalLargeButtons']; ?><?php } ?>
		</ul>
	</div>
</div>

<div class="subTabMenu">
	<div class="containerHead">
		<ul>
			<li<?php if ($this->v['action'] == '') { ?> class="activeSubTabMenu"<?php } ?>><a href="index.php?page=UserList&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>"><span>Alle Benutzer</span></a></li>
			<?php if (isset($this->v['additionalUserListOptions'])) { ?><?php echo $this->v['additionalUserListOptions']; ?><?php } ?>
		</ul>
	</div>
</div>
<?php if (count($this->v['users'])) { ?>
	<div class="border">
		<table class="tableList">
			<thead>
				<tr class="tableHead">
					<th class="columnMark"><div><label class="emptyHead"><input name="userMarkAll" type="checkbox" /></label></div></th>
					<th class="columnUserID<?php if ($this->v['sortField'] == 'userID') { ?> active<?php } ?>" colspan="2"><div><a href="index.php?page=UserList&amp;searchID=<?php echo $this->v['searchID']; ?>&amp;action=<?php echo $this->v['encodedAction']; ?>&amp;pageNo=<?php echo $this->v['pageNo']; ?>&amp;sortField=userID&amp;sortOrder=<?php if ($this->v['sortField'] == 'userID' && $this->v['sortOrder'] == 'ASC') { ?>DESC<?php } else { ?>ASC<?php } ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>">Benutzer-ID<?php if ($this->v['sortField'] == 'userID') { ?> <img src="<?php echo RELATIVE_WCF_DIR; ?>icon/sort<?php echo $this->v['sortOrder']; ?>S.png" alt="" /><?php } ?></a></div></th>
					<th class="columnUsername<?php if ($this->v['sortField'] == 'username') { ?> active<?php } ?>"><div><a href="index.php?page=UserList&amp;searchID=<?php echo $this->v['searchID']; ?>&amp;action=<?php echo $this->v['encodedAction']; ?>&amp;pageNo=<?php echo $this->v['pageNo']; ?>&amp;sortField=username&amp;sortOrder=<?php if ($this->v['sortField'] == 'username' && $this->v['sortOrder'] == 'ASC') { ?>DESC<?php } else { ?>ASC<?php } ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>">Benutzername<?php if ($this->v['sortField'] == 'username') { ?> <img src="<?php echo RELATIVE_WCF_DIR; ?>icon/sort<?php echo $this->v['sortOrder']; ?>S.png" alt="" /><?php } ?></a></div></th>
					
					<?php
if (count($this->v['columnHeads']) > 0) {
foreach ($this->v['columnHeads'] as $this->v['column'] => $this->v['columnLanguageVariable']) {
?>
						<th class="column<?php echo StringUtil::encodeHTML(ucfirst($this->v['column'])); ?><?php if ($this->v['sortField'] == $this->v['column']) { ?> active<?php } ?>"><div><a href="index.php?page=UserList&amp;searchID=<?php echo $this->v['searchID']; ?>&amp;action=<?php echo $this->v['encodedAction']; ?>&amp;pageNo=<?php echo $this->v['pageNo']; ?>&amp;sortField=<?php echo StringUtil::encodeHTML($this->v['column']); ?>&amp;sortOrder=<?php if ($this->v['sortField'] == $this->v['column'] && $this->v['sortOrder'] == 'ASC') { ?>DESC<?php } else { ?>ASC<?php } ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>"><?php $this->tagStack[] = array('lang', array()); ob_start(); ?><?php echo StringUtil::encodeHTML($this->v['columnLanguageVariable']); ?><?php $_lang3f04116d5ff7fe5627b07afe5f7631661452ff18 = ob_get_contents(); ob_end_clean(); echo WCF::getLanguage()->getDynamicVariable($_lang3f04116d5ff7fe5627b07afe5f7631661452ff18, $this->tagStack[count($this->tagStack) - 1][1]); array_pop($this->tagStack); ?><?php if ($this->v['sortField'] == $this->v['column']) { ?> <img src="<?php echo RELATIVE_WCF_DIR; ?>icon/sort<?php echo $this->v['sortOrder']; ?>S.png" alt="" /><?php } ?></a></div></th>
					<?php } } ?>
					
					<?php if (isset($this->v['additionalColumnHeads'])) { ?><?php echo $this->v['additionalColumnHeads']; ?><?php } ?>
				</tr>
			</thead>
			<tbody>
			<?php
if (count($this->v['users']) > 0) {
foreach ($this->v['users'] as $this->v['user']) {
?>
				<tr class="<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array('values' => "container-1,container-2", 'advance' => false), $this); ?>" id="userRow<?php echo $this->v['user']->userID; ?>">
					<td class="columnMark"><input name="userMark" id="userMark<?php echo $this->v['user']->userID; ?>" type="checkbox" value="<?php echo $this->v['user']->userID; ?>" /></td>
					<td class="columnIcon">
						<script type="text/javascript">
							//<![CDATA[
							userData.set(<?php echo $this->v['user']->userID; ?>, {
								'isMarked': <?php echo $this->v['user']->isMarked; ?>,
								'className': '<?php echo $this->pluginObjects['TemplatePluginFunctionCycle']->execute(array('values' => "container-1,container-2"), $this); ?>'
							});
							//]]>
						</script>
						
						<?php if ($this->v['user']->editable) { ?>
							<a href="index.php?form=UserEdit&amp;userID=<?php echo $this->v['user']->userID; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/editS.png" alt="" title="Benutzer bearbeiten" /></a>
						<?php } else { ?>
							<img src="<?php echo RELATIVE_WCF_DIR; ?>icon/editDisabledS.png" alt="" title="Benutzer bearbeiten" />
						<?php } ?>
						<?php if ($this->v['user']->deletable) { ?>
							<a onclick="return confirm('Wollen Sie diesen Benutzer wirklich löschen?')" href="index.php?action=UserDelete&amp;userID=<?php echo $this->v['user']->userID; ?>&amp;url=<?php echo $this->v['encodedURL']; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/deleteS.png" alt="" title="Benutzer löschen" /></a>
						<?php } else { ?>
							<img src="<?php echo RELATIVE_WCF_DIR; ?>icon/deleteDisabledS.png" alt="" title="Benutzer löschen" />
						<?php } ?>
						
						<?php if (isset($this->v['additionalButtons'][$this->v['user']->userID])) { ?><?php echo $this->v['additionalButtons'][$this->v['user']->userID]; ?><?php } ?>
					</td>
					<td class="columnUserID columnID"><?php echo $this->v['user']->userID; ?></td>
					<td class="columnUsername columnText"><?php if ($this->v['user']->editable) { ?><a title="Benutzer bearbeiten" href="index.php?form=UserEdit&amp;userID=<?php echo $this->v['user']->userID; ?>&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>"><?php echo StringUtil::encodeHTML($this->v['user']->username); ?></a><?php } else { ?><?php echo StringUtil::encodeHTML($this->v['user']->username); ?><?php } ?></td>
					
					<?php
if (count($this->v['columnHeads']) > 0) {
foreach ($this->v['columnHeads'] as $this->v['column'] => $this->v['columnLanguageVariable']) {
?>
						<td class="column<?php echo StringUtil::encodeHTML(ucfirst($this->v['column'])); ?>"><?php if (isset($this->v['columnValues'][$this->v['user']->userID][$this->v['column']])) { ?><?php echo $this->v['columnValues'][$this->v['user']->userID][$this->v['column']]; ?><?php } ?></td>
					<?php } } ?>
					
					<?php if (isset($this->v['additionalColumns'][$this->v['user']->userID])) { ?><?php echo $this->v['additionalColumns'][$this->v['user']->userID]; ?><?php } ?>
				</tr>
			<?php } } ?>
			</tbody>
		</table>
	</div>
	<div class="contentFooter">
		<?php echo $this->v['pagesLinks']; ?> <div id="userEditMarked" class="optionButtons"></div>
		
		<div class="largeButtons">
			<ul>
				<?php if ($this->v['this']->user->getPermission('admin.user.canAddUser')) { ?>
					<li><a href="index.php?form=UserAdd&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" title="Benutzer hinzufügen"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/userAddM.png" alt="" /> <span>Benutzer hinzufügen</span></a></li>
				<?php } ?>
				<li><a href="index.php?form=UserSearch&amp;packageID=<?php echo PACKAGE_ID; ?><?php echo SID_ARG_2ND; ?>" title="Benutzer suchen"><img src="<?php echo RELATIVE_WCF_DIR; ?>icon/searchM.png" alt="" /> <span>Benutzer suchen</span></a></li>
				<?php if (isset($this->v['additionalLargeButtons'])) { ?><?php echo $this->v['additionalLargeButtons']; ?><?php } ?>
			</ul>
		</div>
	</div>
<?php } else { ?>
	<div class="border content">
		<div class="container-1">Zu den angegebenen Kriterien wurde kein Benutzer gefunden.</div>
	</div>
<?php } ?>

<?php
$outerTemplateName8986142f5b7a103344b023e44b332dd518e33ab7 = $this->v['tpl']['template'];
$this->includeTemplate('footer', array(), (1 ? 1 : 0));
$this->v['tpl']['template'] = $outerTemplateName8986142f5b7a103344b023e44b332dd518e33ab7;
$this->v['tpl']['includedTemplates']['footer'] = 1;
?>