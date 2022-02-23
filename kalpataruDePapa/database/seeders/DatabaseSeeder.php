<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();


        \App\Models\User::factory()->create([
           'role_id'=>'1',
           'name'=>'papa',
           'email'=>'papa@papa.com',
           'password'=>Hash::make('x'),
           'id_curso'=>'1',
           'reenember_token'=> Str::random(10),

        ]);
        //Seeders Roles
        \App\Models\Role::factory()->create([
            'name'=>'admin',
            'display_name'=> 'administrador',
        ]);
        \App\Models\Role::factory()->create([
            'name'=>'user',
            'display_name'=> 'usurio',
        ]);
       
    }
}
