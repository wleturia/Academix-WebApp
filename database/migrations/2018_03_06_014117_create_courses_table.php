<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->unique('name','url');                       
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('url')->unique();  
            $table->text('description');
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('students')->default(0);
            $table->decimal('price', 6, 2)->nullable();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->binary('image')->nullable(); # <img src="data:image/jpeg;base64,'.base64_encode( $imageBlob ).'"/>
            $table->timestamps();
            #            $table->integer('language')->unsigned();
            #            $table->foreign('language')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
