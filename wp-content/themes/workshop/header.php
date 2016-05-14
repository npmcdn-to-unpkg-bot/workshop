<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<script>
	var metas = document.getElementsByTagName('meta');
	var i;
	if (navigator.userAgent.match(/iPhone/i)) {
	  for (i=0; i<metas.length; i++) {
	    if (metas[i].name == "viewport") {
	      metas[i].content = "width=device-width, minimum-scale=1.0, maximum-scale=1.0";
	    }
	  }
	  document.addEventListener("gesturestart", gestureStart, false);
	}
	function gestureStart() {
	  for (i=0; i<metas.length; i++) {
	    if (metas[i].name == "viewport") {
	      metas[i].content = "width=device-width, minimum-scale=0.25, maximum-scale=1.6";
	    }
	  }
	}
</script>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'>
<link rel='stylesheet prefetch' href='//cdnjs.cloudflare.com/ajax/libs/flickity/1.2.1/flickity.min.css'>
<link href="<?php bloginfo ( 'stylesheet_directory' ); ?>/style.css" rel="stylesheet" type="text/css"> <!-- swap up to .min.css for export -->
<script src="//ajax.aspnetcdn.com/ajax/jQuery/jquery-2.1.4.min.js"></script>
<?php wp_head(); ?>

<body <?php body_class(); ?>>

<!--[if lt IE 10]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

<header id="header">

	<nav class="site-nav" role="navigation">
		<?php

		$defaults = array(
		'theme_location' => '',
		'menu' => '',
		'container' => '',
		'menu_class' => 'nav',
		'menu_id' => 'main-nav'
		);

		// wp_nav_menu( $defaults );

		?>
	</nav>	

</header> 