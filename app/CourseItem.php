<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseItem extends Model
{
    /*
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
    */

    protected $fillable = [
        'item_name','item_type','course_chapter',
    ];

    protected $hidden = [
        'item_status','media_content','media_description','text_content',
    ];
    

    public function course()
    {
        return $this->belongsTo('Course')->withTimestamps();   
    }
}
