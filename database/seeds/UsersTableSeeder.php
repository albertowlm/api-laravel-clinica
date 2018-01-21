<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Clin\Models\User::class, 1)->create([
            'email' => 'admin@clin.com'
        ]);
        factory(\Clin\Models\User::class, 19)->create();

    }
}
