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

        DB::table('configuraciones')->insert([
            'empresa' => 'GRAMERO C.A.',
            'direccion' => 'Maturín - Edo. Monagas.',
            'rif' => 'J-020392827-4',
            'moneda' => 'Bs.',

            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('ivas')->insert([
            'iva' => '12',
            'desde' => '2015-12-12',
            
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Carnes',
            'tipo' => 'Items',

            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Carbohidratos',
            'tipo' => 'Items',

            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Postre',
            'tipo' => 'Productos',

            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('categorias')->insert([
            'nombre' => 'Bebida',
            'tipo' => 'Productos',

            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);


        DB::table('unidades_compras')->insert([

            'nombre' => 'Kilogramos',
            'nomenclatura' => 'Kg.',

            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('unidades_compras')->insert([

            'nombre' => 'Unidades',
            'nomenclatura' => 'U.',

            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('unidades_ventas')->insert([

            'id_unidad_compra' => '1',
            'nombre' => 'Gramos',
            'nomenclatura' => 'gr.',
            'equivalencia' => '1000',

            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('unidades_ventas')->insert([

            'id_unidad_compra' => '2',
            'nombre' => 'Unidad',
            'nomenclatura' => 'u.',
            
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('items')->insert([

            'nombre' => 'Pollo',
            'id_categoria' => '1',
            'id_unidad_compra' => '1',
            'alertar' => '10',
            
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('items')->insert([

            'nombre' => 'Panes',
            'id_categoria' => '2',
            'id_unidad_compra' => '2',
            'alertar' => '50',
            
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('proveedores')->insert([

            'rif' => 'V-20376542-2',
            'nombre' => 'Proveedor Velásquez',
            'direccion' => 'La ceiba 1 de san martín',
            'telefono' => '04262804755',
            'email' => 'proveedorvelasquez@gmail.com',
            'id_usuario' => '1',
            
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('proveedores')->insert([

            'rif' => 'V-20375885-2',
            'nombre' => 'Proveedor Diaz',
            'direccion' => 'Calle quebrada honda',
            'telefono' => '04128418606',
            'email' => 'proveedordiaz@gmail.com',
            'id_usuario' => '1',
            
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('metodos_pagos')->insert([

            'nombre' => 'Efectivo',
            'tipo' => 'Clientes',
            
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('metodos_pagos')->insert([

            'nombre' => 'Débito',
            'tipo' => 'Clientes',
            
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('metodos_pagos')->insert([

            'nombre' => 'Crédito',
            'tipo' => 'Proveedores',
            
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);

        DB::table('metodos_pagos')->insert([

            'nombre' => 'Efectivo',
            'tipo' => 'Proveedores',
            
            'created_at' => new DateTime,
            'updated_at' => new DateTime
        ]);


    }
}
