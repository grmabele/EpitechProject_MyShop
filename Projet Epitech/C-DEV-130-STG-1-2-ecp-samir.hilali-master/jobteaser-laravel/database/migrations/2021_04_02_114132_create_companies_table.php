<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255)->nullable();
            $table->boolean('private', false);
            $table->longText('logo_url', 255)->nullable();
            $table->longText('cover_photo_url', 255)->nullable();
            $table->longText('recruitment_url', 255)->nullable();
            $table->integer('social_network_urls_id')
                ->references('id')
                ->on('social_network_urls')
                ->onDelete('cascade')->nullable();
            $table->string('short_description', 255)->nullable();
            $table->string('ceo_name', 255)->nullable();
            $table->string('key_figures_id')
                ->references('id')
                ->on('key_figures')
                ->onDelete('cascade')->nullable();
            $table->longText('full_description',255)->nullable();
            $table->longText('why_join_us', 255)->nullable();
            $table->longText('need_profiles', 255)->nullable();
            $table->longText('discover_our_teams', 255)->nullable();
            $table->string('locale', 255)->nullable();
            $table->uuid('uuid')->nullable();
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
        Schema::dropIfExists('companies');
    }
}
