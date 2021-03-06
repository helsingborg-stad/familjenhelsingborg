<?php 

if (function_exists('acf_add_local_field_group')) {
    acf_add_local_field_group(array(
    'key' => 'group_5a4df66689503',
    'title' => __('Color scheme', 'familjen-hbg'),
    'fields' => array(
        0 => array(
            'key' => 'field_5a4df668b4cfa',
            'label' => __('Select a colorscheme', 'familjen-hbg'),
            'name' => 'color_variant',
            'type' => 'select',
            'instructions' => __('Select a color for this page and childpages.', 'familjen-hbg'),
            'required' => 1,
            'conditional_logic' => 0,
            'wrapper' => array(
                'width' => '',
                'class' => '',
                'id' => '',
            ),
            'choices' => array(
                'blue' => __('Blue', 'familjen-hbg'),
                'yellow' => __('Yellow', 'familjen-hbg'),
                'purple' => __('Purple', 'familjen-hbg'),
                'grey' => __('Grey (dark grey)', 'familjen-hbg'),
                'orange' => __('Orange', 'familjen-hbg'),
                'pink' => __('Pink', 'familjen-hbg'),
                'turquoise' => __('Turquoise', 'familjen-hbg'),
            ),
            'default_value' => array(
                0 => 'darkblue',
            ),
            'allow_null' => 0,
            'multiple' => 0,
            'ui' => 1,
            'ajax' => 0,
            'return_format' => 'value',
            'placeholder' => '',
        ),
    ),
    'location' => array(
        0 => array(
            0 => array(
                'param' => 'post_type',
                'operator' => '==',
                'value' => 'page',
            ),
            1 => array(
                'param' => 'page_type',
                'operator' => '==',
                'value' => 'top_level',
            ),
        ),
    ),
    'menu_order' => 0,
    'position' => 'side',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
));
}