<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('item_transaccions', function (Blueprint $table) {
            $table->id('CodItemTrans');
            $table->string('DescripcionItemTrans', 100);
        });
    }

    public function down(): void {
        Schema::dropIfExists('item_transaccions');
    }
};

