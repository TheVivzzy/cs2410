<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->date('dob');
            $table->enum('type', ['Dog', 'Cat', 'Parrot', 'Fish', 'Rabbit', 'Snake', 'Mouse', 'Turtle', 'Lizard'])->default(NULL);
            $table->string('description');
            $table->enum('availability', ['Available', 'Unavailable'])->default('Available');
            $table->binary('picture');
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
        Schema::dropIfExists('animals');
    }
}
