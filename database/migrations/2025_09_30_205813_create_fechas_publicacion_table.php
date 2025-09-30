<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('fechas_publicacion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('CodVenta');
            $table->date('FechaPublicacion');

            $table->foreign('CodVenta')->references('CodVenta')->on('venta_avisos')->onDelete('cascade');

            $table->timestamps(); // opcional
        });
    }

    public function down(): void {
        Schema::dropIfExists('fechas_publicacion');
    }
};