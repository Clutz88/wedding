<?php

use App\Enums\PageStatus;

test('a page status has a human readable label', function (PageStatus $status, string $label) {
    expect($status->getLabel())->toBe($label);
})->with([
    'draft' => [PageStatus::DRAFT, 'Draft'],
    'published' => [PageStatus::PUBLISHED, 'Published'],
    'archived' => [PageStatus::ARCHIVED, 'Archived'],
]);
