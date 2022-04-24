<?php

namespace Database\Seeders;

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
        DB::table('users')->insert([
           'username' => env('ADMIN_USERNAME', 'admin'),
           'password' => env('ADMIN_PASSWORD_HASH', '$2y$10$sxYNd8CvZwHdRq0OhuP8LubQbp/pht4OQ4Owiz9iVL8GqUN7ox3Em') // "password"
        ]);
    }
}
