<?php get_header(); 

$gallery_images = get_field('gallery_images');
$intro_text = get_field('intro_text');
$image_left = get_field('image_left');
$image_middle = get_field('image_middle');
$image_right = get_field('image_right');
$content_left = get_field('content_left');
$content_middle = get_field('content_middle');
$content_right = get_field('content_right');

?>

<section id="top">


    <div class="gallery js-flickity" data-flickity-options='{ "autoPlay": 6000, "pageDots": false, "imagesLoaded": false, "prevNextButtons": false, "lazyLoad": false, "accessibility": false, "draggable": false, "wrapAround": true }'>

        <?php foreach($gallery_images as $image) {
            
        echo '<div class="cell-full" style="width: 100%; height: 100%; background: url(' . $image['image'] . ') no-repeat center center; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;" ></div>';
            
        } ?>
        
    </div><!-- /gallery /js-flickity -->

    <div id="parent">
        <div id="child">
            <a href="#about" class="scroll"><img src="http://placehold.it/540x320" alt=""></a>
            <h3 class="tagline centered">Foo Bar Baz<br>
            </h3>
        </div>
    </div>        

</section>    

<!-- About Section -->
<section id="about">
    <div class="container-fluid cf-800 intro">
        <div class="row">
            <div class="col-sm-12">
                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde dolorem quis non ipsam reprehenderit dolorum totam aliquam quam veniam nam doloremque</h4>
            </div>
        </div>
    </div>  
</section>

<section id="services">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <img src="<?php if( $image_left ) { echo $image_left; } ?>" alt="" />
                <?php if( $content_left ) { echo $content_left; } ?>
            </div>
            <div class="col-sm-4">
                <img src="<?php if( $image_middle ) { echo $image_middle; } ?>" alt="" />
                <?php if( $content_middle ) { echo $content_middle; } ?>
            </div>
            <div class="col-sm-4">
                <img src="<?php if( $image_right ) { echo $image_right; } ?>" alt="" />
                <?php if( $content_right ) { echo $content_right; } ?>
            </div>
        </div>
    </div>
</section>

<section id="social">
    <div class="container-fluid cf-800">
        <div class="row">
            <div class="col-sm-12">
                <h4>Please come back and visit us soon when we finish our new site. In the meantime check us out on social media:</h4>
            </div>
        </div>
    </div> 

    <!-- Flickity HTML init -->
    <div id="instafeed" class="insta-gallery"></div>

    <section id="contact">
        <div id="map-canvas"></div>
    </section>

</section>

<?php
get_footer();
