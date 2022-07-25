<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CustomerFirstName');
            $table->string('CustomerLastName')->nullable();
            $table->string('CustomerEmail')->nullable();
            $table->string('CustomerGender')->nullable();
            $table->string('CustomerIpAddress');
            $table->string('CustomerCompany')->nullable();
            $table->string('CustomerCity')->nullable();
            $table->string('CustomerTitle')->nullable();
            $table->longText('CustomerWebSite')->nullable();
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
        Schema::dropIfExists('customers');
    }
}
