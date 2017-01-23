<?php

namespace FamiljenHbg\Theme;

class General
{
    public function __construct()
    {
        add_filter('Municipio/taxonomies_to_display/terms', array($this, 'taxonomiesToDisplayTerms'), 10, 3);
    }

    public function taxonomiesToDisplayTerms($terms, $postId, $taxonomy)
    {
        foreach ($terms as $term) {
            $term->label_background = get_field('label_background_color', $term);
            $term->label_text = get_field('label_text_color', $term);
        }

        return $terms;
    }
}
