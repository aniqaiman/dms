<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    public function up()
    {
        Schema::create('services', function(Blueprint $table)
        {
            $table->increments('service_id');
            $table->string('service_cat');
            $table->string('service_package');
            $table->date('service_date');
            $table->string('service_pax');
            $table->timestamps();
            // $table->longtext('servicecat_desc');
            // $table->string('servicecat_package');
            // $table->string('servicecat_pax');
            // $table->string('servicecat_notes');            
        });
    }

    public function down()
    {
        Schema::dropIfExists('services');
    }
}
