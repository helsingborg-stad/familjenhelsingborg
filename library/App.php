<?php
namespace FamiljenHbg;

class App
{
    public function __construct()
    {
        new \FamiljenHbg\Admin\ArchiveOptions();
        new \FamiljenHbg\Theme\Enqueue();
        new \FamiljenHbg\Theme\Color();
        new \FamiljenHbg\Theme\Authors();
        new \FamiljenHbg\Theme\Filters();
        new \FamiljenHbg\Theme\ArchiveArea();
    }
}
