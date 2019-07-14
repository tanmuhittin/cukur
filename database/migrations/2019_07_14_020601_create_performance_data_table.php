<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerformanceDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('slide_id');
            $table->unsignedBigInteger('visit_id');
            $table->integer('duration');
            $table->boolean('success');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->foreign('visit_id')->references('id')->on('visits');
            $table->foreign('slide_id')->references('id')->on('slides');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('performance_data');
    }
}
