<?php

define('FAMILJENHBG_PATH', get_stylesheet_directory() . '/');

// Load translations
add_action('after_setup_theme', function () {
    load_theme_textdomain('familjen-hbg', get_stylesheet_directory() . '/languages');
});

//Include vendor files
if (file_exists(dirname(ABSPATH) . '/vendor/autoload.php')) {
    require_once dirname(ABSPATH) . '/vendor/autoload.php';
}

//Include theme functions
require_once FAMILJENHBG_PATH . 'library/Vendor/Psr4ClassLoader.php';
$loader = new FAMILJENHBG\Vendor\Psr4ClassLoader();
$loader->addPrefix('FamiljenHbg', FAMILJENHBG_PATH . 'library');
$loader->addPrefix('FamiljenHbg', FAMILJENHBG_PATH . 'source/php/');
$loader->register();

//Load fields
add_action('init', function () {
    $acfExportManager = new \AcfExportManager\AcfExportManager();
    $acfExportManager->setTextdomain('familjen-hbg');
    $acfExportManager->setExportFolder(FAMILJENHBG_PATH . 'library/AcfFields');
    $acfExportManager->autoExport(array(
        'theme-colors'             => 'group_5a4df66689503',
    ));
    $acfExportManager->import();
});

//Run app
new FamiljenHbg\App();
