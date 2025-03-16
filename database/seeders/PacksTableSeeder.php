<?php

namespace Database\Seeders;

use App\Models\Pack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (config('apppacks') as $pack) {
            Pack::updateOrCreate([
                'name_fr' => $pack['name_fr'],
                'name_en' => $pack['name_en'],
            ]);
        }
    }
}
