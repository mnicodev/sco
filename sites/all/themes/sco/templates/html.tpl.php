<!DOCTYPE html>
<html lang="<?php print $language->language; ?>" dir="<?php print $language->dir; ?>">

<head>
<meta name="google-site-verification" content="" />
  <meta name="viewport" content="width=device-width, minimum-scale=0.25, maximum-scale=1.6, initial-scale=1.0" />
	<meta name="apple-mobile-web-app-capable" content="yes" />
	<meta name="robots" content="index,follow" />
	<?php if($is_front): ?><meta name="keywords" content="<?php print theme_get_setting('keywords','sco'); ?>" /><?php endif ?>
  <?php print $head; ?>
  <title><?php print $head_title; ?></title>
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <?php print $styles; ?>
  <?php print $scripts; ?>
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">

<!-- Google Tag Manager -->

<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':

new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],

j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=

'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);

})(window,document,'script','dataLayer','GTM-KB7SMM2');</script>

<!-- End Google Tag Manager -->

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-*.min.js"></script>

  <?php if($is_front): ?>
	<link rel="stylesheet" type="text/css" href="/sites/all/libraries/jquery-social-stream/css/dcsns_wall.css" media="all" />

	<script src="/sites/all/libraries/jquery-social-stream/js/jquery.social.stream.wall.1.8.js"></script>
	<script src="/sites/all/libraries/jquery-social-stream/js/jquery.social.stream.1.6.2.js"></script>
  <?php endif; ?>
  <script>
  jQuery(document).ready(function () {
  		jQuery('.slider-home').bxSlider({
		  mode: 'fade',
		  captions: true,
		 auto: true
		});
  	
  <?php if($is_front): ?>
        jQuery('#autour_du_club ul').bxSlider({
            mode: 'horizontal',
            minSlides: 1,
            maxSlides: 4,
            moveSlides: 1,
            slideWidth: 218,
            pager: false,
			slideMargin: 1,
			infiniteLoop: false,
			hideControlOnEnd: true,
  })
  <?php endif; ?>

  })
  	
  </script>

  
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->
</head>

<body class="<?php print $classes; ?> sco" <?php print $attributes;?>>
<!-- Google Tag Manager (noscript) -->

<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-KB7SMM2"

height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<a id="retour_haut" style=""></a>
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>
</body>

</html>
