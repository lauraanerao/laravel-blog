<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Categoria::insert([
            [
                'nome' => 'Política',
                'slug' => 'politica'
            ],
            [
                'nome' => 'Tecnologia',
                'slug' => 'tecnologia'
            ],
            [
                'nome' => 'Esporte',
                'slug' => 'esporte'
            ]
        ]);
    }
}
