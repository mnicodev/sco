jQuery(document).ready(function () {
	jQuery(".title-lang").click(function() {
		if(jQuery("#block-locale-language").find("ul").is(":visible"))jQuery("#block-locale-language").find("ul").hide();
		else jQuery("#block-locale-language").find("ul").show();
	})
})
