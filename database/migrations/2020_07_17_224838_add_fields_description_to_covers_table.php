<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsDescriptionToCoversTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('covers', function (Blueprint $table) {
            $table->text('description')->nullable()->comment('歌单简介')->after('is_recommend');
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
            $table->dropColumn('description');
        });
    }
}
