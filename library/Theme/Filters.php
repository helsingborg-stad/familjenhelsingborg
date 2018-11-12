<?php

namespace FamiljenHbg\Theme;

class Filters
{
    public function __construct()
    {
        //Fixes classes on sidebar boxes
        add_filter('Modularity/Module/Classes', array($this, 'moduleClasses'), 15, 3);
        add_filter('Modularity/Widget/ColumnWidth', array($this, 'widgetColumnWidth'), 15, 2);

        add_action('Municipio/mobile_menu_breakpoint', array($this, 'mobileMenuBreakpoint'));

        // add_filter('body_class', array($this, 'bemDeprecated'), 10, 1);

        //Child theme header option
        add_filter('acf/load_field/name=header_layout', array($this, 'addChildThemeHeader'));

        add_filter('Municipio/Controller/BaseController/Layout', array($this, 'setPageLayout'), 10, 1);
    }

    public function setPageLayout($layout)
    {
        $layout['content'] = 'grid-xs-12 order-xs-1 order-md-2 grid-md-auto';

        if (!is_post_type_archive('area') && !is_singular('area')) {
            return $layout;
        }

        $layout['content'] = 'grid-xs-12 order-xs-1 order-md-2 grid-md-auto';

        if (is_singular('area')) {
            $layout['content'] = 'grid-xs-12 order-xs-1 order-xs-1 grid-sm-auto';
            $layout['sidebarRight'] = 'grid-xs-12 grid-md-6 grid-lg-5 order-xs-3';
        }

        return $layout;
    }

    public function addChildThemeHeader($field)
    {
        if (get_field('theme_mode', 'options') >= 2) {
            $field['choices']['familjen'] = 'Familjenhelsingborg (Child theme template)';
        }

        return $field;
    }

    public function bemDeprecated($classes)
    {
        $classes[] = 's-bem-deprecated';

        return $classes;
    }

    /**
     * Show mobile menu in all but large size.
     * @return void
     */
    public function mobileMenuBreakpoint($classes)
    {
        return "hidden-lg";
    }

    public function widgetColumnWidth($class, $instance)
    {
        $class = str_replace('md', 'lg', $class);

        return $class;
    }

    /**
     * Modify module classes in different areas
     * @param  array $classes      Default classes
     * @param  string $moduleType  Module type
     * @param  array $sidebarArgs  Sidebar arguments
     * @return array               Modified list of classes
     */

    public function moduleClasses($classes, $moduleType, $sidebarArgs)
    {
        // Sidebar box-panel (should be filled)
        if (in_array('box-filled', $classes)) {
            unset($classes[array_search('box-filled', $classes)]);
            $classes[] = 'box--material';
        }

        if (in_array('box-news', $classes)) {
            unset($classes[array_search('box-news', $classes)]);
            $classes[] = 'box--material';
        }

        return $classes;
    }
}
