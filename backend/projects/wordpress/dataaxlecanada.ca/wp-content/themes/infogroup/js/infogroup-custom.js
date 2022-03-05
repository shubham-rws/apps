jQuery(document).ready(function() {

	var basOfferQSP = getParameterByName('bas_offer');

	var basOfferCookie = Cookies.get('bas_offer');

	var currentRegLink = jQuery('#menu-item-998 a').attr('href');

	if (basOfferQSP) {

		Cookies.set('bas_offer', basOfferQSP, { expires: 30 });

		var regLinkAppend = '&bas_offer=' + basOfferQSP;

		jQuery('#menu-item-998 a').attr('href', currentRegLink.concat(regLinkAppend));

	} else if (basOfferCookie) {

		var regLinkAppend = '&bas_offer=' + basOfferCookie;

		jQuery('#menu-item-998 a').attr('href', currentRegLink.concat(regLinkAppend));

	} else {

		jQuery('#menu-item-998 a').attr('href', currentRegLink.concat('&bas_offer=08WEB'));

	}

});