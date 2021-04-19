<?php

declare(strict_types=1);

namespace Shorty\Http\Controllers;

use Base;
use Shorty\Models\Abbreviation;
use Template;

class AbbreviationController
{
    private $f3;

    public function __construct()
    {
        $this->f3 = Base::instance();
    }

    public function get(): void
    {
        echo Template::instance()->render('resources/views/pages/index.html');
    }

    public function post(): void
    {
        $request = $this->f3->get('POST');

        $abbreviation = new Abbreviation($request);
        $abbreviation->save();
    }

    public function patch(): void
    {
        parse_str($this->f3->get('BODY'), $request);
        $id = $this->f3->get('PARAMS.id');
        $abbreviation = (new Abbreviation())->load(
            ['id = :id', ':id' => $id]
        );
        $abbreviation->short = $request['short'];
        $abbreviation->long = $request['long'];
        $abbreviation->save();
    }
}
