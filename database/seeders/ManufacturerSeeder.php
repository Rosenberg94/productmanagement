<?php

namespace Database\Seeders;

use App\Models\Manufacturer;
use Illuminate\Database\Seeder;

class ManufacturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Manufacturer::create([
            'name' => 'Johnson',
            'country' => 'USA'
        ]);
        Manufacturer::create([
            'name' => 'FASDS',
            'country' => 'CHINA'
        ]);
        Manufacturer::create([
            'name' => 'UMBRELLA',
            'country' => 'GB'
        ]);
        Manufacturer::create([
            'name' => 'CH',
            'country' => 'CHINA'
        ]);
    }
}
