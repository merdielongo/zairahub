<?php

namespace Database\Seeders;

use App\Models\Application;
use App\Models\Module;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModuleApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $modules = config('appmodule');
        $applications = config('appapplication');

        foreach ($modules as $module) {
            Module::updateOrCreate([
                'name' => $module['name'],
                'name_fr' => $module['name_fr'] ?? null,
                'name_en' => $module['name_en'] ?? null,
                'is_active' => $module['is_active'] ?? false,
            ]);
        }

        foreach ($applications as $application) {
            Application::updateOrCreate([
                'name_fr' => $application['name_fr'],
                'name_en' => $application['name_en'] ?? null,
                'category_application_id' => DB::table('category_applications')->where('name_fr', $application['category'])->value('id'),
                'module_id' => DB::table('modules')->where('name', $application['module'])->value('id'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
