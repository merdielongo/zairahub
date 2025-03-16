<?php

namespace Database\Seeders;

use App\Models\Currency;
use App\Models\Offer;
use App\Models\Pack;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OffersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            foreach (config('appoffers') as $offerData) {
                $offer = Offer::updateOrCreate(['name_fr' => $offerData['name_fr']
                ], [
                    'name_fr' => $offerData['name_fr'],
                    'name_en' => $offerData['name_en'],
                    'description_fr' => $offerData['description_fr'],
                    'description_en' => $offerData['description_en'],
                    'price' => $offerData['price'],
                    'is_trial' => $offerData['is_trial'] ?? false,
                    'currency_id' => Currency::getInstance($offerData['currency'])->id,
                    'options' => json_encode($offerData['options'])
                ]);

                foreach ($offerData['packs'] as $packData) {
                    $pack = Pack::where('name_fr', '=', $packData['name_fr'])->first();
                    if (!$pack) {
                        dd($packData[]);
                    }
                    if (!$offer->packs->contains('id', $pack->id)) {
                        $offer->packs()->attach($pack->id, ['value' => $packData['value']]);
                    }
                }


            }
        });
    }
}
