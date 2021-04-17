<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grades', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('name_number')->nullable();
            $table->string('name_text')->nullable();
            $table->string('name_alternative')->nullable();
            $table->string('level')->nullable();
            $table->string('level_acronym')->nullable();
            $table->boolean('has_baccalaureate')->default(0);
            $table->string('status')->default('Activo');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('grades');
    }
}
