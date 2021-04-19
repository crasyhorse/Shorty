<?php

declare(strict_types=1);

namespace Tests\Unit\Models;

use Base;
use PDOException;
use PHPUnit\Framework\TestCase;
use Shorty\Models\Abbreviation;

final class AbbreviationTest extends TestCase
{
    private $f3;

    protected function setup(): void
    {
        $this->f3 = Base::instance();
        $this->f3->set('QUIET', true);
        $this->f3->config('config/config.ini');
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

    /**
     * @test
     * @group Modeltests
     */
    public function findIt_returns_an_abbreviation_based_on_a_given_id(): void
    {
        $abbreviation = new Abbreviation();
        $expected = $abbreviation->load(
            ['id = :id', ':id' => 3]
        );
        $actual = $abbreviation->findIt(3);

        $this->assertEquals($expected, $actual);
    }

    /**
     * @test
     * @group Modeltests
     */
    public function findIt_returns_null_if_a_given_id_does_not_exist(): void
    {
        $abbreviation = new Abbreviation();
        $actual = $abbreviation->findIt(666);

        $this->assertNull($actual);
    }

    /**
     * @test
     * @group Modeltests
     */
    public function updateIt_modifies_values_of_an_existing_abbreviation(): void
    {
        $request = ['id' => 3, 'short' => 'AC', 'long' => 'Axiom of Choice'];

        $expected = new Abbreviation($request);
        $actual = (new Abbreviation())->findIt(3);
        $actual->updateIt($request);

        $this->assertEquals($expected->id, $actual->id);
        $this->assertEquals($expected->short, $actual->short);
        $this->assertEquals($expected->long, $actual->long);

        /* Clean up */
        $actual->id = 3;
        $actual->short = 'AC';
        $actual->long = 'axiom of choice';
        $actual->save();
    }

    /**
     * @test
     * @group Modeltests
     */
    public function updateIt_throws_an_exception_if_a_given_id_does_not_exist_in_the_database(): void
    {
        $this->expectException(PDOException::class);

        $request = ['id' => 10, 'short' => 'arcoth', 'long' => 'Area Cotangens Hyperbolicus'];

        $actual = new Abbreviation(['id' => 10, 'short' => 'arcoth', 'long' => 'area cotangens hyperbolicus']);
        $actual->updateIt($request);
        ob_end_clean();

        /* Clean up */
        $actual->erase(
            ['id = :id', ':id' => 10]
        );
    }
}
