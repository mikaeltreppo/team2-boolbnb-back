<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('cover_image', 300);
            $table->decimal('price');
            $table->string('description', 1500);
            $table->string('address', 250);
            $table->tinyInteger('beds');
            $table->tinyInteger('bathrooms');
            $table->tinyInteger('bedrooms');
            $table->tinyInteger('size_m2');
            $table->boolean('available');
            $table->boolean('visible');
            $table->string('slug', 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
};
