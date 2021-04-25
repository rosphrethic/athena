<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('guardian_id');
            $table->unsignedBigInteger('nationality_id');
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('document_type')->nullable();
            $table->string('document_number')->unique()->nullable();
            $table->string('birth_date')->nullable();
            $table->string('sex')->nullable();
            $table->string('status')->default('Activo');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('guardian_id')->references('id')->on('guardians');
            $table->foreign('nationality_id')->references('id')->on('nationalities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
