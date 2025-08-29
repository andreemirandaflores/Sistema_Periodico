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
            $table->string('NIT', 14);

            $table->unsignedBigInteger('CodPersonal'); // FK personalizada
            $table->foreign('CodPersonal')
                  ->references('CodPersonal')
                  ->on('personals')
                  ->onDelete('cascade');

            $table->foreign('NIT')->references('NIT')->on('clientes');
        });
    }

    public function down(): void {
        Schema::dropIfExists('venta_avisos');
    }
};
