<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('servicescategories', function (Blueprint $table)
        {
            $table->increments('servicecat_id');
            $table->string('servicecat_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('servicescategories');
    }
}
