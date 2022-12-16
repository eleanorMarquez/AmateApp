<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestRealizadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_realizados', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_author')->nullable()->references('id')->on('users');
            $table->string('author_ramdon')->nullable();
            $table->string('answer');
            $table->string('type_test')->nullable();
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
        Schema::dropIfExists('test_realizados');
    }
}
