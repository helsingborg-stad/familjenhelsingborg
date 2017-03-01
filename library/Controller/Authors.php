<?php

namespace FamiljenHbg\Controller;

class Authors extends \Municipio\Controller\BaseController
{
    public function init()
    {
        $this->data['authors'] = $this->getAuthors();
    }

    public function getAuthors()
    {
        $authors = get_users(array(
            'who' => 'authors'
        ));

        $authors = array_filter($authors, function ($author) {
            return municipio_get_author_full_name($author->ID);
        });

        return $authors;
    }
}
