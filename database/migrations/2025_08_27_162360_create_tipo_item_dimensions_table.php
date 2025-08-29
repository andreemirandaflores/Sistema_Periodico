<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('tipo_item_dimensions', function (Blueprint $table) {
    $table->id('CodTipoItemDimension');
    $table->unsignedBigInteger('CodItem');
    $table->foreign('CodItem')->references('CodItem')->on('tipo_items');
    $table->unsignedBigInteger('CodDimension');
$table->foreign('CodDimension')->references('CodDimension')->on('dimensions');

    $table->unsignedBigInteger('CodTipoAviso');
$table->foreign('CodTipoAviso')->references('CodTipoAviso')->on('tipo_avisos');
    $table->bigInteger('Precio');
    $table->string('TipoColor', 20);
});


    }

    public function down(): void {
        Schema::dropIfExists('tipo_item_dimensions');
    }
};
