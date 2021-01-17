<?php

declare(strict_types=1);

namespace Shorty\Models;

use Shorty\Models\BaseModel;

class Abbreviation extends BaseModel
{
    private $table_name = 'abbreviations';

    public function __construct()
    {
        parent::__construct($this->table_name);
    }

}
