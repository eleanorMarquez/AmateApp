<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('citations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_profesional')->references('id')->on('users');
            $table->date('date_cita');
            $table->string('time_start');
            $table->string('time_end');
            $table->text('desciption');
            $table->integer('status')->default(1);
            $table->string('type_cita')->nullable();
            $table->string('link_cita')->nullable();
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
        Schema::dropIfExists('citations');
    }
}
