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

	var menu=null;
	if(jQuery("#block-menu-menu-menu-entreprise").length) menu="#block-menu-menu-menu-entreprise";
	else menu="#block-menu-menu-menu-prive-entreprise";
	jQuery("#burger").find(".burger").click(function () {
		if(jQuery(menu).is(":visible")) {
			jQuery(menu).hide();
			jQuery(this).removeClass("fermer");
		}else {
			jQuery(menu).show();
			jQuery(this).addClass("fermer");
		}
	})
	
	jQuery(window).resize(function () {
		var screenLg = jQuery('body').width() >= 760;
		if(screenLg) jQuery(menu).show();
		/*else {
			jQuery(menu).hide();
			jQuery("#burger").find(".burger").removeClass("fermer");
		}*/
	})
	
	
	jQuery("#toolbar").find(".home a").click(function (e) {
		e.preventDefault();
	})

	jQuery("#form_select_tags").find(".caret").click(function() {
		if(jQuery("#form_select_tags").find(".selection-tags").is(":visible")) {
			jQuery("#form_select_tags").find(".selection-tags").hide();
			jQuery("#form_select_tags").find(".all-item").css("overflow","hidden");
			jQuery("#form_select_tags").find(".all-item").css("height","45px");
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

	jQuery(".bloc-actualite").find(".views-row").find(".field-type-image").hover(function() {
		jQuery(this).append("<div class='survol'></div>");
	}, function() {
		jQuery(this).find(".survol").remove();
	});
	jQuery(".bloc-joueur").find(".views-row").find(".field-type-image").hover(function() {
		jQuery(this).append("<div class='survol'></div>");
	}, function() {
		jQuery(this).find(".survol").remove();

	});


	jQuery(".nos-offres").find(".form-item a").click(function() {
		jQuery(this).addClass("active");
	})


	jQuery(".annuaire .view-partenaires").find(".views-field-name").click(function() {
		window.location=jQuery(this).find("a").attr("href");
	})

	jQuery(".cliquable").click(function() {
		window.location=jQuery(this).find("a").attr("href");
	})


})