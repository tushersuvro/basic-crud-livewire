<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // varying number of issues (from 1 to 5) rows each client row
        \App\Models\Client::factory(10)->create()->each( function($cl) {
            $cl->issues()->saveMany(
                \App\Models\Issue::factory(rand(1,5))->make()
            );
        });
    }
}
