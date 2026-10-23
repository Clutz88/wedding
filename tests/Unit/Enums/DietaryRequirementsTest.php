<?php

use App\Enums\DietaryRequirements;

test('a dietary requirement uses its value as the label', function (DietaryRequirements $requirement) {
    expect($requirement->getLabel())->toBe($requirement->value);
})->with(DietaryRequirements::cases());
