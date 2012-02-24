<div class="coupon_editor">
	<h1>Nastaveni slevovych kuponu</h1>
	<form action="" method="post">
            <label for="from">Platne od</label><input type="text" name="valid_from" id="from"/>
            <label for="to">Platne do</label><input type="text" name="valid_to" id="to" />
            <label for="value">Hodnota</label><input type="text" name="value" id="value" />
        </form>
        
        <h1>Neouzite kupony</h1>
        {foreach from=$nonused item=$u}
            <div>{$u.valid_from} - {$u.valid_to} = {$u.value}</div>
        {/foreach}
        <h1>Pouzite kupony</h1>
        {foreach from=$used item=u}
            <div>{$u.code} -> {$u.valid_from} - {$u.valid_to} = {$u.value}</div>
        {/foreach}
        
</div>