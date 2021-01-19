<?php
/**
 * Template Name : Home Page
 *
 *
 * @package Care_Card
 */

?>
<?php get_header(); ?>

<div class="home-hero">
    <?php $image = get_field('home_hero'); ?>
    <div class="home-hero-img" style="background-image: url('<?php echo $image['url']; ?>') ">
        <div class="care-container">
            <div class="hero-container">
                <div class="hero-logo">
                    <img src="<?php the_field('hero_logo'); ?>" alt="">
                </div>
                <div class="hero-text">
                    <?php the_field('hero_text'); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $image_video = get_field('background_image'); ?>
<div class="video-text" style="background-image: url('<?php echo $image_video['url']; ?>') ">
    <div class="care-container">
        <div class="text-hlf-content">
            <?php the_field('content_video'); ?>
        </div>

    </div>

    <div id="play" class="video-hlf">

    </div>
    <?php the_field('video_url'); ?>

    <div id="stop" class="close-icon">
        <div></div>
        <div></div>
    </div>



</div>
<div class="hurry-up">
    <div class="care-container">
        <div class="hurry-up-container">
            <div class="hurry-up-left">
                <h3 class="hurry-up-title"> <?php the_field('title_hurry_up'); ?></h3>
                <img class="hurry-up-img" src="<?php the_field('image_hurry_up'); ?>" alt="Hurry Up">
            </div>
            <div class="hurry-up-right">
                <div class="hurry-up-text"><?php the_field('content_hurry_up'); ?></div>
                <div class="hurry-up-sub"><?php the_field('subtitle_hurry_up'); ?></div>
                <a class="btn hurry-up-button"><?php the_field('button_hurry_up'); ?></a>
            </div>

        </div>
    </div>
</div>


<?php get_footer(); ?>
