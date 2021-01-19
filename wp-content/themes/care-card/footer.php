<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Care_Card
 */

?>

<footer id="colophon" class="site-footer" role="contentinfo">
    <div class="care-container">
        <div class="row">
            <div class="col-md-4">
                <?php dynamic_sidebar('footer-1'); ?>
            </div>
            <div class="col-md-4">
                <?php dynamic_sidebar('footer-2'); ?>
            </div
            <div class="col-md-4">
                <?php dynamic_sidebar('footer-3'); ?>
            </div>
            <div class="row">
                <div class=" col-md-12 site-info">&copy; <?php echo date("Y ");  bloginfo('name');
                    echo date("Y"); ?>.
                    All Rights Reserved | <a href="#">Terms of use</a> | <a href="#">Privacy policy</a>
                </div><!-- .site-info -->
            </div>
        </div><!--  .row -->

    </div><!--  .container -->
</footer><!-- #colophon -->

<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"/>
    </svg>
</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
