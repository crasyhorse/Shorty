<?php

require_once('vendor/autoload.php');

$f3 = Base::instance();

$f3->route('GET /', function () {
    echo Template::instance()->render('resources/views/pages/index.html');
});

$f3->run();
