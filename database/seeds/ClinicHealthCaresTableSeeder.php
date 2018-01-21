<?php

use Illuminate\Database\Seeder;

class ClinicHealthCaresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Clin\Models\ClinicHealthCare::class, 10)->create();
    }
}
