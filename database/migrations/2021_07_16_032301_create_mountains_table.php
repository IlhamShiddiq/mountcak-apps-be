<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMountainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mountains', function (Blueprint $table) {
            $table->uuid('id');
            $table->string('name');
            $table->string('city');
            $table->integer('max_climber')->default(0);
            $table->integer('day_duration')->default(0);
            $table->integer('night_duration')->default(0);
            $table->integer('price')->default(0);
            $table->boolean('is_open')->default(0);
            $table->boolean('is_team_available')->default(0);
            $table->string('image')->default("https://res.cloudinary.com/dmpdsvsye/image/upload/v1626407029/mountain_ydxqly.jpg");
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
        Schema::dropIfExists('mountains');
    }
}
