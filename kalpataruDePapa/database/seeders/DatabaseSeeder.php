<?php

namespace Database\Seeders;

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
        // User::factory(10)->create();


        \App\Models\User::factory()->create([
           'role_id'=>'1',
           'name'=>'gorka',
           'email'=>'gorkafreirefulgencio@gmail.com',
           'email_verifed_at'=>now(),
           'password'=>Hash::make('12345678'),
           'id_curso'=>'2',
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
