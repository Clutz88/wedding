<?php

namespace App\Filament\Resources\GuestResource\Widgets;

use App\Models\Guest;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class GuestStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Day Guests', Guest::where('type', 'day')->count()),
            Stat::make('Evening Guests', Guest::where('type', 'evening')->count()),
            Stat::make('Total Guests', Guest::count()),
            Stat::make('Day Attending', Guest::where('type', 'day')->where('attending', 1)->count()),
            Stat::make('Evening Attending', Guest::where('type', 'evening')->where('attending', 1)->count()),
            Stat::make('Total Attending', Guest::where('attending', 1)->count()),

        ];
    }
}
