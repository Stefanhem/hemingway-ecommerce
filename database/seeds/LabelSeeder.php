<?php

use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = [
            [
                'image' => 'images/labels/best-seller.svg',
                'name'  => 'Best Seller'
            ],
            [
                'image' => 'images/labels/free-delivery.svg',
                'name'  => 'Free delivery'
            ]
        ];
        \App\Label::insert($labels);
    }
}
