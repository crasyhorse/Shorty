<?php

declare(strict_types=1);

namespace Tests\Unit\Models;

use Base;
use PHPUnit\Framework\TestCase;
use Shorty\Models\Abbreviation;

final class AbbreviationTest extends TestCase
{
    protected function setup(): void
    {
        $f3 = Base::instance();
        $f3->set('QUIET', true);
        $f3->config('config/config.ini');
    }

    /**
     * @test
     * @group Modeltests
     */
    public function all_returns_all_rows_from_a_table(): void
    {
        $abbreviation = new Abbreviation();
        $actual = $abbreviation->all();
        $expected = [
            ['id' => 1, 'short' => 'Abb', 'long' => 'Abbildung'],
            ['id' => 2, 'short' => 'abs', 'long' => 'absolut'],
            ['id' => 3, 'short' => 'AC',  'long' => 'axiom of choice'],
            ['id' => 4, 'short' => 'adj', 'long' => 'adjungiert'],
            ['id' => 5, 'short' => 'adj', 'long' => 'adjunkt'],
            ['id' => 6, 'short' => 'AGM', 'long' => 'arithmetisch-geometrisches Mittel'],
        ];

        $this->assertSame($expected, $actual);
    }

    public function valid_request_values(): array
    {
        return [
            [['id' => 7, 'short' => 'arccos', 'long' => 'arcus cosinus']],
            [['id' => 8, 'long' => 'arcus cotangens', 'short' => 'arccot']],
            [['short' => 'ARCH', 'id' => 9, 'long' => 'auto-regressive conditional heteroscedasticity']],
        ];
    }

    /**
     * @test
     * @group Modeltests
     * @dataProvider valid_request_values
     */
    public function fill_fills_the_attributes_of_a_model_from_http_response_with_valid_attributes(array $request): void
    {
        $abbreviation = new Abbreviation($request);
        $this->assertEquals($request['id'], $abbreviation->id);
        $this->assertEquals($request['short'], $abbreviation->short);
        $this->assertEquals($request['long'], $abbreviation->long);
    }

    public function invalid_request_values(): array
    {
        return [
            [['id' => 10, 'short' => 'arcoth', 'long' => 'area cotangens hyperbolicus', 'extrafield' => 'nonsense']],
        ];
    }

    /**
     * @test
     * @group Modeltests
     * @dataProvider invalid_request_values
     */
    public function fill_does_not_use_invalid_attributes_to_fill_a_model(array $request): void
    {
        $abbreviation = new Abbreviation($request);
        $this->assertEquals(10, $abbreviation->id);
        $this->assertEquals('arcoth', $abbreviation->short);
        $this->assertEquals('area cotangens hyperbolicus', $abbreviation->long);
        $this->assertObjectNotHasAttribute('extrafield', $abbreviation);
    }
}
