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
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_id');
            $table->string('title');
            $table->string('slug');
            $table->longText('description');
            $table->string('author')->nullable();
            $table->text('reference')->nullable();
            $table->text('image')->nullable();
            $table->text('video')->nullable();
            $table->text('audio')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('is_featured')->default(0);
            $table->boolean('is_breakingNews')->default(0);
            $table->boolean('is_trend')->default(0);
            $table->boolean('is_running')->default(0);
            $table->boolean('is_pending')->default(0);
            $table->boolean('is_delete')->default(0);
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
        Schema::dropIfExists('news');
    }
}
