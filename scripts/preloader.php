<?php

// Create a preloader for vendor
require __DIR__ . '/../vendor/classpreloader/classpreloader/src/ClassLoader.php';

use ClassPreloader\ClassLoader;

$config = ClassLoader::getIncludes(function (ClassLoader $loader) {
    require __DIR__ . '/../vendor/autoload.php';
    $loader->register();

    require __DIR__ . '/../index.php';

    handler(request());
});

// Add a regex filter that requires all classes to match the regex.
// $config->addInclusiveFilter('/Foo/');

// Add a regex filter that requires that a class does not match the filter.
// $config->addExclusiveFilter('/Foo/');


$config->addExclusiveFilter('/config\.php/');
return $config;