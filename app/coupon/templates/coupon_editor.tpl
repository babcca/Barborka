<div class="coupon_editor">
<style>
.cupon-table {
width: 600px;
}
.cupon-table th {
background: #c0c0c0;
}
</style>
        {get_message id="coupon_info"}
	
        <h1>Nastaveni slevovych kuponu</h1>
	<form action="" method="post">
            <input type="hidden" name="app" value="coupon" />
            <input type="hidden" name="method" value="coupon_create" />
            <label for="from">Platne od:</label><input type="text" name="valid_from" id="from"/><br />
            <label for="to">Platne do:</label><input type="text" name="valid_to" id="to" /><br />
            <label for="value">Hodnota slevy (v %):</label><input type="text" name="value" id="value" /><br />
            <label for="code">Kod kuponu:</label><input type="text" name="code" id="code" value=""/><br />
            <input type="button" value="Generuj kod" onclick="getCode('code');" />
            <input type="submit" value="Vytvorit kupon" />
        </form>
        
        <h1>Nepouzite kupony</h1>
        <table class="cupon-table">
        <tr>
        		<th>Kod</th><th>Platne od</th><th>Platne do</th><th>Hodnota slevy</th>
        </tr>
        {foreach from=$nonused item=u}
				<tr>            
            <td>{$u.code}</td><td>{$u.valid_from}</td><td>{$u.valid_to}</td><td>{$u.value}%</td>
            </tr>
        {/foreach}
        </table>
        
        <h1>Pouzite kupony</h1>
        <table class="cupon-table">
        <tr>
        		<th>Kod</th><th>Platne od</th><th>Platne do</th><th>Hodnota slevy</th>
        </tr>
        {foreach from=$used item=u}
        		<tr>
            <td>{$u.code}</td><td>{$u.valid_from}</td><td>{$u.valid_to}</td><td>{$u.value}%</td>
            </tr>
        {/foreach}
        </table>  
</div>

<script>
    $(document).ready(function() { 
        calendar_button_init(["from", "to"], 0, 'dd-mm-yy');
    } );
    function getCode(dest) {
        $.post("/ajax.php", { app:"coupon", method:"coupon_generate" }, function(ret) {
            $('#'+dest).val(ret.code);
        }, 'json');
    }
    
    function calendar_button_init(element, min, dateF) {
	var dates = $("#"+element[0]+", #"+element[1]).datepicker( {
		minDate: min,
		showOn: "button",
		buttonImage: "/img/calendar.png",
		buttonImageOnly: true,
		buttonText: "Zobrazit kalendar",
		dateFormat: dateF,
		onSelect: function (selectedDate) {
			var sd = selectedDate.split('-');
			var new_date = new Date(parseInt(sd[2], 10), parseInt(sd[1], 10) - 1, parseInt(sd[0], 10)),
			option = this.id == element[0] ? "minDate" : "maxDate",
			num = this.id == element[0] ? +1 : -1;
			new_date.setDate(new_date.getDate() + num);
			dates.not(this).datepicker("option", option, $.datepicker.formatDate(dateF, new_date));
		}
	} );	
    }
</script>