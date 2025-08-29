<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tipo_avisos', function (Blueprint $table) {
            $table->id('CodTipoAviso');
            $table->string('Descripcion', 100);
            $table->unsignedBigInteger('CodGrupo'); // FK
$table->foreign('CodGrupo')
      ->references('CodGrupo') // <- aquí va el nombre correcto de la PK
      ->on('grupos')
      ->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('tipo_avisos');
    }
};
