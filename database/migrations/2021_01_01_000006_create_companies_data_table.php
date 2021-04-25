<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies_data', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('name_administration')->nullable();
            $table->string('slogan')->nullable();
            $table->string('founder')->nullable();
            $table->string('emblem')->nullable();
            $table->date('foundation_date')->nullable();
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
        Schema::dropIfExists('companies_data');
    }
}
