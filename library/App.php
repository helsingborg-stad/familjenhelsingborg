<?php
namespace FamiljenHbg;

class App
{
    public function __construct()
    {
        new \FamiljenHbg\Theme\Enqueue();
        new \FamiljenHbg\Theme\Color();
        new \FamiljenHbg\Theme\Authors();
    }
}
