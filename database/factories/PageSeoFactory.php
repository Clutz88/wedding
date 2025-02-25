<?php

namespace Database\Factories;

use App\Models\Page;
use App\Models\PageSeo;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class PageSeoFactory extends Factory
{
    protected $model = PageSeo::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->faker->text(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

            'page_id' => Page::factory(),
        ];
    }
}
