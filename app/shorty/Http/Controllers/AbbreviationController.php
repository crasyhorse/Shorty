<?php

declare(strict_types=1);

namespace Shorty\Http\Controllers;

use \Template;

class AbbreviationController
{
    public function get(): void
    {
        echo Template::instance()->render('resources/views/pages/index.html');
    }
}
