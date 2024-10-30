<?php
/*
Plugin Name: Tweets Box
Plugin URI: http://www.vinojcardoza.com/blog/cardoza-twitter-box/
Description: Tweets Box enables you to display the tweets in your website.
Version: 2.2
Author: Vinoj Cardoza
Author URI: http://www.vinojcardoza.com/
License: GPL2
*/

define('CARDOZA_TWITTER_DIR', plugin_dir_url(__FILE__));
   
add_action("plugins_loaded", "cardoza_twitter_box_init");
add_action("admin_menu", "cardoza_twitter_box_options");
add_shortcode("cardoza_twitter_box", "cardoza_twitter_box_sc");

require('includes/cardoza_twitter_profile_forms.php');
require('includes/cardoza_twitter_profile_functions.php');

//The following function will retrieve all the avaialable 
//options from the wordpress database

function cardoza_twitter_enqueue_scripts(){
    if(is_admin()){
        if (isset($_GET['page']) && ($_GET['page'] == 'slug_for_twitter_box'))
        {
            wp_enqueue_style('ctwitt-css', plugin_dir_url(__FILE__).'public/css/bootstrap.css');
        }
        wp_enqueue_script('jquery');
        wp_enqueue_script('ctwitt-bootstrap-js', plugins_url('/public/js/bootstrap.js', __FILE__), array('jquery'));
    }
}
add_action('admin_init', 'cardoza_twitter_enqueue_scripts');

function cardoza_twitter_box_options(){
    add_options_page(
        __('Twitter Box'), 
        'Twitter Box', 
        'manage_options', 
        'slug_for_twitter_box', 
        'cardoza_twitter_box_options_page',
        plugin_dir_url(__FILE__).'includes/twitter.png');
}


function cardoza_twitter_box_init(){
    load_plugin_textdomain('twittertweetbox', false, dirname(plugin_basename(__FILE__)) . '/languages');
    wp_register_sidebar_widget(
        'ctwitter-box',
        __('Tweets Box'),
        'widget_cardoza_twitter_box'
    );
}

function cardoza_twitter_box_sc(){
    ob_start();
    $option_value = ctb_retrieve_options();
    $username = get_option('cardoza_tb_username');
    $user_widget_id = get_option('cardoza_tb_user_widget_id');
    $width = get_option('cardoza_tb_width');
    $height = get_option('cardoza_tb_height');
    $links_color = get_option('cardoza_tb_links_color');
    $theme = get_option('cardoza_tb_theme');

    echo '<a class="twitter-timeline"  href="https://twitter.com/'.$username.'"';
    if(!empty($width)) echo ' data-width="'.$width.'"';
    if(!empty($height)) echo ' data-height="'.$height.'"';
    if(!empty($theme) && $theme == 'dark') echo ' data-theme="dark"';
    echo '>Tweets by @'.$username.'</a>';
    ?>
    <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>
    <?php
    $output = ob_get_contents();
    ob_end_clean();
    return $output;
}
?>
