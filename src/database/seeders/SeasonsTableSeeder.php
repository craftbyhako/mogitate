<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class SeasonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $seasons = ['春', '夏','秋', '冬'];

        $param = [];

        foreach ($seasons as $season) { 
            $param[] = [
                'season_name' => $season,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        DB::table('seasons')->insert($param);
    }
}
