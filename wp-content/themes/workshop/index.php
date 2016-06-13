<?php get_header(); 

// $gallery_images = get_field('gallery_images');
$image1 = get_field('image1');
$image2 = get_field('image2');
$intro_text = get_field('intro_text');

$services_heading = get_field('services_heading');
$services = get_field('services');

?>

<div id="loader_wrap"></div>

<section id="top">
    
    <ul id="menu" style="position: absolute;top: 50%;right: 20px;z-index: 200; font-size: 3em;list-style:none;margin:0;padding:0;margin-top:-60px">
        <li class="active"><a id="prev" href="#">Prev</a></li>
        <li><a id="next" href="#">Next</a></li>
    </ul>

    <div id="pagepiling">
        <div class="section" id="section1" style="background: url('<?php echo($image1)?>'); background-position: center center; background-repeat: no-repeat; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
            <h1>The Workshop</h1>
            <p>Totally open to your imagination!</p>
            <br />
        </div>
        <div class="section" id="section2" style="background: url('<?php echo($image2)?>'); background-position: center center; background-repeat: no-repeat; -webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;">
            <div class="intro">
                <h1>Feel free</h1>
                <a style="display: inline-block;" href="#about" class="scroll"><img style="display: none;" src="http://placehold.it/540x320" alt=""></a>
            </div>
        </div>
    </div>

    <!-- <div id="parent">
        <div id="child">
            <a href="#about" class="scroll"><img src="http://placehold.it/540x320" alt=""></a>
            <h3 class="tagline centered">Foo Bar Baz<br>
            </h3>
        </div>
    </div>    -->     

</section>    

<!-- About Section -->
<section id="about">
    <div class="container-fluid cf-800 intro">
        <div class="row">
            <div class="col-sm-12">
                <h4><?php echo($intro_text)?></h4>
            </div>
        </div>
    </div>  
</section>

<section id="services">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h4><?php echo($services_heading)?></h4>
            </div>
        </div>
        
        <?php if($services) {
            
            $i = 0;

            foreach($services as $service) {
                // echo $i;
                if ($i % 2 == 0) {
                    
                echo '<div class="row">
                        <div class="col-md-6">
                            <img aos="fade-up" src="' . $service['service_image'] . '" alt="">
                        </div>
                        <div class="col-md-6">
                            <h3>' . $service['service_title'] . '</h3>
                                ' . $service['service_description'] . '
                        </div>
                    </div>';

                } else {

                echo '<div class="row alt">
                        <div class="col-md-6 col-md-push-6">
                            <img aos="fade-up" src="' . $service['service_image'] . '" alt="">
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
                <h4>Please come back and visit us soon when we finish our new site. In the meantime check us out on social media:</h4>
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
                <h2>Our Location</h2>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
