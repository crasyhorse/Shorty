<?php

declare(strict_types=1);

namespace Shorty\Models;

class Abbreviation extends BaseModel
{
    private $table_name = 'abbreviations';

    public function __construct(array $request = null)
    {
        parent::__construct($this->table_name);

        $this->fillable = ['id', 'short', 'long'];

        if (!empty($request)) {
            $this->fill($request);
        }
    }

    protected function fillAttributes(array $values): void
    {
        foreach ($this->fillable as $attribute) {
            $this->{$attribute} = $values[$attribute];
        }
    }
}
