<?php

namespace App\Filament\Resources\RsvpResource\Widgets;

use App\Models\Rsvp;
use Filament\Widgets\ChartWidget;

class Stats extends ChartWidget
{
    protected ?string $pollingInterval = null;

    protected ?string $heading = 'RSVPs Completed';

    protected function getData(): array
    {
        return [
            'datasets' => [
                [
                    'label' => 'RSVPs',
                    'data' => [
                        Rsvp::whereNotNull('attending')->count(),
                        Rsvp::whereNull('attending')->count(),
                    ],
                    'backgroundColor' => [
                        '#186031',
                        '#e7000b'
                    ]
                ]
            ],
            'labels' => ['Completed', 'Uncompleted']
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
