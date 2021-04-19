<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers;

use Base;
use Exception;
use PDOException;
use PHPUnit\Framework\TestCase;
use Shorty\Models\Abbreviation;

final class AbbreviationControllerTest extends TestCase
{
    private $f3;

    protected function setup(): void
    {
        $this->f3 = Base::instance();
        $this->f3->set('QUIET', false);
        $this->f3->config('config/config.ini');
    }

    /**
     * @test
     * @group AbbreviationControllerTest
     */
    public function a_post_request_adds_a_new_abbreviation_to_the_database(): void
    {
        $abbreviation = new Abbreviation();
        $abbreviation->erase(
            ['id = :id', ':id' => 7]
        );

        $this->f3->mock('POST /abbreviation', ['id' => 7, 'short' => 'arccos', 'long' => 'arcus cosinus']);

        $expected = new Abbreviation(['id' => 7, 'short' => 'arccos', 'long' => 'arcus cosinus']);
        $actual = $abbreviation->load(
            ['id = :id', ':id' => 7]
        );

        $this->assertEquals($expected->id, $actual->id);
        $this->assertEquals($expected->short, $actual->short);
        $this->assertEquals($expected->long, $actual->long);

        /* Clean up */
        $abbreviation->erase(
            ['id = :id', ':id' => 7]
        );
    }

    /**
     * @test
     * @group AbbreviationControllerTest
     */
    public function a_patch_request_updates_an_abbreviation_in_the_database(): void
    {
        $abbreviation = new Abbreviation();

        $this->f3->mock('PATCH /abbreviation/5', ['id' => 5, 'short' => 'adj', 'long' => 'Adjunkt']);
        $expected = new Abbreviation(['id' => 5, 'short' => 'adj', 'long' => 'Adjunkt']);
        $actual = $abbreviation->load(
            ['id = :id', ':id' => 5]
        );

        $this->assertEquals($expected->id, $actual->id);
        $this->assertEquals($expected->short, $actual->short);
        $this->assertEquals($expected->long, $actual->long);

        /* Clean up */
        $actual->short = 'adj';
        $actual->long = 'adjunkt';
        $actual->save();
    }

    /**
     * @test
     * @group AbbreviationControllerTest
     * @doesNotPerformAssertions
     */
    public function a_patch_request_may_not_add_a_new_abbreviation_to_the_database(): void
    {
        $this->expectException(Exception::class);
        $this->expectExceptionMessage('Unknown abbreviation');
        $this->expectExceptionCode(404);

        $this->f3->mock('PATCH /abbreviation/666', ['id' => 666, 'short' => 'usw', 'long' => 'und so weiter']);
    }

    /**
     * @test
     * @group AbbreviationControllerTest
     */
    public function post_must_react_to_unique_key_violation_when_adding_an_already_existing_abbreviation(): void
    {
        $this->expectException(PDOException::class);
        ob_end_clean();

        $this->f3->mock('POST /abbreviation', ['id' => 666, 'short' => 'AC',  'long' => 'axiom of choice']);
    }
}
