<?php

namespace Database\Seeders;

use App\Models\Bus_info;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bus_info::create([
            'no_bus' => 1,
            'route_id' => 1,
            'hour' => '11:00',
            'days' => '1,2,3,4,5,6,0',
            'seats' => 40,
            'duration' => '1H',
            'price' => 26.00,
            'state' => 1
        ]);
        Bus_info::create([
            'no_bus' => 2,
            'route_id' => 1,
            'hour' => '12:00',
            'days' => '1,6,0',
            'seats' => 25,
            'duration' => '1H',
            'price' => 30.00,
            'state' => 1
        ]);
        Bus_info::create([
            'no_bus' => 1,
            'route_id' => 2,
            'hour' => '09:00',
            'days' => '1,3,5',
            'seats' => 40,
            'duration' => '2H',
            'price' => 50.00,
            'state' => 1
        ]);
        Bus_info::create([
            'no_bus' => 1,
            'route_id' => 2,
            'hour' => '12:00',
            'days' => '2,4,5',
            'seats' => 4,
            'duration' => '2H',
            'price' => 34.00,
            'state' => 1
        ]);
        Bus_info::create([
            'no_bus' => 3,
            'route_id' => 3,
            'hour' => '12:00',
            'days' => '2',
            'seats' => 56,
            'duration' => '6H',
            'price' => 1,
            'state' => 1
        ]);
        Bus_info::create([
            'no_bus' => 4,
            'route_id' => 3,
            'hour' => '10:00',
            'days' => '1,2,3,4,5,6,0',
            'seats' => 65,
            'duration' => '3H',
            'price' => 23.00,
            'state' => 1
        ]);
    }
}
