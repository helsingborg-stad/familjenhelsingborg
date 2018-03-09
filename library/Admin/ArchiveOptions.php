<?php

namespace FamiljenHbg\Admin;

class ArchiveOptions
{
    public function __construct()
    {
        add_action('admin_init', array($this, 'archiveOptions'), 10);
    }

    public function archiveOptions()
    {
        $postTypes = array();
        foreach (get_post_types() as $key => $postType) {
            $args = get_post_type_object($postType);

            if (!$args->public || $args->name === 'page' || $args->name === 'attachment') {
                continue;
            }

            $postTypes[$postType] = $args;
        }

        if (!isset($postTypes) || !is_array($postTypes) || empty($postTypes)) {
            return;
        }

        foreach ($postTypes as $postType => $args) {
            add_filter('acf/load_field/key=field_84fcc953ddgyt_' . md5($postType . '_positon'), array($this, 'filterPosition'));
        }
    }

    public function filterPosition($field)
    {
        $field['choices']['left'] = 'Left';

        return $field;
    }
}
