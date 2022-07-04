<?php

namespace Database\Seeders;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
        Role::create(['name' => 'User']);
        Role::create(['name' => 'Admin']);

        User::create([
            'first_name' => "Phạm",
            'last_name' => 'Long',
            'email' => 'long@gmail.com',
            'phone' => '1666111488',
            'password' => bcrypt('12345678'),
            'role_id' => '2',
        ]);
        
        $this->call([
                   
        ]);
    }
}
