<?php

define('FAMILJENHBG_PATH', get_stylesheet_directory() . '/');

//Include vendor files
if (file_exists(dirname(ABSPATH) . '/vendor/autoload.php')) {
    require_once dirname(ABSPATH) . '/vendor/autoload.php';
}

require_once FAMILJENHBG_PATH . 'library/Vendor/Psr4ClassLoader.php';
$loader = new FAMILJENHBG\Vendor\Psr4ClassLoader();
$loader->addPrefix('FamiljenHbg', FAMILJENHBG_PATH . 'library');
$loader->addPrefix('FamiljenHbg', FAMILJENHBG_PATH . 'source/php/');
$loader->register();

new FamiljenHbg\App();
