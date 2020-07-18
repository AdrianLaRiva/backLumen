<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'rut'      => '76.267.813-6',
            'name'     => "Administrador",
            'email'    => 'admin_apolo1@wedev.cl',
            'cargo'    => "administrador",
            'rol_id'   => '1',
            'password' => bcrypt("123456"),

        ]);

        DB::table('users')->insert([
            'rut'        => '12.345.678-9',
            'name'       => "Root",
            'email'      => 'admin@wedev.cl',
            'cargo'      => "Root",
            'rol_id'     => '1',
            'root'       => '1',
            'password'   => bcrypt("654321"),
            'root_token' => bcrypt("000000"),

        ]);
    }
}
