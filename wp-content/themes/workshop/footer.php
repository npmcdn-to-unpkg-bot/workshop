<?php $copyright= get_field('copyright'); ?>
<footer id="footer">
	<span class="small">
		<?php if( $copyright ) { echo $copyright; } ?> <?php echo date("Y"); ?>.
	</span>
</footer>
<!-- JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src='//maps.googleapis.com/maps/api/js?v=3.exp&sensor=false'></script>
<script src="<?php bloginfo ( 'stylesheet_directory' ); ?>/assets/js/vendors.min.js"></script>
<script src="<?php bloginfo ( 'stylesheet_directory' ); ?>/assets/js/custom.min.js"></script>
<?php if ( is_home() ) { ?>
<?php } ?>
<?php wp_footer(); ?>
</body>
</html>
