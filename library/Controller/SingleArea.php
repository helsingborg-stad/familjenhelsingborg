<?php

namespace FamiljenHbg\Controller;

class SingleArea extends \Municipio\Controller\BaseController
{
    public function init()
    {
        $this->data['facts'] = $this->getFacts();
        $this->data['links'] = $this->getLinkList();
        $this->data['images'] = $this->getRegionImages();
        $this->data['location'] = $this->getLocation();

        $this->data['language'] = array(
            'readmore' => __("Read more about this location:", 'familjen-hbg')
        );
    }

    public function getFacts()
    {

        //Get basic data structure
        $facts = array(
            'general' => get_field('area_general_facts'),
            'metadata' => get_field('area_metadata')
        );

        //Only get first item of array
        if (is_array($facts['metadata']) && !empty($facts['metadata'])) {
            foreach ($facts['metadata'] as &$metaItem) {
                $metaItem['area_heading'] = array_pop($metaItem['area_heading']);
            }
        }

        //Return structured data
        return $facts;
    }

    public function getLinkList()
    {
        //Get list of links
        $links = get_field('area_external');

        //Check if is valid data
        if (is_array($links) && !empty($links)) {
            return $links;
        }

        return null;
    }

    public function getRegionImages($response = array())
    {

        //Get images
        $images = get_field('location_region_images');

        //Format in loop
        if (isset($images) && is_array($images) && !empty($images)) {
            foreach ($images as $image) {

                //Base data
                $item = array(
                    'caption' => $image['caption'],
                    'large' => $image['sizes']['large']
                );

                //Get thumbnail img src
                if ($image = wp_get_attachment_image_src($image['id'], array(200, 150))) {
                    $item['thumbnail'] = isset($image[0]) && !empty($image[0]) ? $image[0] : null;
                }

                $response[] = $item;
            }
        }

        return $response;
    }

    public function getLocation()
    {
        return get_field('area_geographical_location');
    }
}
