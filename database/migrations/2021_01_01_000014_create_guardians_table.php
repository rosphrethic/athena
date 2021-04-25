<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuardiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guardians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id');
            $table->string('name')->nullable();
            $table->string('lastname')->nullable();
            $table->string('document_type')->nullable();
            $table->string('document_number')->unique()->nullable();
            $table->string('address')->nullable();
            $table->string('telephone')->nullable();
            $table->string('telephone_alternative')->nullable();
            $table->string('status')->default('Activo');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();

            $table->foreign('city_id')->references('id')->on('cities');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guardians');
    }
}
