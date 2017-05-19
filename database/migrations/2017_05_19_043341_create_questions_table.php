<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('type_id');
            $table->unsignedInteger('survey_id');
            $table->string('title');
            $table->string('description')->nullable();
            $table->timestamps();

            $table->foreign('type_id')
                ->references('id')->on('types')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('survey_id')
                ->references('id')->on('surveys')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
