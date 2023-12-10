<?php

namespace Database\Seeders;

use App\Models\Bus_route;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RouteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bus_route::create([
            'name' =>'Zaragoza-Teruel'
        ]);
        Bus_route::create([
            'name' =>'Teruel-Zaragoza'
        ]);
        Bus_route::create([
            'name' =>'Zaragoza-Huesca'
        ]);
    }
}
