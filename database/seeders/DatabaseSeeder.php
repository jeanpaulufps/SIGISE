<?php

namespace Database\Seeders;

use App\Models\Deportista;
use App\Models\Grupo;
use App\Models\Producto;
use App\Models\Sede;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 🔐 Usuario admin
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@ise.com',
            'password' => Hash::make('12345678')
        ]);

        // 📍 SEDES
        $sede1 = Sede::create([
            'nombre' => 'Sede Centro',
            'direccion' => 'Calle 10 #15-20'
        ]);

        $sede2 = Sede::create([
            'nombre' => 'Sede Norte',
            'direccion' => 'Av 5 #20-30'
        ]);

        $sede3 = Sede::create([
            'nombre' => 'Sede Sur',
            'direccion' => 'Carrera 8 #12-40'
        ]);

        // 📚 GRUPOS
        $grupos = [];

        foreach (
            [
                'Sub-12',
                'Sub-14',
                'Sub-16',
                'Sub-18'
            ] as $nombre
        ) {

            $grupos[] = Grupo::create([
                'nombre' => $nombre,
                'sede_id' => collect([$sede1, $sede2, $sede3])->random()->id
            ]);
        }

        // 🏐 DEPORTISTAS
        for ($i = 1; $i <= 50; $i++) {

            Deportista::create([
                'nombres' => 'Jugador ' . $i,
                'apellidos' => 'Apellido ' . $i,
                'documento' => '1000' . $i,
                'fecha_nacimiento' => now()->subYears(rand(10, 18)),
                'telefono' => '30012345' . rand(10, 99),
                'direccion' => 'Dirección ' . $i,
                'grupo_id' => collect($grupos)->random()->id
            ]);
        }

        // 🛒 PRODUCTOS
        Producto::insert([
            [
                'nombre' => 'Uniforme Oficial',
                'precio' => 120000,
                'stock' => 50,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Camiseta Entrenamiento',
                'precio' => 60000,
                'stock' => 80,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Short Deportivo',
                'precio' => 40000,
                'stock' => 70,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Rodilleras',
                'precio' => 35000,
                'stock' => 40,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
