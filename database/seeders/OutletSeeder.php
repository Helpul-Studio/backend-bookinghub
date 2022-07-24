<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OutletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('outlets')->insert([
            'outlet_name' => 'Happy Puppy Klandasan',
            'opening_hours' => '09:00',
            'closing_hours' => '12:00',
            'outlet_phone' => '08123456789',
            'instagram_link' => 'https://www.instagram.com/perabdulanduniawiiiii/',
            'price_outlet_per_hour' => '50000'
        ]);
    }
}
