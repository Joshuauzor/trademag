/**	STYLE SWITCHER
*************************************************** **/
jQuery(document).ready(function() {
	"use strict";

    jQuery("#hideSwitcher, #showSwitcher").click(function () {

        if (jQuery("#showSwitcher").is(":visible")) {

			var _identifier = "#showSwitcher";
            jQuery("#switcher").animate({"margin-left": "0px"}, 500).show();
			createCookie("switcher_visible", 'true', 365);

        } else {

			var _identifier = "#switcher";
            jQuery("#showSwitcher").show().animate({"margin-left": "0"}, 500);
			createCookie("switcher_visible", 'false', 365);

        }

		jQuery(_identifier).animate({"margin-left": "-500px"}, 500, function () {
			jQuery(this).hide();
		});

    });
	
	var orange = true;
		var green = false;
		var blue = false;
		$('#orange-css').on('click', function () {
			
			orange = true;
			green = false;
		    blue = false;
			setActiveStyleSheet('orange'); 
			var logouser = $('#logo-user');
			if (logouser.length) {
				document.getElementById('logo-user').src='https://www.templateshub.net/';
			}
			var aboutimg = $('#about-us');
			if (aboutimg.length) {
				document.getElementById('about-us').src='images/about-us.png';
			}
			var aboutimg = $('#about-us');
			if (aboutimg.length) {
				document.getElementById('about-us').src='https://www.templateshub.net/';
			}
			if($('#is_light').is(':checked')){ 
				document.getElementById('logo').src='https://www.templateshub.net/';
				document.getElementById('logo-mobile').src='https://www.templateshub.net/';
			}
			else {
				document.getElementById('logo').src='https://www.templateshub.net/';
				document.getElementById('logo-mobile').src='https://www.templateshub.net/';
			}	
			document.getElementById('download-bitcoin').src='images/icons/orange/download-bitcoin.png';
			document.getElementById('add-bitcoins').src='images/icons/orange/add-bitcoins.png';
			document.getElementById('buy-sell-bitcoins').src='images/icons/orange/buy-sell-bitcoins.png';
			document.getElementById('strong-security').src='images/icons/orange/strong-security.png';
			document.getElementById('world-coverage').src='images/icons/orange/world-coverage.png';
			document.getElementById('payment-options').src='images/icons/orange/payment-options.png';
			document.getElementById('mobile-app').src='images/icons/orange/mobile-app.png';
			document.getElementById('cost-efficiency').src='images/icons/orange/cost-efficiency.png';
			document.getElementById('high-liquidity').src='images/icons/orange/high-liquidity.png';
		});
		
		$('#green-css').on('click', function () {
			orange = false;
			green = true;
		    blue = false;
			setActiveStyleSheet('green'); 
			var logouser = $('#logo-user');
			if (logouser.length) {
				document.getElementById('logo-user').src='https://www.templateshub.net/';
			}
			var aboutimg = $('#about-us');
			if (aboutimg.length) {
				document.getElementById('about-us').src='https://www.templateshub.net/';
			}
			if($('#is_light').is(':checked')){ 
				document.getElementById('logo').src='https://www.templateshub.net/';
				document.getElementById('logo-mobile').src='https://www.templateshub.net/';
			}
			else {
				document.getElementById('logo').src='https://www.templateshub.net/';
				document.getElementById('logo-mobile').src='https://www.templateshub.net/';
			}
			
			document.getElementById('download-bitcoin').src='https://www.templateshub.net/';
			document.getElementById('add-bitcoins').src='https://www.templateshub.net/';
			document.getElementById('buy-sell-bitcoins').src='https://www.templateshub.net/';
			document.getElementById('strong-security').src='https://www.templateshub.net/';
			document.getElementById('world-coverage').src='https://www.templateshub.net/';
			document.getElementById('payment-options').src='https://www.templateshub.net/';
			document.getElementById('mobile-app').src='https://www.templateshub.net/';
			document.getElementById('cost-efficiency').src='https://www.templateshub.net/';
			document.getElementById('high-liquidity').src='https://www.templateshub.net/';
		});
		
		$('#blue-css').on('click', function () {
			orange = false;
			green = false;
		    blue = true;
			setActiveStyleSheet('blue'); 
			var logouser = $('#logo-user');
			if (logouser.length) {
				document.getElementById('logo-user').src='https://www.templateshub.net/';
			}
			var aboutimg = $('#about-us');
			if (aboutimg.length) {
				document.getElementById('about-us').src='https://www.templateshub.net/';
			}
			if($('#is_light').is(':checked')){ 
				document.getElementById('logo').src='https://www.templateshub.net/';
				document.getElementById('logo-mobile').src='https://www.templateshub.net/';
			}
			else {
				document.getElementById('logo').src='https://www.templateshub.net/';
				document.getElementById('logo-mobile').src='https://www.templateshub.net/';
			}	
			document.getElementById('download-bitcoin').src='https://www.templateshub.net/';
			document.getElementById('add-bitcoins').src='https://www.templateshub.net/';
			document.getElementById('buy-sell-bitcoins').src='https://www.templateshub.net/';
			document.getElementById('strong-security').src='https://www.templateshub.net/';
			document.getElementById('world-coverage').src='https://www.templateshub.net/';
			document.getElementById('payment-options').src='https://www.templateshub.net/';
			document.getElementById('mobile-app').src='https://www.templateshub.net/';
			document.getElementById('cost-efficiency').src='https://www.templateshub.net/';
			document.getElementById('high-liquidity').src='https://www.templateshub.net/';
		});
	
	$('#is_dark').on('click', function() {
		$('.chart-1').css('opacity','1'); 
		 $('.chart-1').css('z-index','1'); 
		 $('.chart-2').css('opacity','0');
		$('.chart-2').css('z-index','-1');	
		$('.chart-2').css('height','0');
		$('.chart-1').css('height','auto');	
		$('.chart-2').css('margin','0');
		$('.chart-1').css('margin','70px 0');	
		if (orange == true) {
			document.getElementById('logo').src='images/logo-dark.png';
			document.getElementById('logo-mobile').src='images/logo-dark.png';
		}
		else if (green == true) {
			document.getElementById('logo').src='https://www.templateshub.net/';
			document.getElementById('logo-mobile').src='https://www.templateshub.net/';
		}
		else {
			document.getElementById('logo').src='https://www.templateshub.net/';
				document.getElementById('logo-mobile').src='https://www.templateshub.net/';
		}
		 			
		 });
		 $('#is_light').on('click', function() {
			 $('.chart-1').css('opacity','0'); 
		 $('.chart-2').css('opacity','1'); 
		 $('.chart-2').css('z-index','1');
		 $('.chart-1').css('z-index','-1');
		 $('.chart-1').css('height','0');	
		 $('.chart-2').css('height','auto');	
			$('.chart-1').css('margin','0');
			$('.chart-2').css('margin','70px 0');
		if (orange == true) {
			document.getElementById('logo').src='https://www.templateshub.net/';
			document.getElementById('logo-mobile').src='https://www.templateshub.net/';
		}
		else if (green == true) {
			document.getElementById('logo').src='https://www.templateshub.net/';
			document.getElementById('logo-mobile').src='https://www.templateshub.net/';
		}
		else {
			document.getElementById('logo').src='https://www.templateshub.net/';
				document.getElementById('logo-mobile').src='https://www.templateshub.net/';
		}
		 
		 });
                      
});

function setActiveStyleSheet(title) {
	var i, a, main;
	for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
		if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
			a.disabled = true;
			if(a.getAttribute("title") == title) { a.disabled = false; }
		}
	}

	// DARK SKIN
	var color_skin = readCookie('color_skin');
	if(color_skin == 'dark') {
		jQuery("#css_dark_skin").remove();
		jQuery("head").append('<link id="css_dark_skin" href="assets/css/layout-dark.css" rel="stylesheet" type="text/css" title="dark" />');
		jQuery("#is_dark").trigger('click');
		jQuery("a.logo img").attr('src', 'https://www.templateshub.net/');
	}
}

function getActiveStyleSheet() {
	var i, a;
	for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
		if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title") && !a.disabled) { return a.getAttribute("title"); }
	}

	return null;
}

function getPreferredStyleSheet() {
	var i, a;
	for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
		if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("rel").indexOf("alt") == -1 && a.getAttribute("title")) { 
			return a.getAttribute("title"); 
		}
	}

	return null;
}

function createCookie(name,value,days) {
	if (days) {
		var date = new Date();
		date.setTime(date.getTime()+(days*24*60*60*1000));
		var expires = "; expires="+date.toGMTString();
	} else {
		expires = "";
	}	document.cookie = name+"="+value+expires+";";
}

function readCookie(name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];

		while (c.charAt(0)==' ') {
			c = c.substring(1,c.length);
		}

		if (c.indexOf(nameEQ) == 0) {
			return c.substring(nameEQ.length,c.length);
		}
	}

	return null;
}


/** ********************************************************************************************************** **/
/** ********************************************************************************************************** **/
/** ********************************************************************************************************** **/

/**
	@ON LOAD
**/
window.onload = function(e) {

	// COLOR SCHEME
	var cookie = readCookie("style");
	var title = cookie ? cookie : getPreferredStyleSheet();
	setActiveStyleSheet(title);

	// SWITCHER OPEN|CLOSED
	var switcher_visible = 'false';
	if(switcher_visible != 'false') {
		jQuery("#showSwitcher").trigger('click');
	}

	// DARK OR LIGHT
	var is_light = readCookie('is_light');
	if(is_boxed == 'true') {
		jQuery('body').removeClass('light');
		jQuery('body').addClass('light');
		jQuery("#is_light").trigger('click');
	}

	// BOXED or WIDE
	var is_boxed = readCookie('is_boxed');
	if(is_boxed == 'true') {
		jQuery('body').removeClass('boxed');
		jQuery('body').addClass('boxed');
		jQuery("#is_boxed").trigger('click');
	}
	
}


/**
	COLOR SKIN [light|dark]
**/
jQuery("input.dark_switch").bind("click", function() {
	var boxed_switch = jQuery(this).attr('value');

	if(boxed_switch == 'light') {
		jQuery("body").removeClass('light');
		jQuery("body").addClass('light');
		createCookie("is_dark", 'true', 365);
	} else {
		jQuery("body").removeClass('light');
		createCookie("is_dark", '', -1);
		jQuery('body').removeClass('transparent');
	}
});





/**
	LAYOUT STYLE [wide|boxed]
**/
jQuery("input.boxed_switch").bind("click", function() {
	var boxed_switch = jQuery(this).attr('value');

	if(boxed_switch == 'boxed') {
		jQuery("body").removeClass('boxed');
		jQuery("body").addClass('boxed');
		createCookie("is_boxed", 'true', 365);
	} else {
		jQuery("body").removeClass('boxed');
		createCookie("is_boxed", '', -1);
		jQuery('body').removeClass('transparent');
	}
});



/**
	SEPARATOR STYLE [Normal|Skew|Reversed Skew|Double Diagonal|Big Triangle]
**/
jQuery("input.separator_switch").bind("click", function() {
	var separator_switch = jQuery(this).attr('value');

	if(separator_switch == 'skew') {
		jQuery("body").removeClass('reversed-skew');
		jQuery("body").removeClass('double-diagonal');
		jQuery("body").removeClass('big-triangle');
		jQuery("body").addClass('skew');
		createCookie("is_skew", 'true', 365);
	}
	
	else if(separator_switch == 'reversed-skew') {
		jQuery("body").removeClass('skew');
		jQuery("body").removeClass('double-diagonal');
		jQuery("body").removeClass('big-triangle');
		jQuery("body").addClass('reversed-skew');
		createCookie("is_reversed_skew", 'true', 365);
	}
	
	else if(separator_switch == 'double-diagonal') {
		jQuery("body").removeClass('skew');
		jQuery("body").removeClass('reversed-skew');
		jQuery("body").removeClass('big-triangle');
		jQuery("body").addClass('double-diagonal');
		createCookie("is_double_diagonal", 'true', 365);
	}
	
	else if(separator_switch == 'big-triangle') {
		jQuery("body").removeClass('skew');
		jQuery("body").removeClass('reversed-skew');
		jQuery("body").removeClass('double-diagonal');
		jQuery("body").addClass('big-triangle');
		createCookie("is_big_triangle", 'true', 365);
	}
	
	else {
		jQuery("body").removeClass('skew');
		jQuery("body").removeClass('reversed-skew');
		jQuery("body").removeClass('double-diagonal');
		jQuery("body").removeClass('big-triangle');
		createCookie("is_normal", '', -1);
	}
});