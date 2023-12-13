<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->longText('title',255)->nullable();
            $table->longText('location',255)->nullable();
            $table->longText('description',255)->nullable();
            $table->longText('work_type',255)->nullable();
            $table->longText('experience',255)->nullable();
            $table->longText('dedline',255)->nullable();
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
        Schema::dropIfExists('jobs');
    }
}
