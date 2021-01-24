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

    /**
     * @test
     * @group Modeltests
    */
    public function fill_fills_the_attributes_of_a_model_from_http_response_with_valid_attributes_only(): void
    {
        $f3 = Base::instance();
        $f3->set('QUIET', true);
        $f3->config('config/config.ini');

        $valid_responses = [
            ['id' => 7, 'short' => 'arccos', 'long' => 'arcus cosinus'],
            ['id' => 8, 'long' => 'arcus cotangens', 'short' => 'arccot'],
            ['short' => 'ARCH', 'id' => 9, 'long' => 'auto-regressive conditional heteroscedasticity'],
        ];

        $invalid_responses = [
            ['id' => 10, 'short' => 'arcoth', 'long' => 'area cotangens hyperbolicus', 'extrafield' => 'nonsense'],
        ];

        $i = 0;
        foreach ($valid_responses as $response) {
            $abbreviation = new Abbreviation($response);
            $this->assertEquals($response['id'], $abbreviation->id);
            $this->assertEquals($response['short'], $abbreviation->short);
            $this->assertEquals($response['long'], $abbreviation->long);
            $i++;
        }

        $i = 0;
        foreach ($invalid_responses as $response) {
            $abbreviation = new Abbreviation($response);
            $this->assertEquals(10, $abbreviation->id);
            $this->assertEquals('arcoth', $abbreviation->short);
            $this->assertEquals('area cotangens hyperbolicus', $abbreviation->long);
            $this->assertObjectNotHasAttribute('extrafield', $abbreviation);
            $i++;
        }
    }

}
