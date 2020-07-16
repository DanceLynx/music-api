<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',120)->default('')->comment('歌曲名');
            $table->string('pic_url')->default('')->comment('歌曲图片');
            $table->string('url')->default('')->comment('歌曲链接');
            $table->text('lyric')->nullable()->comment('歌词');
            $table->unsignedInteger('dt')->default(0)->comment('歌曲时长');
            $table->unsignedInteger('cover_id')->nullable()->comment('封面id');
            $table->unsignedInteger('singer_id')->nullable()->comment('歌手id');
            $table->unsignedInteger('admin_user_id')->nullable()->comment('用户id');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态');
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
        Schema::dropIfExists('songs');
    }
}
