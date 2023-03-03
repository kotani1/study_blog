<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('article_categories', function (Blueprint $table) {
            $table->string('parent_article_category_id')->default('nothing')->change();
        });
        Schema::table('article_categories', function (Blueprint $table) {
            $table->renameColumn('parent_article_category_id', 'parent_category_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('article_categories', function (Blueprint $table) {
            $table->renameColumn('parent_article_name', 'parent_article_category_id');
        });
        Schema::table('article_categories', function (Blueprint $table) {
            $table->string('parent_article_category_id')->default(0)->change();
        });
        Schema::table('article_categories', function (Blueprint $table) {
            $table->integer('parent_article_category_id')->change();
        });
    }
};
