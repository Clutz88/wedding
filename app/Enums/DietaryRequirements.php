<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum DietaryRequirements: string implements HasLabel
{
    case VEGETARIAN = 'Vegetarian';
    case PESCATARIAN = 'Pescatarian';
    case VEGAN = 'Vegan';
    case DAIRY_FREE = 'Dairy Free';
    case GLUTEN_FREE = 'Gluten Free';
    case NUT_ALLERGY = 'Nut Allergy';

    public function getLabel(): string
    {
        return $this->value;
    }
}
