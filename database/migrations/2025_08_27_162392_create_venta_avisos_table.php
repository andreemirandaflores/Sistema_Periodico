<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('venta_avisos', function (Blueprint $table) {
            $table->id('CodVenta');
            $table->date('FechaVenta');
            $table->time('HoraVenta');
            $table->decimal('Total', 10, 2)->default(0);

            // Cliente
            $table->string('NIT', 14);
            $table->foreign('NIT')->references('NIT')->on('clientes');

            // Personal
            $table->unsignedBigInteger('CodPersonal');
            $table->foreign('CodPersonal')
                ->references('CodPersonal')
                ->on('personals')
                ->onDelete('cascade');

            // Facturación
            $table->integer('NumeroFactura');        // correlativo
            $table->string('MetodoPago', 20);        // "Efectivo", "Tarjeta", etc.
            $table->string('Cuf', 100)->nullable();  // generado
            $table->string('Cufd', 100)->nullable(); // generado
            $table->integer('CodigoSucursal')->default(0);
            $table->integer('CodigoPuntoVenta')->nullable();

            $table->timestamps();
        });

    }

    public function down(): void {
        Schema::dropIfExists('venta_avisos');
    }
};
