<?php

namespace Database\Seeders;

use App\Models\CategoryApplication;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ApplicationCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name_fr' => 'ERP',
                'name_en' => 'ERP',
            ],
            [
                'name_fr' => 'Retail',
                'name_en' => 'Retail',
            ],
            [
                'name_fr' => 'Hospitality',
                'name_en' => 'Hospitality',
            ],
            [
                'name_fr' => 'Supply Chain',
                'name_en' => 'Supply Chain',
            ],
            [
                'name_fr' => 'Services',
                'name_en' => 'Services',
            ],
        ];

        foreach ($data as $datum) {
            CategoryApplication::updateOrCreate([
                'name_fr' => $datum['name_fr'],
                'name_en' => $datum['name_en'],
            ]);
        }
    }
}
