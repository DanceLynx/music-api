<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteUserId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('singers', function (Blueprint $table) {
            $table->dropColumn('admin_user_id');
            $table->dropColumn('status');
        });
        Schema::table('songs', function (Blueprint $table) {
            $table->dropColumn('admin_user_id');
            $table->dropColumn('status');
        });
        Schema::table('covers', function (Blueprint $table) {
            $table->dropColumn('admin_user_id');
            $table->dropColumn('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('singers', function (Blueprint $table) {
            $table->unsignedInteger('admin_user_id')->comment('用户id');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态');
        });
        Schema::table('songs', function (Blueprint $table) {
            $table->unsignedInteger('admin_user_id')->comment('用户id');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态');
        });
        Schema::table('covers', function (Blueprint $table) {
            $table->unsignedInteger('admin_user_id')->comment('用户id');
            $table->unsignedTinyInteger('status')->default(0)->comment('状态');
        });
    }
}
