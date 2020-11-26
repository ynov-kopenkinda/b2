<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name', 256);
            $table->string('address', 256)->nullable();
            $table->string('city', 256)->nullable();
            $table->string('postal_code', 5);
            $table->string('website', 256)->nullable();
            $table->text('description')->nullable();
            $table->text('food_type')->nullable();
            $table->enum('state', [
                'OPEN',
                'CLOSED',
                'WORKING',
            ]);  
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
        Schema::dropIfExists('restaurants');
    }
}
