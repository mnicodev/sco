jQuery(document).ready(function () {
	jQuery("#burger").find(".burger").click(function () {
		if(jQuery("#block-system-main-menu").is(":visible")) {
			jQuery("#block-system-main-menu").hide();
			jQuery(this).removeClass("fermer");
		}else {
			jQuery("#block-system-main-menu").show();
			jQuery(this).addClass("fermer");
		}
	})
	
	jQuery(window).resize(function () {
		var screenLg = jQuery('body').width() >= 768;
		if(screenLg) jQuery("#block-system-main-menu").show();
		else {
			jQuery("#block-system-main-menu").hide();
			jQuery("#burger").find(".burger").removeClass("fermer");
		}
	})
})