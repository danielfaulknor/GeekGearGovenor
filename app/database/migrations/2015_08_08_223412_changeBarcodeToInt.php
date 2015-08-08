<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeBarcodeToInt extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        DB::statement("ALTER TABLE `items` CHANGE `barcode` `barcode` INT(5) NOT NULL");

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

         DB::statement("ALTER TABLE `items` CHANGE `barcode` `barcode` VARCHAR(255) NOT NULL");

    }
}
