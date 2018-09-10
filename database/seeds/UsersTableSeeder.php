<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('users')->insert([ // id = 1;
            'is_admin'       => true,
            'name'           => 'The Blog Owner',
            'email'          => 'root@admin.usr',
            'password'       => bcrypt('top-secret'),
            'remember_token' => str_random(10),
        ]);
        factory(App\User::class, 49)->create();
    }

}

