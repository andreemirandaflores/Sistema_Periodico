<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('detalle_venta_no_economico_personals', function (Blueprint $table) {
            $table->id('CodDetalleNoEcoPers');
            $table->unsignedBigInteger('CodDetalleNoEco');
$table->foreign('CodDetalleNoEco')
      ->references('CodDetalleNoEco')
      ->on('detalle_venta_no_economicos')
      ->onDelete('cascade');

            $table->unsignedBigInteger('CodPersonal');
$table->foreign('CodPersonal')->references('CodPersonal')->on('personals')->onDelete('cascade');

            $table->time('HoraAsignacion');
            $table->time('HoraCompletado');
            $table->date('FechaAsignacion');
            $table->date('FechaCompletado');
            $table->string('Rol', 25);
        });
    }

    public function down(): void {
        Schema::dropIfExists('detalle_venta_no_economico_personals');
    }
};
