<?php
/**
* WoltLab Community Framework
* Template: threadQuickReply
* Compiled at: Wed, 28 May 2014 19:47:36 +0000
* 
* DO NOT EDIT THIS FILE
*/
$this->v['tpl']['template'] = 'threadQuickReply';
?>
<script type="text/javascript" src="<?php echo RELATIVE_WBB_DIR; ?>js/ThreadQuickReply.class.js"></script>
<form method="post" action="index.php?form=PostQuickAdd&amp;threadID=<?php echo $this->v['thread']->threadID; ?>">
	<div class="quickReply message content messageMinimized hidden" id="quickReplyContainer-<?php echo $this->v['thread']->threadID; ?>">
		<div class="messageInner container-1">
			<img src="<?php echo StyleManager::getStyle()->getIconPath('messageQuickReplyM.png'); ?>" alt="" />
			<h3><a id="quickReplyLink-<?php echo $this->v['thread']->threadID; ?>" title="Schnellantwort öffnen und schließen">Schnellantwort</a></h3>
			
			<div class="hidden" id="quickReplyInput-<?php echo $this->v['thread']->threadID; ?>">
				<div class="formElement">
					<div class="formFieldLabel">
						<label for="text">Beitrag</label>
					</div>
					<div class="formField">
						<textarea name="text" id="text" rows="10" cols="40"></textarea>
					</div>
				</div>
				<div class="formSubmit hidden" id="quickReplyButtons-<?php echo $this->v['thread']->threadID; ?>">
					<input type="submit" name="send" accesskey="s" value="Absenden" />
					<input type="submit" name="preview" accesskey="p" value="Zum Editor wechseln" />
					<input type="reset" name="reset" accesskey="r" value="Zurücksetzen" />
					<?php echo SID_INPUT_TAG; ?>
				</div>
			</div>
		</div>
	</div>
	
</form>
<script type="text/javascript">
	//<![CDATA[
	// init quick reply
	new ThreadQuickReply(<?php echo $this->v['thread']->threadID; ?>);
	//]]>
</script>