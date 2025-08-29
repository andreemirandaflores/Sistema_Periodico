<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('dimensions', function (Blueprint $table) {
            $table->id('CodDimension');
            $table->string('DescripcionDimension', 100);
        });
    }

    public function down(): void {
        Schema::dropIfExists('dimensions');
    }
};
