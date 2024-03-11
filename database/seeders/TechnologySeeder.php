<?php

namespace Database\Seeders;

use App\Models\Technology;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Type;

use Illuminate\Support\Facades\Schema;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Technology::trunacate();
        Schema::enableForeignKeyConstraints();

        $allTechnology = [
            'News',
            'Update',
            'Release',
            'Technology',
            'Web',
            'Software',
            'Hardware',
            'Blockchain',
            'AI',
            'Machine Learning',
            'ChatGPT',

        ];

        foreach ($allTechnology as $singleTechnology) {
            $technology = Type::create([
                'title' => $singleTechnology,
                'slug' => str() -> slug($singleTechnology),
            ]);
        }
    }
}