<?php

use Illuminate\Database\Seeder;
use App\Models\Adbanner;

class AdbannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Adbanner::truncate();
        factory(Adbanner::class, 9)->create();
    }
}
