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
        add_action('loop_start', array($this, 'outputQueryInfo'));
    }

    /**
     * Returns comma seperated filter values (term names) when filter is active
     * @return false|string
     */
    public static function getFilterValues()
    {
        $terms = \Municipio\Helper\Query::getTaxQueryTerms();

        if (isset($terms) && is_array($terms) && !empty($terms)) {
            $termNames = array();

            foreach ($terms as $term) {
                $termNames[] = $term->name;
            }
        }

        if (isset($termNames) && is_array($termNames) && !empty($termNames)) {
            return implode($termNames, ', ');
        }

        return false;
    }

    /**
     * Outputs query info (Showing x of Y posts etc) before content on area archives
     * @return void
     */
    public function outputQueryInfo($query)
    {
        if (!$query->is_main_query() || !isset($query->query['post_type']) || $query->query['post_type'] != "area" || is_single()) {
            return;
        }

        $postCount = \Municipio\Helper\Query::getPaginationData()['postCount'];
        $postsTotal = \Municipio\Helper\Query::getPaginationData()['postTotal'];
        $filterValues = self::getFilterValues();

        if (isset($filterValues) && $filterValues && is_string($filterValues)) {
            $filterValues = '<b>' . $filterValues . '</b>';
        }

        //Post type label/name
        if (isset($postCount) && $postCount == 1 && isset($filterValues) && $filterValues) {
            $postType = (get_post_type_labels(get_post_type_object(get_post_type()))->singular_name) ? get_post_type_labels(get_post_type_object(get_post_type()))->singular_name : __('post', 'familjen-hbg');
        } else {
            $postType = (get_post_type_labels(get_post_type_object(get_post_type()))->name) ? get_post_type_labels(get_post_type_object(get_post_type()))->name : __('posts', 'familjen-hbg');
        }

        $postType = strtolower($postType);

        //If no posts
        if (!isset($postCount) || !$postCount || $postCount == 0) {
            if (isset($filterValues) && $filterValues) {
                $output = __('Could not find any', 'familjen-hbg') . ' ' . $postType . ' ' . __('matching your choices:', 'familjen-hbg') . ' ' . $filterValues . '.';
            } else {
                $output = __('Could not find any', 'familjen-hbg') . ' ' . $postType . '.';
            }
        }

        //Has posts
        if (isset($postCount) && $postCount && $postCount > 0) {
            if (isset($filterValues) && $filterValues) {
                $output = __('Found', 'familjen-hbg') . ' ' . $postsTotal . ' ' . $postType . ' ' . __('matching your choices:', 'familjen-hbg') . ' ' . $filterValues . '.';
            } else {
                $output = __('Showing', 'familjen-hbg') . ' ' . $postCount . ' ' . strtolower(__('of', 'familjen-hbg')) . ' ' . $postsTotal . ' ' . $postType . '.';
            }
        }

        if (!isset($output) || !$output || !is_string($output)) {
            return;
        }

        echo '<div class="grid-xs-12 u-element"><p>' . $output . '</p></div>';
    }

    public function mapPlotData($query)
    {
        if (is_object($query) && $query->is_main_query() && isset($query->query['post_type'])) {

            if ($query->query['post_type'] != "area") {
                return false;
            }

            if (is_single()) {
                return false;
            }

            if(isset($_GET['filter'])) {
                $allPosts = $query->posts;
            } else {
                 $allPosts = get_posts(array(
                    'numberposts' => -1,
                    'post_type' => $query->query['post_type']
                ));
            }

            if (isset($allPosts) && is_array($allPosts) && !empty($allPosts)) {
                $result = array();

                foreach ($allPosts as $postItem) {
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
