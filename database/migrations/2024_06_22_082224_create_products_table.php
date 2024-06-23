<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('type_id');
            $table->string('name');
            $table->text('serial_number');
            $table->string('desc');

            $table->timestamps();
            $table->softDeletes();

            $table->index('type_id', 'products_type_idx');
            $table->foreign('type_id', 'products_type_fk')->on('types')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
