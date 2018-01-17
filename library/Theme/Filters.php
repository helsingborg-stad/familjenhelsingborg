<?php

namespace MunicipioHighSchool\Theme;

class Filters
{
    public function __construct()
    {
        //Fixes classes on sidebar boxes
        add_filter('Modularity/Module/Classes', array($this, 'moduleClasses'), 15, 3);
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
