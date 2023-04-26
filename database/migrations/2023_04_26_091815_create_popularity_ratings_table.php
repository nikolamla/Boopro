<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopularityRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popularity_ratings', function (Blueprint $table) {
            $table->id();
            $table->string('word')->unique();
            $table->integer('positive_results');
            $table->integer('negative_results');
            $table->float('popularity_rating');
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
        Schema::dropIfExists('popularity_ratings');
    }
}
