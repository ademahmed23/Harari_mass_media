<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewscategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('newscategories', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name',100)->nullable();
            $table->string('slug',100)->nullable();
            $table->string('type',100)->nullable();
            $table->string('image',255)->nullable();
            $table->integer('post_counter')->default(0);
            $table->integer('menu_publish')->default(1);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
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
        Schema::dropIfExists('newscategories');
    }
}
