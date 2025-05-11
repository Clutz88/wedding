<?php

namespace App\Filament\Resources\GuestResource\Widgets;

use App\Models\Guest;
use Filament\Widgets\ChartWidget;

class GuestAttendingPie extends ChartWidget
{
    protected static ?string $pollingInterval = null;

    protected static ?string $heading = 'Guest Attending';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'RSVPs',
                    'data' => [
                        Guest::where('attending', 1)->count(),
                        Guest::where('attending', 0)->count(),
                        Guest::whereNull('attending')->count(),
                    ],
                    'backgroundColor' => [
                        '#186031',
                        '#e7000b',
                        '#f8a187'
                    ]
                ]
            ],
            'labels' => ['Attending', 'Not attending', 'N/A']
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'x' => ['display' => false],
                'y' => ['display' => false]
            ],
        ];
    }
}
