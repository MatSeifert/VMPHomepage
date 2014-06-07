{include file='header'}

<div class="mainHeadline">
	<img src="{@RELATIVE_WCF_DIR}icon/packageSearchL.png" alt="" />
	<div class="headlineContainer">
		<h2>{lang}wcf.acp.packageUpdate.search{/lang}</h2>
	</div>
</div>

{if $errorField != ''}
	<p class="error">{lang}wcf.acp.packageUpdate.noneAvailable{/lang}</p>
{/if}

{if !$updateServers|count}
	<p class="warning">{lang}wcf.acp.updateServer.view.noneAvailable{/lang}</p>
{else}
	<form method="post" action="index.php?form=PackageUpdateSearch">
		<div class="border content">
			<div class="container-1">
			
				<fieldset>
					<legend>{lang}wcf.acp.packageUpdate.search.server{/lang}</legend>
					
					<div>
						<div class="formElement">
							<div class="formField">
								<label><input type="checkbox" name="checkUncheck" value="" onclick="checkUncheckAll(document.getElementById('updateServerList'));" /> {lang}wcf.acp.packageUpdate.search.server.all{/lang}</label> 
							</div>
						</div>
						
						<div id="updateServerList">
							{foreach from=$updateServers item=updateServer}
								<div class="formElement">
									<div class="formField">
										<label><input type="checkbox" name="packageUpdateServerIDs[]" value="{@$updateServer.packageUpdateServerID}" {if $updateServer.packageUpdateServerID|in_array:$packageUpdateServerIDs}checked="checked" {/if}/> {$updateServer.server}</label>
									</div>
								</div>
							{/foreach}
						</div>
					</div>
				</fieldset>
				
				<fieldset>
					<legend>{lang}wcf.acp.packageUpdate.search.conditions{/lang}</legend>
					
					<div>
						<div class="formElement">
							<div class="formFieldLabel">
								<label for="packageName">{lang}wcf.acp.packageUpdate.search.packageName{/lang}</label>
							</div>
							<div class="formField">
								<input type="text" class="inputText" id="packageName" name="packageName" value="{$packageName}" />
								<label><input type="checkbox" name="searchDescription" value="1" {if $searchDescription == 1}checked="checked" {/if}/> {lang}wcf.acp.packageUpdate.search.searchDescription{/lang}</label>
							</div>
						</div>
						
						<div class="formElement">
							<div class="formFieldLabel">
								<label for="author">{lang}wcf.acp.packageUpdate.search.author{/lang}</label>
							</div>
							<div class="formField">
								<input type="text" class="inputText" id="author" name="author" value="{$author}" />
							</div>
						</div>
						
						<div class="formElement">
							<div class="formFieldLabel">
								<label>{lang}wcf.acp.packageUpdate.search.type{/lang}</label>
							</div>
							
							<div class="formField">
								<label><input type="checkbox" name="standalone" value="1" {if $standalone == 1}checked="checked" {/if}/> {lang}wcf.acp.packageUpdate.search.type.standalone{/lang}</label> 
							</div>
							<div class="formField">
								<label><input type="checkbox" name="plugin" value="1" {if $plugin == 1}checked="checked" {/if}/> {lang}wcf.acp.packageUpdate.search.type.plugin{/lang}</label> 
							</div>
							<div class="formField">
								<label><input type="checkbox" name="other" value="1" {if $other == 1}checked="checked" {/if}/> {lang}wcf.acp.packageUpdate.search.type.other{/lang}</label> 
							</div>
						</div>
						<div class="formElement">
							<div class="formField">
								<label><input type="checkbox" name="ignoreUniques" value="1" {if $ignoreUniques == 1}checked="checked" {/if}/> {lang}wcf.acp.packageUpdate.search.ignoreUniques{/lang}</label> 
							</div>
						</div>
					</div>
				</fieldset>
			</div>
		</div>
		
		<div class="formSubmit">
			<input type="submit" accesskey="s" value="{lang}wcf.global.button.submit{/lang}" />
			<input type="reset" accesskey="r" value="{lang}wcf.global.button.reset{/lang}" />
			<input type="hidden" name="packageID" value="{@PACKAGE_ID}" />
	 		{@SID_INPUT_TAG}
	 	</div>
	</form>

{/if}

{include file='footer'}
