<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('isbn13');
            $table->string('publisher');
            $table->string('book_title');
            $table->string('price');
            $table->integer('price_2');
            $table->string('book_description',1000);
            $table->string('book_image');
            $table->integer('new_flag');
            $table->dateTime('publish_date');
            $table->dateTime('deadline_date');
            $table->integer('emergency_flag')->nullable();
            $table->integer('tohan_id');
            $table->integer('genre_id');
            
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
        Schema::dropIfExists('books');
    }
}
