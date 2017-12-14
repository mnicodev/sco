jQuery(document).ready(function () {
	jQuery("#retour_haut").click(function(event) {
		event.preventDefault();
		jQuery('html,body').animate({scrollTop: 0}, 1000 );
	
	})	
	jQuery(window).scroll(
			function () {
				if(jQuery(window).scrollTop()>300) {
					
					jQuery("#retour_haut").fadeIn();
				} else {
					
					jQuery("#retour_haut").fadeOut();
				}
	
			}
	)

	jQuery('.selectpicker').selectpicker({
	  style: 'btn-info',
	  size: 5,
	});

	jQuery("#form_select_tags").find("select").change(function() {
		window.location=jQuery(this).val();
	})


	jQuery("#burger").find(".burger").click(function () {
		if(jQuery("#block-menu-menu-menu-institutionnel").is(":visible")) {
			jQuery("#block-menu-menu-menu-institutionnel").hide();
			jQuery(this).removeClass("fermer");
		}else {
			jQuery("#block-menu-menu-menu-institutionnel").show();
			jQuery(this).addClass("fermer");
		}
	})
	
	jQuery(window).resize(function () {
		var screenLg = jQuery('body').width() >= 992;
		if(screenLg) jQuery("#block-menu-menu-menu-institutionnel").show();
		else {
			jQuery("#block-menu-menu-menu-institutionnel").hide();
			jQuery("#burger").find(".burger").removeClass("fermer");
		}

		console.log(jQuery("#autour_du_club").find(".bx-viewport").height());
	})
	
	
	jQuery("#toolbar").find(".home a").click(function (e) {
		e.preventDefault();
	})

	jQuery("#form_select_tags").find(".caret").click(function() {
		if(jQuery("#form_select_tags").find(".selection-tags").is(":visible")) {
			jQuery("#form_select_tags").find(".selection-tags").hide();
			jQuery("#form_select_tags").find(".all-item").css("overflow","hidden");
			jQuery("#form_select_tags").find(".all-item").css("height","45px");
			select_all_actu=0;
		} else {
			jQuery("#form_select_tags").find(".selection-tags").show();
			jQuery("#form_select_tags").find(".all-item").css("overflow","auto");
			jQuery("#form_select_tags").find(".all-item").css("height","auto");
		}

	})

	jQuery(".recherche").click(function() {
		if(jQuery("#block-search-form").is(":visible")) {
			jQuery("#block-search-form").hide();
			jQuery(this).removeClass("fermer");
		} else {
			jQuery("#block-search-form").show();
			jQuery(this).addClass("fermer");
		}
	})


	jQuery(".bloc-actualite").find(".views-row").click(function() {
		url=jQuery(this).find("a").attr("href");
		window.location=url;
	})

	jQuery(".view-galerie-photos").find(".survol").click(function() {
		jQuery(this).parent().find("a").click();
	})

	jQuery(".bloc-album").find(".views-row").click(function() {

		url=jQuery(this).parent().find("a").attr("href");
		window.location=url;
	})

	jQuery(".cliquable").click(function() {
		window.location=jQuery(this).find("a").attr("href");
	})


	jQuery(".promo").find(".profite").click(function() {
		url=jQuery(this).parent().find("a").attr("href");
		window.location=url;
	})

})

function download_img(o) {
		img=jQuery(o).parent().find("a").attr("href");
		window.open(img,"","");

}