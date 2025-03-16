<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class OrganizationTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name_fr' => 'Entreprise', 'name_en' => 'Company'],
            ['name_fr' => 'Société coopérative', 'name_en' => 'Cooperative Society'],
            ['name_fr' => 'Auto-entrepreneur', 'name_en' => 'Self-employed'],
            ['name_fr' => 'Association professionnelle', 'name_en' => 'Professional Association'],

            ['name_fr' => 'Établissement scolaire', 'name_en' => 'School'],
            ['name_fr' => 'Université / Institut de formation', 'name_en' => 'University / Training Institute'],
            ['name_fr' => 'Administration publique', 'name_en' => 'Public Administration'],
            ['name_fr' => 'Établissement hospitalier', 'name_en' => 'Hospital'],

            ['name_fr' => 'Organisation Non Gouvernementale (ONG)', 'name_en' => 'Non-Governmental Organization (NGO)'],
            ['name_fr' => 'Fondation', 'name_en' => 'Foundation'],
            ['name_fr' => 'Association à but non lucratif', 'name_en' => 'Non-Profit Organization'],

            ['name_fr' => 'Banque', 'name_en' => 'Bank'],
            ['name_fr' => 'Mutuelle', 'name_en' => 'Mutual Insurance'],
            ['name_fr' => 'Microfinance', 'name_en' => 'Microfinance'],

            ['name_fr' => 'Entreprise industrielle', 'name_en' => 'Industrial Company'],
            ['name_fr' => 'Exploitation agricole', 'name_en' => 'Agricultural Exploitation'],
            ['name_fr' => 'Société de transport / Logistique', 'name_en' => 'Transport / Logistics Company'],
        ];

        foreach ($types as &$type) {
            $type['created_at'] = Carbon::now();
            $type['updated_at'] = Carbon::now();
        }

        DB::table('organization_types')->insert($types);
    }
}
