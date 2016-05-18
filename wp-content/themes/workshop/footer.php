<footer id="footer">
	<span class="small">
		&copy; The Workshop <?php echo date("Y"); ?>.
	</span>
</footer>
<!-- JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src='//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js'></script>
<script src='//cdnjs.cloudflare.com/ajax/libs/classie/1.0.1/classie.js'></script>
<script src='http://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false'></script>
<script src="<?php bloginfo ( 'stylesheet_directory' ); ?>/assets/bower_components/instafeed.js/instafeed.min.js"></script>
<script src="<?php bloginfo ( 'stylesheet_directory' ); ?>/assets/js/vendors.min.js"></script>
<script src="<?php bloginfo ( 'stylesheet_directory' ); ?>/assets/js/custom.min.js"></script>
<?php if ( is_home() ) { ?>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
