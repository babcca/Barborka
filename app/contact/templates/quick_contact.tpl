<div class="">
	<address>
		{foreach from=$contact item=val key=key} 
			{if $key == 'mail'}{mailto address=$val encode="hex"}{else}{$val}{/if}<br/>
		{/foreach}
	</address>
</div>