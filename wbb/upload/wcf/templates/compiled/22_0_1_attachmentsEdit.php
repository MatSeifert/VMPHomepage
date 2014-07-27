<?php
/**
* WoltLab Community Framework
* Template: attachmentsEdit
* Compiled at: Wed, 28 May 2014 19:46:45 +0000
* 
* DO NOT EDIT THIS FILE
*/
$this->v['tpl']['template'] = 'attachmentsEdit';
?>
<?php
if (!isset($this->pluginObjects['TemplatePluginModifierFilesize'])) {
require_once(WCF_DIR.'lib/system/template/plugin/TemplatePluginModifierFilesize.class.php');
$this->pluginObjects['TemplatePluginModifierFilesize'] = new TemplatePluginModifierFilesize;
}
?><div id="attachmentsEdit">
	<fieldset class="noJavaScript">
		<legend class="noJavaScript">Dateianhänge</legend>

		<?php if (isset($this->v['attachments']) && count($this->v['attachments']) > 0) { ?>
			<fieldset>
				<legend>Sie haben folgende Datei<?php if (count($this->v['attachments'][$this->v['containerID']]) > 1) { ?>en<?php } ?> hochgeladen</legend>
				<script type="text/javascript" src="<?php echo RELATIVE_WCF_DIR; ?>js/ItemListEditor.class.js"></script>
				<script type="text/javascript">
					//<![CDATA[
					function init() {
						new ItemListEditor('attachmentList');
					}
					
					// when the dom is fully loaded, execute these scripts
					document.observe("dom:loaded", init);
					
					//]]>
				</script>
				<ol class="itemList" id="attachmentList">
					<?php
$this->v['tpl']['foreach']["attachments"]['total'] = count($this->v['attachments'][$this->v['containerID']]);
$this->v['tpl']['foreach']["attachments"]['show'] = ($this->v['tpl']['foreach']["attachments"]['total'] > 0 ? true : false);
$this->v['tpl']['foreach']["attachments"]['iteration'] = 0;
if (count($this->v['attachments'][$this->v['containerID']]) > 0) {
foreach ($this->v['attachments'][$this->v['containerID']] as $this->v['attachment']) {
$this->v['tpl']['foreach']["attachments"]['first'] = ($this->v['tpl']['foreach']["attachments"]['iteration'] == 0 ? true : false);
$this->v['tpl']['foreach']["attachments"]['last'] = (($this->v['tpl']['foreach']["attachments"]['iteration'] == $this->v['tpl']['foreach']["attachments"]['total'] - 1) ? true : false);
$this->v['tpl']['foreach']["attachments"]['iteration']++;
?>
						<li id="item_<?php echo $this->v['attachment']->attachmentID; ?>">
							<div class="buttons">
								<a href="javascript:WysiwygInsert('attachment', <?php echo $this->v['attachment']->attachmentID; ?>);" title="In den Beitrag einfügen"><img src="<?php echo StyleManager::getStyle()->getIconPath('messageS.png'); ?>" alt="" /></a><input onclick="return confirm('Wollen Sie diesen Dateianhang wirklich löschen?')" type="image" src="<?php echo StyleManager::getStyle()->getIconPath('deleteS.png'); ?>" name="delete[<?php echo $this->v['attachment']->attachmentID; ?>]" title="Löschen" value="Löschen" />
								<?php if (isset($this->v['additionalAttachmentSmallButtons'][$this->v['attachment']->attachmentID])) { ?><?php echo $this->v['additionalAttachmentSmallButtons'][$this->v['attachment']->attachmentID]; ?><?php } ?>					
							</div>
							<p class="itemListTitle">
								<img src="<?php echo StringUtil::encodeHTML($this->v['attachment']->getFileTypeIcon()); ?>" alt="" />
								<select name="attachmentListPositions[<?php echo $this->v['attachment']->attachmentID; ?>]">
									<?php
if (count($this->v['attachments'][$this->v['containerID']])) {
$this->v['tpl']['section']['positions'] = array();
$this->v['tpl']['section']['positions']['loop'] = (is_array(count($this->v['attachments'][$this->v['containerID']])) ? count(count($this->v['attachments'][$this->v['containerID']])) : max(0, (int)count($this->v['attachments'][$this->v['containerID']])));
$this->v['tpl']['section']['positions']['show'] = 1;
$this->v['tpl']['section']['positions']['step'] = 1;
$this->v['tpl']['section']['positions']['max'] = $this->v['tpl']['section']['positions']['loop'];
$this->v['tpl']['section']['positions']['start'] = ($this->v['tpl']['section']['positions']['step'] > 0 ? 0 : $this->v['tpl']['section']['positions']['loop'] - 1);
$this->v['tpl']['section']['positions']['total'] = $this->v['tpl']['section']['positions']['loop'];
if ($this->v['tpl']['section']['positions']['total'] == 0) $this->v['tpl']['section']['positions']['show'] = false;
} else {
$this->v['tpl']['section']['positions']['total'] = 0;
$this->v['tpl']['section']['positions']['show'] = false;}
if ($this->v['tpl']['section']['positions']['show']) {
for ($this->v['tpl']['section']['positions']['index'] = $this->v['tpl']['section']['positions']['start'], $this->v['tpl']['section']['positions']['rowNumber'] = 1;
$this->v['tpl']['section']['positions']['rowNumber'] <= $this->v['tpl']['section']['positions']['total'];
$this->v['tpl']['section']['positions']['index'] += $this->v['tpl']['section']['positions']['step'], $this->v['tpl']['section']['positions']['rowNumber']++) {
$this->v['positions'] = $this->v['tpl']['section']['positions']['index'];
$this->v['tpl']['section']['positions']['previousIndex'] = $this->v['tpl']['section']['positions']['index'] - $this->v['tpl']['section']['positions']['step'];
$this->v['tpl']['section']['positions']['nextIndex'] = $this->v['tpl']['section']['positions']['index'] + $this->v['tpl']['section']['positions']['step'];
$this->v['tpl']['section']['positions']['first']      = ($this->v['tpl']['section']['positions']['rowNumber'] == 1);
$this->v['tpl']['section']['positions']['last']       = ($this->v['tpl']['section']['positions']['rowNumber'] == $this->v['tpl']['section']['positions']['total']);
?>
										<option value="<?php echo $this->v['positions']+1; ?>"<?php if ($this->v['positions']+1 == $this->v['tpl']['foreach']['attachments']['iteration']) { ?> selected="selected"<?php } ?>><?php echo $this->v['positions']+1; ?></option>
									<?php } } ?>
								</select>
								
								<a href="index.php?page=Attachment&amp;attachmentID=<?php echo $this->v['attachment']->attachmentID; ?>&amp;h=<?php echo $this->v['attachment']->sha1Hash; ?><?php echo SID_ARG_2ND; ?>"<?php if ($this->v['attachment']->isImage) { ?> class="enlargable"<?php } ?>><?php echo StringUtil::encodeHTML($this->v['attachment']->attachmentName); ?></a> <span class="smallFont">(<?php echo $this->pluginObjects['TemplatePluginModifierFilesize']->execute(array($this->v['attachment']->attachmentSize), $this); ?>)</span>
							</p>
						</li>
					<?php } } ?>
				</ol>
			</fieldset>
		<?php } ?>
		
		<?php if ($this->v['maxUploadFields'] > 0) { ?>
			<fieldset>
			
				<legend>Dateianhänge hinzufügen</legend>
				
				<ol id="uploadFields" class="itemList">
					<li>
						<div class="buttons">
							<a href="#delete" title="Löschen" class="hidden"><img src="<?php echo StyleManager::getStyle()->getIconPath('deleteS.png'); ?>" longdesc="" alt="" /></a>
						</div>
						<div class="itemListTitle">
							<input type="file" size="50" name="upload[]" />
						</div>
					</li>
				</ol>
				
				<?php if ($this->v['errorField'] == 'attachments') { ?>
					<div class="innerError formError">
						<?php
if (count($this->v['errorType']) > 0) {
foreach ($this->v['errorType'] as $this->v['error']) {
?>
							<p>
								<?php if ($this->v['error']['errorType'] == 'fileSize') { ?>Die Datei <?php echo StringUtil::encodeHTML($this->v['error']['attachmentName']); ?> ist zu groß.<?php } ?>
								<?php if ($this->v['error']['errorType'] == 'doubleUpload') { ?>Die Datei <?php echo StringUtil::encodeHTML($this->v['error']['attachmentName']); ?> wurde bereits hochgeladen.<?php } ?>
								<?php if ($this->v['error']['errorType'] == 'illegalExtension') { ?>Die Datei <?php echo StringUtil::encodeHTML($this->v['error']['attachmentName']); ?> hat eine ungültige Dateiendung.<?php } ?>
								<?php if ($this->v['error']['errorType'] == 'fileSizePHP') { ?>Die Datei <?php echo StringUtil::encodeHTML($this->v['error']['attachmentName']); ?> ist zu groß (PHP Limit).<?php } ?>
								<?php if ($this->v['error']['errorType'] == 'badImage') { ?>Sie haben ein beschädigtes Bild hochgeladen.<?php } ?>
							</p>
						<?php } } ?>
					</div>
				<?php } ?>
			</fieldset>
			<div class="attachmentsInputSubmit" id="attachmentsInputSubmit">
				<?php if ($this->v['maxUploadFields'] > 1) { ?>
					<script type="text/javascript">
						//<![CDATA[
						var openUploads = <?php echo $this->v['maxUploadFields']; ?> - 1;
						function addUploadField() {
							if (openUploads > 0) {
								var fileInput = new Element('input', { 'type': 'file', 'name': 'upload[]', 'size': 50 });
								var fileDiv = new Element('div').addClassName('itemListTitle');
								var deleteButton = new Element('a', { 'href': '#delete', 'title': 'Löschen' });
								deleteButton.addClassName('hidden');
								var deleteImg = new Element('img', { 'src': '<?php echo StyleManager::getStyle()->getIconPath('deleteS.png'); ?>', 'longdesc': '' });
								var buttons = new Element('div').addClassName('buttons').insert(deleteButton.insert(deleteImg));
								
								$('uploadFields').insert(new Element('li').insert(buttons).insert(fileDiv.insert(fileInput)));
								deleteButton.observe('click', removeUploadField);
								fileInput.observe('change', uploadFieldChanged);
								openUploads--;
							}
						}
						
						function removeUploadField(evt) {
							var fileInput = evt.findElement().up('li').down('input');
							var emptyField = true;
							var counter = 0;
							$$('#uploadFields input[type=file]').each(function(input) { 
								if (input.value == '') {
									emptyField = true;
								}
								counter++;
							});
							if (emptyField && fileInput.value != '' && counter > 1) {
								fileInput.up('li').fade({ 
									'duration': '0.5', afterFinish: function() { fileInput.up('li').remove(); } 
								});
								openUploads++;
							}
							else {
								fileInput.value = '';
							}
							
							evt.stop();
						}
						
						function uploadFieldChanged(e) {
							if (!e) e = window.event;
								
							if (e.target) var inputField = e.target;
							else if (e.srcElement) var inputField = e.srcElement;
							
							var emptyField = false;
							$$('#uploadFields input[type=file]').each(function(input) {
								if (input.value == '') emptyField = true;
							});
							
							if (!emptyField && inputField.value != '' && inputField.value != inputField.oldValue) {
								inputField.oldValue = inputField.value;
								addUploadField();
							}
							
							if (inputField.value == '') {
								$(inputField).up('li').down('a[href*="#delete"]').addClassName('hidden');	
							}
							else {
								$(inputField).up('li').down('a[href*="#delete"]').removeClassName('hidden');	
							}
						}
						
						// add button
						document.observe('dom:loaded', function() { 
							$$('#uploadFields input[type=file]').invoke('observe', 'change', uploadFieldChanged);
							$$('#uploadFields a[href*="#delete"]').invoke('observe', 'click', removeUploadField);
						});
						//]]>
					</script>
				<?php } ?>
				<input type="submit" name="upload" id="attachmentsInputSubmitButton" value="Hochladen" />
			</div>
			<p class="smallFont">Maximale Anzahl an Dateianhängen: <?php echo StringUtil::formatNumeric($this->v['maxUploads']); ?><br />
				Maximale Dateigröße: <?php echo $this->pluginObjects['TemplatePluginModifierFilesize']->execute(array($this->v['maxFileSize']), $this); ?><br />
				Erlaubte Dateiendungen: <?php echo StringUtil::encodeHTML($this->v['allowedExtensions']); ?></p>
		<?php } ?>
		
	</fieldset>
</div>

<script type="text/javascript">
	//<![CDATA[
	tabbedPane.addTab('attachmentsEdit', <?php if ($this->v['errorField'] == 'attachments') { ?>true<?php } else { ?>false<?php } ?>);
	//]]>
</script>