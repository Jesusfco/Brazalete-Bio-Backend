<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'name' => "Jesús Fco Cortés",
            'email' => 'jfcr@live.com',
            'phone'=> '9611221222',
            'user_type' => 4,
            'status' => 1,
            // 'gender' => 1,
            
            'password' => bcrypt('oaxaca2015'),
            'created_at' => date_create(),
            'updated_at' => date_create(),
        ]);
    }
}
