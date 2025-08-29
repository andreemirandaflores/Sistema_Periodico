<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('detalle_reqs', function (Blueprint $table) {
    $table->id('CodDetalleReq');
    $table->string('Valor', 30);

    $table->unsignedBigInteger('CodDetalleNoEco');
    $table->foreign('CodDetalleNoEco')
          ->references('CodDetalleNoEco')
          ->on('detalle_venta_no_economicos')
          ->onDelete('cascade');

    $table->unsignedBigInteger('CodRequisito');
    $table->foreign('CodRequisito')
          ->references('CodRequisito')
          ->on('requisitos')
          ->onDelete('cascade');
});

    }

    public function down(): void {
        Schema::dropIfExists('detalle_reqs');
    }
};

