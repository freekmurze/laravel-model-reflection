<?php

use Illuminate\Support\Collection;
use Spatie\ModelReflection\Attributes\AttributeFinder;
use Spatie\ModelReflection\Tests\TestSupport\Models\TestModel;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('can get the attributes of a model', function () {
    $attributes = AttributeFinder::forModel(new TestModel());

    expect($attributes)->toHaveCount(4);

    matchesAttributesSnapshot($attributes);
});

function matchesAttributesSnapshot(Collection $attributes)
{
    $attributes = $attributes->map->toArray();

    $attributes = $attributes->toArray();

    assertMatchesSnapshot($attributes);
}
