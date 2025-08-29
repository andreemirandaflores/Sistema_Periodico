<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id('CodDetalleVenta');
            $table->date('FechaIni');
            $table->date('FechaFin');
            $table->string('Aviso', 200);
            $table->string('Estado', 15);

            // Referencia correcta a PK personalizada
            $table->unsignedBigInteger('CodVenta');
            $table->foreign('CodVenta')
                  ->references('CodVenta') // PK real de venta_avisos
                  ->on('venta_avisos')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('CodTipoTransItemTrans');
            $table->foreign('CodTipoTransItemTrans')
                  ->references('id') // si esta es la PK real de tipo_transaccion_item_transaccions
                  ->on('tipo_transaccion_item_transaccions')
                  ->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('detalle_ventas');
    }
};
