<?php

namespace Alirezasalehizadeh\Random\Test;

use Random\Engine\Mt19937;
use Random\IntervalBoundary;
use Alirezasalehizadeh\Random\Random;
use Random\Engine\Xoshiro256StarStar;
use Random\Engine\PcgOneseq128XslRr64;

beforeEach(function () {
    $this->random = new Random;
});

test('canPickAnRandomInt', function () {

    expect(

        in_array($this->random->int(1, 5), [1, 2, 3, 4, 5])

    )->toBeTrue();
});

test('canGenerateAnRandomInt', function () {

    expect(

        $this->random->int(),

    )->toBeInt();
});

test('canGenerateAnRandomFloat', function () {

    expect(

        $this->random->float(),
        $this->random->float(1.0, 5.3),
        $this->random->float(1.0, 5.3, IntervalBoundary::ClosedClosed)

    )->toBeFloat();
});

test('canGenerateAnRandomStringWithSpecificLength', function () {

    expect(

        strlen((new Random)->byte(5))

    )->toBe(5);
});

test('canGenerateAnRandomStringFromGivenString', function () {

    expect(

        strlen((new Random)->string('foo', 2))

    )->toBe(2);
});

test('canGenerateAnRandomArrayFromGivenArray', function () {

    expect(

        (new Random)->array(['foo', 'bar'])

    )->toBeArray();
});

test('canPickRandomElementsFromGivenArray', function () {

    expect(

        count((new Random)->pick(['foo', 'bar']))
        //count((new Random)->pick(['name1' => 'foo', 'name2' => 'bar']))

    )->toBe(1);

    expect(

        count((new Random)->pick(['foo', 'bar', 'baz'], 2))
        //count((new Random)->pick(['name1' => 'foo', 'name2' => 'bar', 'name3' => 'baz'], 2))

    )->toBe(2);
});

test('canGenerateAnRandomStringWithMersenneTwisterEngine', function () {

    expect(

        (new Random(new Mt19937))->generate()

    )->toBeString();
});

test('canGenerateAnRandomStringWithPCGEngine', function () {

    expect(

        (new Random(new PcgOneseq128XslRr64))->generate()

    )->toBeString();
});

test('canGenerateAnRandomStringWithXoshiroEngine', function () {

    expect(

        (new Random(new Xoshiro256StarStar))->generate()

    )->toBeString();
});

test('canChangeEngine', function () {

    $random = new Random(new Mt19937);

    expect(

        $random->generate()

    )->toBeString();

    $random->engine = new Xoshiro256StarStar;

    expect(

        $random->jump()

    )->toBeNull();
});
