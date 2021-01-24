<?php

declare(strict_types=1);

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use \Base;
use Shorty\Models\Abbreviation;

final class AbbreviationTest extends TestCase
{

    /**
     * @test
     * @group Modeltests
    */
    public function all_returns_all_rows_from_a_table(): void
    {
        $f3 = Base::instance();
        $f3->set('QUIET', true);
        $f3->config('config/config.ini');
        
        $abbreviation = new Abbreviation();
        $actual = $abbreviation->all();
        $expected = [
            ["id" => 1, "short" => "Abb", "long" => "Abbildung"],
            ["id" => 2, "short" => "abs", "long" => "absolut"],
            ["id" => 3, "short" => "AC",  "long" => "axiom of choice"],
            ["id" => 4, "short" => "adj", "long" => "adjungiert"],
            ["id" => 5, "short" => "adj", "long" => "adjunkt"],
            ["id" => 6, "short" => "AGM", "long" => "arithmetisch-geometrisches Mittel"]

        ];

        $this->assertSame($expected, $actual);
    }
}
