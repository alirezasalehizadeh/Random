<?php

namespace Alirezasalehizadeh\Random\Test;

use Alirezasalehizadeh\Random\Engines\MersenneTwisterEngine;
use Alirezasalehizadeh\Random\Engines\PCGEngine;
use Alirezasalehizadeh\Random\Engines\XoshiroEngine;
use Alirezasalehizadeh\Random\Random;

test('canPickAnRandomInt', function () {

    expect(

        in_array((new Random)->pickInt(1, 5), [1, 2, 3, 4, 5])

    )->toBeTrue();
});

test('canMakeAnRandomInt', function () {

    expect(

        (new Random)->randomInt()

    )->toBeInt();
});

test('canReturnAnStringWithSpecificLength', function () {

    expect(

        strlen((new Random)->randomString(5))

    )->toBe(5);
});

test('canMakeAnRandomStringFromGivenString', function () {

    expect(

        strlen((new Random)->pickString('foo'))

    )->toBe(3);
});

test('canMakeAnRandomArrayFromGivenArray', function () {

    expect(

        (new Random)->randomArray(['foo', 'bar'])
        //(new Random)->randomArray(['foo' => 'bar'])

    )->toBeArray();
});

test('canChoiceRandomElementsFromGivenArray', function () {

    expect(

        count((new Random)->choice(['foo', 'bar']))
        //count((new Random)->choice(['name1' => 'foo', 'name2' => 'bar']))

    )->toBe(1);

    expect(

        count((new Random)->choice(['foo', 'bar', 'baz'], 2))
        //count((new Random)->choice(['name1' => 'foo', 'name2' => 'bar', 'name3' => 'baz'], 2))

    )->toBe(2);
});

test('canGenerateAnRandomStringWithMersenneTwisterEngine', function () {

    expect(

        (new Random(new MersenneTwisterEngine))->getEngine()->generate()

    )->toBeString();
});

test('canGenerateAnRandomStringWithPCGEngine', function () {

    expect(

        (new Random(new PCGEngine))->getEngine()->generate()

    )->toBeString();
});

test('canGenerateAnRandomStringWithXoshiroEngine', function () {

    expect(

        (new Random(new XoshiroEngine))->getEngine()->generate()

    )->toBeString();
});
