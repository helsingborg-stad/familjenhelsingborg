<?php

namespace FamiljenHbg\Theme;

class Color
{

    private $post;

    public function __construct()
    {
        // Enqueue scripts and styles
        add_filter('language_attributes', array($this, 'addBodyClass'), 10, 2);
    }

    /**
     * Add child theme class
     * @return string
     */
    public function addBodyClass($output, $doctype = "")
    {
        //Get color scheme
        if (is_numeric(get_the_id())) {
            $ancestor_posts = get_post_ancestors(get_the_id());

            if (!empty($ancestor_posts) && is_array($ancestor_posts)) {
                $color = get_post_meta(end($ancestor_posts), 'color_variant', true);
            } else {
                $color = get_post_meta(get_the_id(), 'color_variant', true);
            }
        }

        //Apply color scheme
        if (isset($color) && !is_null($color) && !empty($color)) {
            $output = $output . ' class="custom-color-'.$color.'"';
        } else {
            $output = $output;
        }

        return $output;
    }

    /**
     * Creates a local copy of the global instance
     * @param string $global The name of global varable that should be made local
     * @param string $local Handle the global with the name of this string locally
     * @return void
     */
    public function globalToLocal($global, $local = null)
    {
        global $$global;
        if (is_null($local)) {
            $this->$global = $$global;
        } else {
            $this->$local = $$global;
        }
    }
}
