<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('warehouses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('capacity')->default(10000);
            $table->string('status')->default('AKTIF');
            $table->timestamps();
        });

        // Insert initial data
        DB::table('warehouses')->insert([
            ['name' => 'Gudang Utama Jakarta', 'capacity' => 15000, 'status' => 'AKTIF', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gudang Cabang Surabaya', 'capacity' => 10000, 'status' => 'OPERASIONAL', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Gudang Transit Bandung', 'capacity' => 5000, 'status' => 'TRANSIT', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('warehouses');
    }
};
