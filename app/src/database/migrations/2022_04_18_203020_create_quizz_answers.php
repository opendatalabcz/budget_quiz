<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizz_answers', function (Blueprint $table) {
            $table->id();
            // not now probably?
            // $table->timestamps();
            $table->foreignId('quizz_id')
                        ->constrained('quizzes')
                        ->onUpdate('cascade')
                        ->onDelete('cascade');
            $table->foreignId('answer_id')
                        ->constrained()
                        ->onUpdate('cascade')
                        ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizz_answers');
    }
};
