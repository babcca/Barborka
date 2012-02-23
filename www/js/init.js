// cufon element selector
Cufon.replace('#cufon-menu', { hover: { color: 'white' } });
Cufon.replace('.widgets');
Cufon.replace('.widgets a');
Cufon.replace('#weather');
Cufon.replace('#exchangeRates');
//

// jquery initialization
$(document).ready(function() {
	calendar_button_init(['date_from_quick', 'date_to_quick'], 0, 'dd-mm-yy');
	calendar_button_init(['date_from', 'date_to'], 0, 'dd-mm-yy');
	$('#slider').slider();
	$('#gallery a').lightBox();
	$('.tooltip').tipsy();
	$('#weather').weatherfeed(['EZXX0012'], {cufon: true});
	init_tinymce();
	$(".page_accordion").accordion();	
	
	$("#room_2").accordion({
		collapsible: true,
		active: false
	});
	$("#room_3").accordion({
		collapsible: true,
		active: false
	});
	
	$.get('/getxml.php', {}, XmlOnLoad);
});

/* Exchange rates */
function XmlOnLoad(xmlData, strStatus){
	var jData = $(xmlData);
	var jRate = jData.find("Cube [currency='CZK']");

	var jList = $("#exchangeRates");
	jList.append("1 EUR = ");
	jList.append(jRate.attr("rate"));
	jList.append(" CZK");
	Cufon.refresh("#exchangeRates");
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
	});	
}

function init_tinymce() {
   $('textarea.message').tinymce({
      // Location of TinyMCE script
      script_url : '/js/tiny_mce/tiny_mce.js',

      // General options
      theme : "advanced",
      plugins : "lists",

      // Theme options
      theme_advanced_buttons1 : "bold,italic,underline,|,|,bullist,numlist",
      theme_advanced_buttons2 : "",
      theme_advanced_buttons3 : "",
      theme_advanced_toolbar_location : "top",
      theme_advanced_toolbar_align : "left",
      content_css : "/css/tinymce.css",
      theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
      font_size_style_values : "10px,12px,13px,14px,16px,18px,20px"
   });
}
