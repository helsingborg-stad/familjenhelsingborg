<?php
namespace FamiljenHbg;

class App
{
    public function __construct()
    {
        new \FamiljenHbg\Theme\General();
        new \FamiljenHbg\Theme\Enqueue();
        new \FamiljenHbg\Theme\Authors();
    }
}
