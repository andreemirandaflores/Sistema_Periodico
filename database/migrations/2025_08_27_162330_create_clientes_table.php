<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('clientes', function (Blueprint $table) {
            $table->string('NIT', 14)->primary();
            $table->string('NombreCliente', 20);
            $table->string('PaternoCliente', 20);
            $table->string('MaternoCliente', 20)->nullable();
            $table->string('Telefono', 20)->nullable();
        });
    }

    public function down(): void {
        Schema::dropIfExists('clientes');
    }
};
