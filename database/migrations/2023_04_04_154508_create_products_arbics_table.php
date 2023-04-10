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
        Schema::create('products_arbics', function (Blueprint $table) {
            $table->id();
            $table->string('name_ar');
            $table->string('price');
            $table->string('image');
            $table->string('descrptions_ar');
            $table->unsignedBigInteger('catageries_arbic_id');
           $table->foreign('catageries_arbic_id')->references('id')->on('catageries_arbics')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products_arbics');
    }
};
