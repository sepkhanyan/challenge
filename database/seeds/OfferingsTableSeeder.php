<?php

use Illuminate\Database\Seeder;
use App\Offering;

class OfferingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offerings = [
            ['title' => 'test 1', 'price' => '10'],
            ['title' => 'test 2', 'price' => '15'],
            ['title' => 'test 3', 'price' => '20'],
        ];

        Offering::insert($offerings);
    }
}
