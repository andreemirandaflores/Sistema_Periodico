<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('detalle_venta_no_economicos', function (Blueprint $table) {
            $table->id('CodDetalleNoEco');
            $table->date('FechaIni');
            $table->date('FechaFin');
            $table->string('Aviso', 200);
            $table->string('Estado', 30);
            $table->string('NroHojaRuta', 30);
            $table->string('Observaciones', 200)->nullable();
            $table->unsignedBigInteger('CodVenta');
$table->foreign('CodVenta')
      ->references('CodVenta') // la PK real en venta_avisos
      ->on('venta_avisos')
      ->onDelete('cascade');

            $table->unsignedBigInteger('CodTipoItemDimension');
$table->foreign('CodTipoItemDimension')
      ->references('CodTipoItemDimension')
      ->on('tipo_item_dimensions')
      ->onDelete('cascade'); // opcional según tu lógica

        });
    }

    public function down(): void {
        Schema::dropIfExists('detalle_venta_no_economicos');
    }
};
