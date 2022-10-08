<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        \App\Models\admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        \App\Models\User::create([
            'name'=>'Kesha',
            'email'=>'admin@admin.com',
            'password'=>Hash::make('password'),
        ]);
        
        \App\Models\User::create([
            'name'=>'Kesha1',
            'email'=>'admin1@admin.com',
            'password'=>Hash::make('password'),
        ]);
    }
}
