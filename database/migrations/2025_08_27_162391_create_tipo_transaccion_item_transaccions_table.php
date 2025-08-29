<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tipo_transaccion_item_transaccions', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('CodTipo');
    $table->unsignedBigInteger('CodItemTrans');

    $table->foreign('CodTipo')
          ->references('CodTipo')->on('tipo_transaccions')->onDelete('cascade');

    $table->foreign('CodItemTrans')
          ->references('CodItemTrans')->on('item_transaccions')->onDelete('cascade');
});

    }

    public function down(): void {
        Schema::dropIfExists('tipo_transaccion_item_transaccions');
    }
};
