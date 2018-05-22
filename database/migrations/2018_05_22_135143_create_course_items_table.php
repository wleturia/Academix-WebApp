<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_items', function (Blueprint $table) {
            $table->increments('id');
            $table->string('item_name');            
            $table->integer('item_status')->nullable()->unsigned();
            $table->foreign('item_status')->references('id')->on('course_item_statuses')->onDelete('cascade');
            $table->integer('item_type')->nullable()->unsigned();
            $table->foreign('item_type')->references('id')->on('course_items_types')->onDelete('cascade');
            $table->integer('course_chapter')->nullable()->unsigned();
            $table->foreign('course_chapter')->references('id')->on('course_chapters')->onDelete('cascade');
            $table->binary('media_content')->nullable(); # <img src="data:image/jpeg;base64,'.base64_encode( $imageBlob ).'"/>
            $table->string('media_description')->nullable();            
            $table->text('text_content')->nullable();            
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
        Schema::dropIfExists('course_items');
    }
}
