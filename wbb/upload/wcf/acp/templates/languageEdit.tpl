{include file='header'}

<div class="mainHeadline">
	<img src="{@RELATIVE_WCF_DIR}icon/languageEditL.png" alt="" />
	<div class="headlineContainer">
		<h2>{lang}wcf.acp.language.edit{/lang}</h2>
	</div>
</div>

{if $errorField}
	<p class="error">{lang}wcf.global.form.error{/lang}</p>
{/if}

{if $success|isset}
	<p class="success">{lang}wcf.acp.language.edit.success{/lang}</p>	
{/if}

<div class="contentHeader">
	<div class="largeButtons">
		<ul><li><a href="index.php?page=LanguageList&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/languageM.png" alt="" title="{lang}wcf.acp.menu.link.language.view{/lang}" /> <span>{lang}wcf.acp.menu.link.language.view{/lang}</span></a></li>
		<li><a href="index.php?form=LanguageSearch&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/searchM.png" alt="" title="{lang}wcf.acp.menu.link.language.view{/lang}" /> <span>{lang}wcf.acp.menu.link.language.search{/lang}</span></a></li></ul>
	</div>
</div>
<form method="get" action="index.php">
	<div class="border content">
		<div class="container-1">
			<div class="formElement">
				<p class="formField">
					<span>{lang}wcf.global.language.{@$language->getLanguageCode()}{/lang} ({@$language->getLanguageCode()})</span>
					<img src="{@RELATIVE_WCF_DIR}icon/language{@$language->getLanguageCode()|ucfirst}S.png" alt="" />
				</p>
			</div>
			
			<div class="formElement{if $errorField == 'languageCategoryID'} formError{/if}">
				<div class="formFieldLabel">
					<label for="languageCategoryID">{lang}wcf.acp.language.category{/lang}</label>
				</div>
				<div class="formField">
					<select name="languageCategoryID" id="languageCategoryID" onchange="if (this.options[this.selectedIndex].value != 0) this.form.submit();">
						<option value="0"></option>
						{htmlOptions options=$languageCategories selected=$languageCategoryID}
					</select>
					{if $errorField == 'languageCategoryID'}
						<p class="innerError">
							{if $errorType == 'empty'}{lang}wcf.global.error.empty{/lang}{/if}
						</p>
					{/if}
				</div>
			</div>
			
			<div class="formElement">
				<div class="formField">
					<label><input onclick="this.form.submit()" type="checkbox" name="customVariables" value="1" {if $customVariables == 1}checked="checked" {/if}/> {lang}wcf.acp.language.showCustomVariables{/lang}</label>
				</div>
			</div>
		</div>
		
		<input type="hidden" name="form" value="LanguageEdit" />
		<input type="hidden" name="languageID" value="{@$languageID}" />
		<input type="hidden" name="packageID" value="{@PACKAGE_ID}" />
 		{@SID_INPUT_TAG}
 	</div>
</form>

{if $languageItems|count}
	<form method="post" action="index.php?form=LanguageEdit">
		{foreach from=$languageItems item=category}
			<div class="border content">
				<div class="container-1">
					<h3 class="subHeadline">{$category.category}</h3>
					{foreach from=$category.items key=$languageItem item=languageItemValue}
						<a id="languageItem{@$languageItemIDs.$languageItem}"></a>
						
						<fieldset>
							<legend>
								{if $this->user->getPermission('admin.language.canDeleteLanguage')}<a onclick="return confirm('{lang}wcf.acp.language.variable.delete.sure{/lang}')" href="index.php?action=LanguageVariableDelete&amp;languageItem={$languageItem}&amp;languageID={@$languageID}&amp;languageCategoryID={@$languageCategoryID}&amp;packageID={@PACKAGE_ID}{@SID_ARG_2ND}"><img src="{@RELATIVE_WCF_DIR}icon/deleteS.png" alt="" title="{lang}wcf.acp.language.variable.delete{/lang}" /></a>{/if}
								<label for="languageCustomItems-{$languageItem}">{$languageItem}</label>
							</legend>
							
							<div class="formElement">
								<div class="formFieldLabel">
									<label for="languageItems-{$languageItem}">{lang}wcf.acp.language.value{/lang}</label>
								</div>
								<div class="formField">
									<textarea readonly="readonly" rows="5" cols="60" class="textareaSmall" onfocus="this.className=''; document.getElementById('languageCustomItems-{$languageItem}').className=''; this.select();" onblur="this.className='textareaSmall'; document.getElementById('languageCustomItems-{$languageItem}').className='textareaSmall'" id="languageItems-{$languageItem}">{$languageItemValue}</textarea>
								</div>
							</div>
							<div class="formElement">
								<div class="formFieldLabel">
									<label for="languageCustomItems-{$languageItem}">{lang}wcf.acp.language.customValue{/lang}</label>
								</div>
								<div class="formField">
									<textarea rows="5" cols="60" class="textareaSmall" onfocus="this.className=''; document.getElementById('languageItems-{$languageItem}').className=''; this.select();" onblur="this.className='textareaSmall'; document.getElementById('languageItems-{$languageItem}').className='textareaSmall'" onchange="document.getElementById('languageUseCustom-{$languageItem}').checked=true" name="languageItems[{$languageItem}]" id="languageCustomItems-{$languageItem}">{if $languageCustomItems.$languageItem}{$languageCustomItems.$languageItem}{/if}</textarea>
									<label><input type="checkbox" name="languageUseCustom[{$languageItem}]" id="languageUseCustom-{$languageItem}" value="1" {if !$languageUseCustom.$languageItem|empty}checked="checked" {/if}/> {lang}wcf.acp.language.useCustomValue{/lang}</label>
								</div>
							</div>
						</fieldset>
						
						{if $languageItemID == $languageItemIDs.$languageItem}
							<script type="text/javascript">
								//<![CDATA[
								document.getElementById('languageItems-{$languageItem}').focus();
								//]]>
							</script>
						{/if}
					{/foreach}
				</div>
			</div>
		{/foreach}
		
		{if $additionalFields|isset}{@$additionalFields}{/if}
		
		<div class="formSubmit">
			<input type="submit" accesskey="s" value="{lang}wcf.global.button.submit{/lang}" />
			<input type="reset" accesskey="r" value="{lang}wcf.global.button.reset{/lang}" />
			<input type="hidden" name="packageID" value="{@PACKAGE_ID}" />
	 		{@SID_INPUT_TAG}
	 		<input type="hidden" name="languageCategoryID" value="{@$languageCategoryID}" />
	 		<input type="hidden" name="customVariables" value="{@$customVariables}" />
	 		<input type="hidden" name="languageID" value="{@$languageID}" />
	 	</div>
	</form>
{/if}

{include file='footer'}