<?php

namespace FamiljenHbg\Theme;

class Color
{

    public function __construct()
    {
        add_filter('body_class', array($this, 'addBodyClass'), 10, 1);
    }

    /**
     * Add child theme class
     * @return string
     */
    public function addBodyClass($classes)
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
            $classes[] = "s-custom-color-" . $color;
        } elseif (is_post_type_archive('area') ||is_singular('area')) {
            $classes[] = "s-custom-color-orange";
        } elseif (is_post_type_archive('nyheter') ||is_singular('nyheter')) {
            $classes[] = "s-custom-color-purple";
        } else {
            $classes[] = "s-custom-color-blue";
        }

        return $classes;
    }
}
