<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('grupos', function (Blueprint $table) {
            $table->id('CodGrupo');
            $table->string('DescripcionGrupo', 100);
        });
    }

    public function down(): void {
        Schema::dropIfExists('grupos');
    }
};
