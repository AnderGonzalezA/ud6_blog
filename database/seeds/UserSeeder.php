<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'admin',
        	'email' => 'admin@example.com',
          'password' => bcrypt('secret'),
          'role' => 'admin'
        ]);
        $user->roles()->attach(Role::where('name', 'admin')->first());

        $user = User::create([
        	'name' => 'editor',
        	'email' => 'editor@example.com',
          'password' => bcrypt('secret'),
          'role' => 'editor'
      	]);
        $user->roles()->attach(Role::where('name', 'editor')->first());

    }
}
