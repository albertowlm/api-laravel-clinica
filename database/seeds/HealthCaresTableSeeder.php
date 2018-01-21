<?php

use Illuminate\Database\Seeder;

class HealthCaresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Clin\Models\HealthCare::class, 10)->create();
    }
}
