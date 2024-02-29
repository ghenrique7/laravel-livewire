<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('type_plan_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('sector_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->integer('initial_year');
            $table->integer('final_year')->nullable();
            $table->string('mission')->nullable();
            $table->string('vision')->nullable();
            $table->integer('status'); 
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
        Schema::dropIfExists('plans');
    }
}
