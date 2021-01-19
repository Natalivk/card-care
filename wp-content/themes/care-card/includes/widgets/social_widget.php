<?php

class SocialBlock extends WP_Widget
{

    function __construct()
    {

        parent::__construct(
            'social_block',
            __('CC- Social Block', 'card-care')
        );
    }

    function widget($args, $instance)
    {
        ?>
        <div class="container">
            <div class="row information">
                <div class="col-md-12"><h4 class="each-news-title-top"><?php echo $instance['title']; ?></h4></div>
                <div class="col-md-12">
                    <div class="info-block">
                        <div class="footer-email">
                            <a href="mailto:'<?php echo $instance['footer_email']; ?>'" target="_blank">
                                <span class="email-footer-sp"><i class="fa fa-envelope-o" aria-hidden="true"></i></span> <div><?php echo $instance['footer_email']; ?></div>
                            </a>
                        </div>
                    </div>
                    <div class="social-buttons">

                        <a href="<?php echo $instance['telegram_url']; ?>"
                           class="link-social-telegram animation-pulse-grow" target="_blank">
                            <span class="each-social telegram">
                                <i class="fa fa-telegram"></i>
                            </span>
                        </a>
                        <a href="<?php echo $instance['youtube_url']; ?>"
                           class="link-social-youtube animation-pulse-grow" target="_blank">
                            <span class="each-social youtube">
                               <i class="fa fa-youtube-play" ></i>
                            </span>
                        </a>
                        <a href="<?php echo $instance['linkedin_url']; ?>"
                           class="link-social-linkedin animation-pulse-grow" target="_blank">
                            <span class="each-social linkedin">
                                <i class="fa fa-linkedin"></i>
                            </span>
                        </a>
                        <a href="<?php echo $instance['facebook_url']; ?>"
                           class="link-social-facebook animation-pulse-grow" target="_blank">
                            <span class="each-social facebook">
                                <i class="fa fa-facebook"></i>
                            </span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
        <?php
    }


    function update($new_instance, $old_instance)
    {

        $instance = $old_instance;
        $instance['title'] = strip_tags($new_instance['title']);
        $instance['footer_email'] = strip_tags($new_instance['footer_email']);
        $instance['facebook_url'] = strip_tags($new_instance['facebook_url']);
        $instance['telegram_url'] = strip_tags($new_instance['telegram_url']);
        $instance['linkedin_url'] = strip_tags($new_instance['linkedin_url']);
        $instance['youtube_url'] = strip_tags($new_instance['youtube_url']);

        return $instance;
    }

    function form($instance)
    {

        $defaults = array(
            'title' => __('Default Title', 'care-card'),
            'footer_email' => '',
            'facebook_url' => '',
            'telegram_url' => '',
            'linkedin_url' => '',
            'youtube_url' => ''
        );

        $instance = wp_parse_args((array)$instance, $defaults);
        $widget_add_id = $this->id . "-add";

        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:', 'care-card'); ?></label>
            <input
                id="<?php echo $this->get_field_id('title'); ?>"
                name="<?php echo $this->get_field_name('title'); ?>"
                value="<?php echo $instance['title']; ?>"
                class="widefat"
            />
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id('footer_email'); ?>"><?php _e('Email:', 'care-card'); ?></label>
            <input
                id="<?php echo $this->get_field_id('footer_email'); ?>"
                name="<?php echo $this->get_field_name('footer_email'); ?>"
                value="<?php echo $instance['footer_email']; ?>"
                class="widefat"
                type="email"
            />
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id('telegram_url'); ?>"><?php _e('Telegram URL:', 'care-card'); ?></label>
            <input
                id="<?php echo $this->get_field_id('telegram_url'); ?>"
                name="<?php echo $this->get_field_name('telegram_url'); ?>"
                value="<?php echo $instance['telegram_url']; ?>"
                class="widefat"
            />
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id('youtube_url'); ?>"><?php _e('Youtube URL:', 'care-card'); ?></label>
            <input
                id="<?php echo $this->get_field_id('youtube_url'); ?>"
                name="<?php echo $this->get_field_name('youtube_url'); ?>"
                value="<?php echo $instance['youtube_url']; ?>"
                class="widefat"
            />
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id('linkedin_url'); ?>"><?php _e('linkedin URL:', 'care-card'); ?></label>
            <input
                id="<?php echo $this->get_field_id('linkedin_url'); ?>"
                name="<?php echo $this->get_field_name('linkedin_url'); ?>"
                value="<?php echo $instance['linkedin_url']; ?>"
                class="widefat"
            />
        </p>
        <p>
            <label
                for="<?php echo $this->get_field_id('facebook_url'); ?>"><?php _e('Facebook URL:', 'care-card'); ?></label>
            <input
                id="<?php echo $this->get_field_id('facebook_url'); ?>"
                name="<?php echo $this->get_field_name('facebook_url'); ?>"
                value="<?php echo $instance['facebook_url']; ?>"
                class="widefat"
            />
        </p>



        <?php
    }
}

function register_social_block()
{
    register_widget('SocialBlock');
}

add_action('widgets_init', 'register_social_block');
