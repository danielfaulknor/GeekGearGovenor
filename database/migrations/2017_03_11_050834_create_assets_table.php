<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->bigInteger('quantity')->default(1);
            $table->decimal('value', 5, 2)->nullable();
            $table->integer('barcode');
            $table->string('serial');
            $table->string('missing_parts');
            $table->text('photos');
            $table->text('url')->nullable();
            $table->boolean('sale')->default(false);
            $table->boolean('public')->default(true);
            $table->boolean('new')->default(false);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('assets');
    }
}
