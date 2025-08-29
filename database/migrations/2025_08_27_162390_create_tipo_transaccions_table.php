<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tipo_transaccions', function (Blueprint $table) {
        $table->id('CodTipo'); // PK
        $table->string('DescripcionTipo', 100);
        $table->timestamps();
    });
    }

    public function down(): void {
        Schema::dropIfExists('tipo_transaccions');
    }
};
