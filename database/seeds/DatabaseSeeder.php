<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //USUARIOS
        DB::table('users')->insert([
            'name' => 'Javier Velásquez',
            'email' => 'javier__velasquez@hotmail.com',
            'tipo' => 'Administrador Maestro',
            'password' => bcrypt('123456'),

            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('users')->insert([
            'name' => 'Isabel Diaz',
            'email' => 'isabeljdm@hotmail.com',
            'tipo' => 'Administrador',
            'password' => bcrypt('123456'),

            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('users')->insert([
            'name' => 'Cajero Nuevo',
            'email' => 'cajero@hotmail.com',
            'tipo' => 'Cajero',
            'password' => bcrypt('123456'),

            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('configuraciones')->insert([
            'empresa' => 'GRAMERO C.A.',
            'direccion' => 'Maturín - Edo. Monagas.',
            'rif' => 'J-020392827-4',
            'moneda' => 'Bs.',

            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);


    }
}
