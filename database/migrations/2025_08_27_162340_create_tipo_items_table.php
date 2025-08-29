<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tipo_items', function (Blueprint $table) {
            $table->id('CodItem');
            $table->string('DescripcionItem', 100);
        });
    }

    public function down(): void {
        Schema::dropIfExists('tipo_items');
    }
};
