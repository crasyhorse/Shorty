<?php

require_once('vendor/autoload.php');

$f3 = Base::instance();
$f3->set('AUTOLOAD', 'app/');
$f3->config('config/config.ini');

$f3->run();
