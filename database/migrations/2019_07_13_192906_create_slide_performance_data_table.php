<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlidePerformanceDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('slide_performance_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('slide_id')->nullable();
            $table->foreign('slide_id')->references('id')->on('slides');
            $table->unsignedBigInteger('visit_id')->nullable();
            $table->foreign('visit_id')->references('id')->on('visits');
            $table->timestamp('entered_at')->nullable();
            $table->timestamp('leaved_at')->nullable();
            $table->timestamp('clicked_at')->nullable();
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
        Schema::dropIfExists('slide_performance_data');
    }
}
