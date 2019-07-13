<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStoryPerformanceDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('story_performance_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('story_id')->nullable();
            $table->foreign('story_id')->references('id')->on('stories');
            $table->unsignedBigInteger('visit_id')->nullable();
            $table->foreign('visit_id')->references('id')->on('visits');
            $table->string('clicked_position');
            $table->timestamp('clicked_at')->nullable();
            $table->timestamp('loaded_at')->nullable();
            $table->timestamp('leaved_at')->nullable();
            $table->timestamp('added_to_cart_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('story_performance_data');
    }
}
