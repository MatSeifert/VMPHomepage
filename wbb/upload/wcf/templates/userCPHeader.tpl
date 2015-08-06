<ul class="breadCrumbs">
	<li><a href="index.php?page=Index{@SID_ARG_2ND}"><img src="{icon}indexS.png{/icon}" alt="" /> <span>{lang}{PAGE_TITLE}{/lang}</span></a> &raquo;</li>
</ul>
<div class="mainHeadline">
	<img src="{icon}profileEditL.png{/icon}" alt="" />
	<div class="headlineContainer">
		<h2>{lang}wcf.user.usercp{/lang}</h2>
	</div>
</div>

{if $userMessages|isset}{@$userMessages}{/if}

<div id="profileEditContent" class="tabMenu">
	<ul>
		{foreach from=$this->getUserCPMenu()->getMenuItems('') item=item}
			<li{if $item.menuItem|in_array:$this->getUserCPMenu()->getActiveMenuItems()} class="activeTabMenu"{/if}><a href="{$item.menuItemLink}">{if $item.menuItemIcon}<img src="{$item.menuItemIcon}" alt="" /> {/if}<span>{lang}{@$item.menuItem}{/lang}</span></a></li>
		{/foreach}
	</ul>
</div>
<div class="subTabMenu">
	<div class="containerHead">
		{assign var=activeMenuItem value=$this->getUserCPMenu()->getActiveMenuItem()}
		{if $activeMenuItem && $this->getUserCPMenu()->getMenuItems($activeMenuItem)|count}
			<ul>
				{foreach from=$this->getUserCPMenu()->getMenuItems($activeMenuItem) item=item}
					<li{if $item.menuItem|in_array:$this->getUserCPMenu()->getActiveMenuItems()} class="activeSubTabMenu"{/if}><a href="{$item.menuItemLink}">{if $item.menuItemIcon}<img src="{$item.menuItemIcon}" alt="" /> {/if}<span>{lang}{@$item.menuItem}{/lang}</span></a></li>
				{/foreach}
			</ul>
		{else}
			<div> </div>
		{/if}
	</div>
</div>