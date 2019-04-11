<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdoptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adoptions', function (Blueprint $table) {
            $table->integer('userId');
            $table->integer('animalId');
            $table->string('name');

            $table->enum('accepted', ['Approved', 'Pending', 'Rejected'])->default->('Pending');
            $table->timestamps();

            $table->foreign('userId')->references('id')->on('users');
            $table->foreign('animalId')->references('id')->on('animals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adoptions');
    }
}
