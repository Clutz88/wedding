<?php

namespace App\Enums;

use Filament\Support\Contracts\HasLabel;

enum DietaryRequirements: string implements HasLabel
{
    case DAIRY_FREE = 'Dairy Free';
    case VEGETARIAN = 'Vegetarian';
    case VEGAN = 'Vegan';
    case GLUTEN_FREE = 'Gluten Free';
    case NUT_ALLERGY = 'Nut Allergy';
    case SHELLFISH_ALLERGY = 'Shellfish Allergy';

    public function getLabel(): string
    {
        return $this->value;
    }
}
