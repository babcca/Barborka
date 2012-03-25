<div style="width: 650px;">
<html>
<head>
</head>
	<body>
	<div style="background-color: #d8d4c4; font-family: Arial, Helvetica, sans-serif;">
		<div style="background-color: #b2a98a; height: 100px;">
		<img src="http://barka.apartments-barbora.com/img/logo.png" alt="logo" style="padding-left: 10px; height: 100px; width: 175px; float: left;"></div>
		<div style="padding: 10px;"><b style="font-size:20px;">Předběžná rezervace - potvrzení</b>	
		<p>This email was sent via booking form from website <b>ubytovani-apartmany.cz/</b><br />
		Please wait for us to confirm the reservation, we will contact you on email or phone as soon as possible.</p>
		
		<p>Your order id: <b>{$order_id}</b></p>
		
		<b>Original message:</b>
		
		<p>Guest informations:</p>
		
		- Name: <b>{$name}</b><br />
		- Email: <b>{$email}</b><br />
		- Phone: <b>{$phone}</b>
		
		<p>Reservation informations:</p>
		 
		- Check-in date: <b>{$date_from}</b><br />
		- Check-out date: <b>{$date_to}</b><br />
		- Check-in time: <b>{$arrival_time}</b><br />
		- Rooms: <b>{$rooms|@count}</b>
		
		{foreach from=$rooms item=room key=i}
		{if $room.guests != 0}
		<p>Room no. {$i}:<br />
		- Guests: <b>{$room.guests}</b><br/ >
		- Single beds: <b>{$room.beds_s}</b><br />
		- Double beds: <b>{$room.beds_d}</b><br />
		- Parking: <b>{$room.parking}</b></p>
		{/if}
		{/foreach}

		<p>Services:</p>
		- Breakfast: <b>{$breakfast}</b><br />
		- Transfer from airport: <b>{$transfer}</b>
	
		<p>Notes:</p>
		{$message}
		
		{if $coupon}
	     	<p>Slevovy kupon v hodnote: {$coupon.value} &#37;</p>
      {/if}
	
		První návštěva: {$visited}
		
		<div style="background-color: #1b1f26; font-size: 20px; color: #fff;"><p style="padding-left: 10px;">Total price: 
		<b>{if $coupon != false} {$calculated_price.result_price*(1-($coupon.value/100))} {else} {$calculated_price.result_price} {/if}</b>
		</p></div>
	</div>
	</body>
</html>
</div>