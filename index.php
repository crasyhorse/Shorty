<?php

require_once('vendor/autoload.php');

$f3 = Base::instance();
$f3->set('AUTOLOAD', 'app/');

$f3->map('/', 'Shorty\Http\Controllers\AbbreviationController');

$f3->run();
