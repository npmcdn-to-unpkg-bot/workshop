<?php get_header(); 

// $gallery_images = get_field('gallery_images');
$image1 = get_field('image1');

$slide_text = get_field('slide_overlay_text');
$image2 = get_field('image2');

$intro_text = get_field('intro_text');

$services_heading = get_field('services_heading');
$services = get_field('services');

$text_bar = get_field('text_bar');

$location_heading = get_field('location_heading');
$location = get_field('location');

$fb = get_field('facebook_link');
$tw = get_field('twitter_link');
$ins = get_field('instagram_link');

?>

<div id="loader_wrap"></div>

<section id="top">

    <div id="pagepiling">
        <div class="section" id="section1" style="background: url('<?php echo($image1)?>'); background-position: center center; background-repeat: no-repeat; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
            <a href="#" class="wordmark next"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/assets/img/workshop_logo.svg" alt="The Workshop"></a>
            <div class="overlay-layer"></div>
        </div>
        <div class="section" id="section2">
            <div class="overlay-layer"></div>
            <div class="intro">
                <h1><a style="display: inline-block;" href="#about" class="free scroll"><?php if( $slide_text ) { echo $slide_text; }  ?></a></h1>
            </div>
        </div>
    </div>  

</section>    

<section id="about">
    <div class="container-fluid cf-800 intro">
        <div class="row">
            <div class="col-sm-12">
                <h4 aos="fade-up" aos="aos-once"><?php echo($intro_text)?></h4>
            </div>
        </div>
    </div>  
</section>

<section id="services">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12" style="text-align: center;">
                <h2 aos="fade-up" aos="aos-once"><?php echo($services_heading)?></h2>
            </div>
        </div>
        
        <?php if($services) {
            
            $i = 0;

            foreach($services as $service) {
                // echo $i;
                if ($i % 2 == 0) {
                    
                echo '<div class="row">
                        <div class="col-md-6">
                            <img aos="fade-up" aos-once="true" aos-delay="500" src="' . $service['service_image'] . '" alt="">
                        </div>
                        <div class="col-md-6">
                            <h3>' . $service['service_title'] . '</h3>
                                ' . $service['service_description'] . '
                        </div>
                    </div>';

                } else {

                echo '<div class="row alt">
                        <div class="col-md-6 col-md-push-6">
                            <img aos="fade-up" aos-once="true" aos-delay="500" src="' . $service['service_image'] . '" alt="">
                        </div>
                        <div class="col-md-6 col-md-pull-6">
                            <h3>' . $service['service_title'] . '</h3>
                                ' . $service['service_description'] . '
                        </div>
                    </div>';

                }
                
             $i++;

            }

        } ?>

            
    </div>
</section>

<section id="social">
    <div class="container-fluid cf-800">
        <div class="row">
            <div class="col-sm-12">
                <?php if( $text_bar ) { echo '<h4>' . $text_bar . '</h4>'; }  ?>
            </div>
        </div>
    </div> 

    <!-- Flickity HTML init -->
    <div id="instafeed" class="insta-gallery"></div>
</section>

<section id="contact">
    <div class="row nm">
        <div class="col-sm-6 np">
            <div id="map-canvas"></div>
        </div>
        <div class="col-sm-6 np">
            <div id="location">
                <?php if( $location_heading ) { echo '<h2><span>' . $location_heading . '</span></h2>'; }  ?>
              
                <?php if( $location ) { echo $location; } ?>
                <ul class="icons share">
                    <li class="email"><a title="Follow Us on Instagram" href="<?php if ($ins) { echo ($ins); }?>" target="_blank" ><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></a></li>
                    <li class="tw"><a title="Follow Us on Twitter" href="<?php if ($tw) { echo ($tw); }?>" target="_blank" ><i class="fa fa-twitter fa-2x"></i></a></li>
                    <li class="fb"><a href="<?php if ($fb) { echo ($fb); }?>" target="_blank" title="Join Us on Facebook"><i class="fa fa-facebook fa-2x"></i></a></li>
                </ul> <!-- .icons share -->
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
