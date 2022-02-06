<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $lines = array('Northern', 'Victoria', 'Picadilly');
        foreach ($lines as $line) {
            DB::table('lines')->insert([
                'slug' => strtolower($line),
                'name' => $line,
            ]);
        }
    }
}
