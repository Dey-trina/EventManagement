<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenueImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venue_images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('venue_id');
            $table->foreign('venue_id')
                  ->references('id')->on('venues')
                  ->onDelete('cascade');
            $table->string('imagename');
            $table->timestamps();
        });
    }

    // instructions:
    // 1. while adding new venue, first insert the basic info (without the images) in the venues table
    // 2. then get the last_inserted_id of the venue (newly created venue id)
    // 3. images will be inserted into this table (venue_images)
    // 4. while updating you can remove all the images from the directory of a particular venue
    // $images = select * from venue_images where venue_id = 1 (for example)// it will return all the images of venue (1) 1=primary_key
    // 1 img1.jpeg
    // 1 img2.jpg
    // returned rows will be like these
    // loop through all the $images and delete it from database and directory
    // 5. then insert the newly selected images (while updating) in this table
    // 6. got it?

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('venue_images');
    }
}
