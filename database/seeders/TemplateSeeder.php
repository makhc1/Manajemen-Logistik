<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Contoh 1: Menggunakan Query Builder (DB Facade)
        // \Illuminate\Support\Facades\DB::table('nama_tabel')->insert([
        //     'kolom1' => 'nilai1',
        //     'kolom2' => 'nilai2',
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ]);

        // Contoh 2: Menggunakan Eloquent ORM (Jika sudah punya Model)
        // \App\Models\NamaModel::create([
        //     'kolom1' => 'nilai1',
        //     'kolom2' => 'nilai2',
        // ]);

        // Contoh 3: Menggunakan Factory (Membuat data dummy masal)
        // \App\Models\NamaModel::factory(10)->create();
    }
}
