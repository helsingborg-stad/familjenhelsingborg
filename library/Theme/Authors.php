<?php

namespace FamiljenHbg\Theme;

class Authors
{
    public function __construct()
    {
        add_action('init', array($this, 'authorsPageRewrite'));
        add_filter('template_include', array($this, 'template'), 10);
    }

    public function authorsPageRewrite()
    {
        add_rewrite_rule('^authors', 'index.php?authors&modularity_template=authors', 'top');
        add_rewrite_tag('%authors%', '([^&]+)');
        flush_rewrite_rules();
    }

     public function template($template)
    {
        global $wp_query;

        if (!isset($wp_query->query['authors'])) {
            return $template;
        }

        $template = \Municipio\Helper\Template::locateTemplate('authors');
        $wp_query->is_home = false;

        return $template;
    }
}
