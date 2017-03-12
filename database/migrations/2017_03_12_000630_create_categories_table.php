<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        $none_id = DB::table('categories')->insertGetId([
            'title' => 'None',
            'description' => 'No Category'
        ]);

        Schema::table('assets', function (Blueprint $table) use ($none_id) {
            $table->integer('category_id')->unsigned()->default($none_id);

            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
        Schema::drop('categories');

    }
}
