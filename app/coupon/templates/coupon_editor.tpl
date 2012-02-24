<div class="coupon_editor">
        {get_message id="coupon_info"}
	
        <h1>Nastaveni slevovych kuponu</h1>
	<form action="" method="post">
            <input type="hidden" name="app" value="coupon" />
            <input type="hidden" name="method" value="coupon_create" />
            <label for="from">Platne od</label><input type="text" name="valid_from" id="from"/>
            <label for="to">Platne do</label><input type="text" name="valid_to" id="to" />
            <label for="value">Hodnota</label><input type="text" name="value" id="value" />
            <input type="submit" value="Vytvorit kupon" />
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