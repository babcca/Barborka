<div id="cufon-menu">
	{foreach from=$menu item=menu_item}
		<a href="/{$menu_item.lang}/{$menu_item.uri}/"><div class="menu-item">{$menu_item.menu_title}</div></a>
	{/foreach}
</div>