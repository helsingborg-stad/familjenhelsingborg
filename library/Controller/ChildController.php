<?php

namespace FamiljenHbg\Controller;

class ChildController
{
    public function __construct()
    {
        add_filter('Municipio/viewData', array($this, 'data'), 10, 1);
    }

    public function data($data)
    {

        $data['topMenu'] = $this->wordpressMenu(wp_get_nav_menu_object(get_nav_menu_locations()['help-menu'])->term_id);
        $data['mainMenu'] = $this->wordpressMenu(wp_get_nav_menu_object(get_nav_menu_locations()['main-menu'])->term_id);
        return $data;
    }

    public function wordpressMenu($menuId)
    {
        $menuItems = \Municipio\Helper\Navigation::wpMenu($menuId);

        if (empty($menuItems)) {
            return;
        }

        $menu = array();

        foreach ($menuItems as $key => $menuItem) {
            $menuItem->attributes = new \Municipio\Helper\ElementAttribute();
            $menuItem->attributes->addClass('c-navbar__item');

            if ($menuItem->ID == get_queried_object_id()) {
                $menuItem->attributes->addClass('is-current');
            }

            if ($menuItem->ID == get_post_ancestors(get_queried_object())) {
                $menuItem->attributes->addClass('is-current-ancestor');
            }

            $menuItem = apply_filters('FamiljenHbg/MenuItem', $menuItem, $menuId);
            $menuItem->attributes = $menuItem->attributes->outputAttributes();

            if (!empty($menuItem->classes)) {
                $menuItem->classes = implode(' ', $menuItem->classes);
            } else {
                $menuItem->classes = '';
            }

            $menu[] = $menuItem;
        }

        return $menu;
    }
}
