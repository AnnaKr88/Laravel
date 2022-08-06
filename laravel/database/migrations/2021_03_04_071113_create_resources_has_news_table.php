<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesHasNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources_has_news', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('resource_id');
            $table->unsignedBigInteger('news_id');

            $table->foreign('resource_id')
                    ->on('resources')
                    ->references('id')
                    ->cascadeOnDelete();

            $table->foreign('news_id')
                    ->on('news')
                    ->references('id')
                    ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resources_has_news');
    }
}
