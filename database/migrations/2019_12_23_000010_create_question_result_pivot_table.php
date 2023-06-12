<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionResultPivotTable extends Migration
{
    public function up()
    {
        Schema::create('question_result', function (Blueprint $table) {
          
            $table->string('result_id')->nullable();
            $table->string('question_id')->nullable();
            $table->string('option_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('category_text')->nullable();
            $table->string('course')->nullable();
            $table->integer('points')->default(0);
            
        });
    }
}
