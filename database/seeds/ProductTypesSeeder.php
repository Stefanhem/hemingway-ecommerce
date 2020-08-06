<?php

use Illuminate\Database\Seeder;

class ProductTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            'Novčanici',
            'Torbe',
            'Wellness',
            'Office',
            'Moto oprema',
            'Sve ostalo',
            'Kravate & Aksesoari',
            'Muška Pećina',
            'Special Offer'
        ];

        foreach($types as $type) {
            \App\ProductType::create([
                'name' => $type,
            ]);
        }
    }
}
