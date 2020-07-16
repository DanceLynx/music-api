<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSingersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('singers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',60)->default('')->comment('歌手名');
            $table->string('image_url')->default('')->comment('歌手写真');
            $table->text('description')->nullable()->comment('歌手简介');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态');

            $table->unsignedInteger('admin_user_id')->comment('用户id');
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
        Schema::dropIfExists('singers');
    }
}
