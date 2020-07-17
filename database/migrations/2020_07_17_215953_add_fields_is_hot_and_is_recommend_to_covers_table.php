<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsIsHotAndIsRecommendToCoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('covers', function (Blueprint $table) {
            $table->unsignedTinyInteger('is_hot')->default(0)->comment('是否热门')->after('cover_image_url');
            $table->unsignedTinyInteger('is_recommend')->default(0)->comment('是否推荐')->after('is_hot');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('covers', function (Blueprint $table) {
            $table->dropColumn('is_hot');
            $table->dropColumn('is_recommend');
        });
    }
}
