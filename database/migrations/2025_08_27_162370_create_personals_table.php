<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('personals', function (Blueprint $table) {
            $table->id('CodPersonal'); // PK
            $table->string('Nombre', 50);
            $table->string('Apellido', 50);
            $table->string('email')->unique(); // importante para login
            $table->string('password');
            $table->string('telefono')->nullable();
            $table->unsignedBigInteger('CodCargo'); // FK
            $table->foreign('CodCargo')->references('CodCargo')->on('cargos')->onDelete('cascade');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('personals');
    }
};
