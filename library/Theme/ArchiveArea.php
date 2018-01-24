<?php

namespace FamiljenHbg\Theme;

use Philo\Blade\Blade as Blade;

class ArchiveArea
{

    private $VIEWS_PATHS;
    private $CONTROLLER_PATH;
    private $CACHE_PATH;

    public function __construct()
    {
        $this->VIEWS_PATHS = apply_filters('Municipio/blade/view_paths', array(
            get_stylesheet_directory() . '/views',
            get_template_directory() . '/views'
        ));

        $this->VIEWS_PATHS = array_unique($this->VIEWS_PATHS);
        $this->CACHE_PATH = WP_CONTENT_DIR . '/uploads/cache/blade-cache';

        add_action('loop_start', array($this, 'mapPlotData'));
    }

    public function mapPlotData($query)
    {
        if ($query->is_main_query()) {
            if ($query->query['post_type'] != "area") {
                return false;
            }

            if (isset($query->posts) && is_array($query->posts) && !empty($query->posts)) {
                $result = array();

                foreach ($query->posts as $postItem) {
                    if ($postItem->post_status != "publish") {
                        continue;
                    }

                    $result[] = array(
                        'location' => $postItem->post_title,
                        'excerpt' => wp_trim_words($postItem->post_content, 20),
                        'geo' => get_field('area_geographical_location', $postItem->ID),
                        'permalink' => get_permalink($postItem->ID)
                    );
                }
            }

            //Get center of all points
            if (is_array($result) && !empty($result)) {
                $lat = (float) 0;
                $lng = (float) 0;

                //Sum all lat lng
                foreach ($result as $latLngItem) {
                    $lat = $lat + (float) $latLngItem['geo']['lat'];
                    $lng = $lng + (float) $latLngItem['geo']['lng'];
                }

                //Calc center position
                $center = array(
                    'lat' => $lat/count($result),
                    'lng' => $lng/count($result)
                );
            }

            //Add view
            if (isset($center) && !empty($center) && isset($result) && !empty($result)) {
                $blade = new Blade($this->VIEWS_PATHS, $this->CACHE_PATH);
                echo $blade->view()->make('partials.area.map', array('data' => $result, 'center' => $center))->render();
            }
        }
    }
}
