<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('proveedores')->insert([
            'documento_identificacion' => '1002003004',
            'nombre' => 'Henry Ramirez',
            'ciudad' => 'Atuntaqui',
            'tipo_proveedor' => 'Credito',
            'direccion' => 'San Roque',
            'telefono' => '0298989890',
            'email' => Str::random(10).'@gmail.com',
            'estado' => 'Activo'
        ]);

        DB::table('proveedores')->insert([
            'documento_identificacion' => '3004005006001',
            'nombre' => 'Luis Miguel',
            'ciudad' => 'Ibarra',
            'tipo_proveedor' => 'Contado',
            'direccion' => 'El Olivo',
            'telefono' => '0867465688',
            'email' => Str::random(10).'@gmail.com',
            'estado' => 'Inactivo'
        ]);

        DB::table('proveedores')->insert([
            'documento_identificacion' => '1005009473',
            'nombre' => 'Lalo Landa',
            'ciudad' => 'Otavalo',
            'tipo_proveedor' => 'Credito',
            'direccion' => 'Cuatro Esquinas',
            'telefono' => '0987654321',
            'email' => Str::random(10).'@gmail.com',
            'estado' => 'Activo'
        ]);
    }
}
