<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id('id');
            $table->uuid('mountain_id');
            $table->uuid('leader_id');
            $table->integer('member_count')->default(0);
            $table->integer('member_max')->default(5);
            $table->timestamp('schedule_go')->nullable();
            $table->timestamp('schedule_home')->nullable();
            $table->timestamps();

            $table->foreign('mountain_id')->references('id')->on('mountains')->onDelete('cascade');
            $table->foreign('leader_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('teams');
    }
}
