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
       \App\User::insert([
            [
              'id'  			=> 1,
              'name'  			=> 'GBI NGADINEGARAN',
              'username'		=> 'ngadinegaran',
              'email' 			=> 'gbingadinegaran@gmail.com',
              'password'		=> bcrypt('gbi'),
              'gambar'			=> NULL,
              'level'			=> 'admin',
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now() 
            ],
            [
              'id'  			=> 2,
              'name'  			=> 'TEKNIK - DWIKAHARAP',
              'username'		=> 'teknik',
              'email' 			=> 'user_teknik@gmail.com',
              'password'		=> bcrypt('teknik'),
              'gambar'			=> NULL,
              'level'			=> 'admin',
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ],
            [
              'id'  			=> 3,
              'name'  			=> 'BENDAHARA',
              'username'		=> 'bendahara',
              'email' 			=> 'bendahara@gmail.com',
              'password'		=> bcrypt('bendahara'),
              'gambar'			=> NULL,
              'level'			=> 'user',
              'remember_token'	=> NULL,
              'created_at'      => \Carbon\Carbon::now(),
              'updated_at'      => \Carbon\Carbon::now()
            ]
        ]);
    }
}
