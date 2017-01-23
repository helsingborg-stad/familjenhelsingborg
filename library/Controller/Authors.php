<?php

namespace FamiljenHbg\Controller;

class Authors extends \Municipio\Controller\BaseController
{
    public function init()
    {
        $this->data['authors'] = get_users(array(
            'who' => 'authors'
        ));
    }
}
