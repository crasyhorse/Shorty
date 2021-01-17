<?php

declare(strict_types=1);

namespace Shorty\Models;

use \Base;
use DB\SQL;
use DB\SQL\Mapper;

abstract class BaseModel extends Mapper
{
    public function __construct(string $table_name)
    {
        $f3 = Base::instance();
        $database_name = $f3->get('database_name');

        $database = new SQL($database_name);
        parent::__construct($database, $table_name);
    }

    public function all(): array
    {
        $data = [];

        for ($this->load(); !$this->dry(); $this->next()) {
            $data[] = $this->cast();
        }

        return $data;
    }
}
