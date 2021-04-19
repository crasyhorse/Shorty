<?php

declare(strict_types=1);

namespace Shorty\Models;

use PDOException;
use Throwable;

class Abbreviation extends BaseModel
{
    private $table_name = 'abbreviation';

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
        $id = $this->id;
        foreach ($this->fillable as $attribute) {
            $this->{$attribute} = $values[$attribute];
        }
        $this->id = empty($id) ? $this->id : $id;
    }

    final public function findIt(int $id): ?self
    {
        try {
            return $this->load(
                ['id = :id', ':id' => $id]
            );
        } catch (Throwable $t) {
            return null;
        }
    }

    final public function updateIt(array $attributes): void
    {
        if ($this->dry() === true) {
            throw new PDOException();
        }

        $this->fill($attributes);
        $this->save();
    }
}
