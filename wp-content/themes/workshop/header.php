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

	var HOMEURL = "<?php bloginfo( 'url' ); ?>";
	var THEMEURL = "<?php bloginfo( 'stylesheet_directory' ); ?>";

	WebFontConfig = {
	google: { families: [ 'Alegreya+Sans:400,400italic,500,500italic,300,300italic:latin' ] },
		custom: {
		families: [
		 'Canela Web'
		],
		urls: [
		 THEMEURL +'/assets/fonts/fonts.css'
		]
	},
	timeout: 2000
   };

   (function(d) {
      var wf = d.createElement('script'), s = d.scripts[0];
      wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js';
      s.parentNode.insertBefore(wf, s);
   })(document);

</script>
<?php wp_head(); ?>

<body <?php body_class(); ?>>

<!--[if lt IE 10]>
    <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
