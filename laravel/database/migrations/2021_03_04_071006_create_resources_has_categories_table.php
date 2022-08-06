<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourcesHasCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resources_has_categories', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('resource_id');
            $table->unsignedBigInteger('category_id');

            $table->foreign('resource_id')
                    ->on('resources')
                    ->references('id')
                    ->cascadeOnDelete();

            $table->foreign('category_id')
                    ->on('categories')
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
        Schema::dropIfExists('resources_has_categories');
    }
}
