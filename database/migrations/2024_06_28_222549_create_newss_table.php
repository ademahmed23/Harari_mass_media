<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newsses', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('subcategory_id');
            $table->string('title',)->collation('utf8_general_ci');
            $table->string('summary')->collation('utf8_general_ci');
            $table->longText('description')->collation('utf8_general_ci');
            $table->integer('status')->default(0);
            $table->integer('breaking_news')->default(0);
            $table->date('date');
            $table->string('tags',50)->nullable();
            $table->unsignedBigInteger('speciality_id');
            $table->unsignedBigInteger('reporter_id');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->integer('archive')->default(0);
            $table->integer('viewers')->default(0);
            $table->string('meta_keyword')->nullable();
            $table->string('meta_description')->nullable();
            $table->timestamps();
            $table->foreign('subcategory_id')->references('id')->on('newssubcategories')->onDelete('cascade');
            $table->foreign('speciality_id')->references('id')->on('newsspecialities');
            $table->foreign('reporter_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('newsses');
    }
}
