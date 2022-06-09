<?php

/*
 
Plugin Name: Obsidian buying guide
 
Description: Add buying guide ACF fields and shortcode to wp posts
 
Version: 1

*/
function ob_buying_guide_acf()
{
    acf_add_local_field_group(array(
        'key' => 'group_6267de8b2ac88',
        'title' => 'Buying guide',
        'fields' => array(
            array(
                'key' => 'field_6267de9ac299d',
                'label' => 'Title Buying guide',
                'name' => 'title_buying_guide',
                'type' => 'text',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'placeholder' => '',
                'prepend' => '',
                'append' => '',
                'maxlength' => '',
            ),
            array(
                'key' => 'field_6267dea7c299e',
                'label' => 'Text Buying guide',
                'name' => 'text_buying_guide',
                'type' => 'wysiwyg',
                'instructions' => '',
                'required' => 0,
                'conditional_logic' => 0,
                'wrapper' => array(
                    'width' => '',
                    'class' => '',
                    'id' => '',
                ),
                'default_value' => '',
                'tabs' => 'all',
                'toolbar' => 'full',
                'media_upload' => 1,
                'delay' => 0,
            ),
        ),
        'location' => array(
            array(
                array(
                    'param' => 'post_type',
                    'operator' => '==',
                    'value' => 'post',
                ),
            ),
        ),
        'menu_order' => 0,
        'position' => 'normal',
        'style' => 'default',
        'label_placement' => 'top',
        'instruction_placement' => 'label',
        'hide_on_screen' => '',
        'active' => true,
        'description' => '',
        'show_in_rest' => 0,
    ));
}

/* Only fire if ACF is active */
add_action('acf/init', 'ob_buying_guide_acf');
//the_field('title_buying_guide')

function buying_guide_shortcode()
{
    if (get_field('title_buying_guide')) :
        $content = '';
        $content .= '<div class="about-box">';
        $content .= '<h2 class="box-title">';
        $content .= do_shortcode('[acf field="title_buying_guide"]');
        $content .= '</h2>';
        if (get_field('text_buying_guide')) :
            $content .= '<div class="box-content">';
            $content .= do_shortcode('[acf field="text_buying_guide"]');
            $content .= '<p class="more-guid"><img src="' . plugins_url('arrow-down.png', __FILE__) . '" width="25" height="25" alt="arrow-more"></p></div>';
        endif;
        $content .= '</div>';
        return $content;
    endif;
}

add_shortcode('buying_guide', 'buying_guide_shortcode');


function registerBuyingScripts()
{
    if (is_single()) {
        wp_register_script('buyingguideScript', plugins_url('script.js', __FILE__));
        wp_enqueue_script('buyingguideScript');

        wp_enqueue_style('buyingguideStlyle', plugins_url('style.css', __FILE__));
    }
}
add_action('wp_footer', 'registerBuyingScripts');
