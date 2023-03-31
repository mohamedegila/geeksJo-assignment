<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        'name' => 'Mohammed Egila',
        'email' => 'admin@admin.com',
        'password' => bcrypt('admin')
    ]);
    }
}
