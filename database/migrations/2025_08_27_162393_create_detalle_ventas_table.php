<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('detalle_ventas', function (Blueprint $table) {
            $table->id('CodDetalleVenta');

            // Contenido del aviso
            $table->string('Aviso', 200);
            $table->string('Formato', 20)->default('Normal'); // Normal, Resaltado, Recuadro
            $table->string('Estado', 15)->default('Pendiente'); // Pendiente, Revisado, Exportado

            // FK: Venta
            $table->unsignedBigInteger('CodVenta');
            $table->foreign('CodVenta')->references('CodVenta')->on('venta_avisos')->onDelete('cascade');

            // FK: Tipo y item por separado
            $table->unsignedBigInteger('CodTipoTrans');   // FK a tipo_transaccions
            $table->unsignedBigInteger('CodItemTrans');   // FK a item_transaccions
            $table->foreign('CodTipoTrans')->references('CodTipo')->on('tipo_transaccions')->onDelete('cascade');
            $table->foreign('CodItemTrans')->references('CodItemTrans')->on('item_transaccions')->onDelete('cascade');

            // Datos de facturación
            $table->integer('Cantidad')->default(1);
            $table->decimal('PrecioUnitario', 10, 2)->default(0);
            $table->decimal('SubTotal', 10, 2)->default(0);
            $table->decimal('MontoDescuento', 10, 2)->nullable();
            $table->string('CodigoProductoSin', 20)->nullable();
            $table->string('ActividadEconomica', 20)->nullable();

            // Control de revisión
            $table->unsignedBigInteger('RevisadoPor')->nullable(); // FK a personales
            $table->foreign('RevisadoPor')->references('CodPersonal')->on('personals')->onDelete('set null');
            $table->timestamp('FechaRevision')->nullable();

            $table->timestamps(); // created_at y updated_at
        });
    }

    public function down(): void {
        Schema::dropIfExists('detalle_ventas');
    }
};
