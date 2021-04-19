<?php

declare(strict_types=1);

namespace Shorty\Http\Controllers;

use Base;
use PDOException;
use Shorty\Models\Abbreviation;
use Template;
use Throwable;

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
        try {
            $abbreviation = new Abbreviation($request);
            $abbreviation->save();
        } catch (Throwable $t) {
            throw new PDOException();
        }
    }

    public function patch(): void
    {
        parse_str($this->f3->get('BODY'), $request);
        $id = (int) $this->f3->get('PARAMS.id');

        $abbreviation = (new Abbreviation())->findIt($id);

        if (empty($abbreviation)) {
            throw new PDOException();
        }

        $abbreviation->updateIt($request);
    }
}
