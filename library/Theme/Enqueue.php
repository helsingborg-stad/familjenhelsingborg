<?php

namespace FamiljenHbg\Theme;

class Enqueue
{
    public function __construct()
    {
        // Enqueue scripts and styles
        add_action('wp_enqueue_scripts', array($this, 'style'));
        add_action('wp_enqueue_scripts', array($this, 'script'));

        add_filter('script_loader_src', array($this, 'removeQueryString'), 15, 1);
        add_filter('style_loader_src', array($this, 'removeQueryString'), 15, 1);

        // Force HbgPrime to familjen theme
        add_filter('Municipio/theme/key', function () {
            return 'familjen';
        });

        // Do not use material shadow
        add_filter('body_class', function ($classes) {
            $classes[] = 'material-no-shadow';
            $classes[] = 'material-no-radius';
            return $classes;
        });
    }

    /**
     * Enqueue styles
     * @return void
     */
    public function style()
    {
        wp_enqueue_style('familjen-css', get_stylesheet_directory_uri() . '/assets/dist/' . \Municipio\Helper\CacheBust::name('css/app.css', true, true));
    }

    /**
     * Enqueue scripts
     * @return void
     */
    public function script()
    {
        wp_enqueue_script('familjen-vendor-js', get_stylesheet_directory_uri() . '/assets/dist/' . \Municipio\Helper\CacheBust::name('js/vendor.js', true, true), array('jquery'));
        wp_enqueue_script('familjen-js', get_stylesheet_directory_uri() . '/assets/dist/' . \Municipio\Helper\CacheBust::name('js/app.js', true, true), array('jquery'));
    }

    public function removeQueryString($src)
    {
        return remove_query_arg('ver', $src);
    }
}
