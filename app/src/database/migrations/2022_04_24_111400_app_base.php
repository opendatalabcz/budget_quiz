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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->rememberToken();
        });

        Schema::create('budget_capitols', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('number');
            $table->string('name', 100);
        });

        Schema::create('budget_states', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('income_first_year', false, true);
            $table->integer('income_second_year', false, true);
            $table->integer('income_third_year', false, true);
            $table->integer('expense_first_year', false, true);
            $table->integer('expense_second_year', false, true);
            $table->integer('expense_third_year', false, true);
            $table->foreignId('budget_capitol_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('budget_state_changes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('is_increase');
            $table->boolean('is_expense');
            $table->integer('first_year', false, true);
            $table->integer('second_year', false, true);
            $table->integer('third_year', false, true);
            $table->foreignId('budget_capitol_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->tinyInteger('number', false, true);
            $table->string('title', 100);
            $table->text('description');
        });

        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title', 100);
            $table->text('description');
            $table->foreignId('question_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('budget_state_change_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 100);
        });

        Schema::create('parties', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 150);
            $table->string('short_name', 50);
        });

        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('is_finished');
            $table->tinyInteger('age', false, true);
            $table->enum('education', ['none', 'elementary', 'secondary', 'university']);
            $table->foreignId('region_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('party_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('quiz_answers', function (Blueprint $table) {
            $table->id();
            // not now probably?
            // $table->timestamps();
            $table->foreignId('quiz_id')
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('budget_capitols');
        Schema::dropIfExists('budget_states');
        Schema::dropIfExists('budget_state_changes');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('answers');
        Schema::dropIfExists('regions');
        Schema::dropIfExists('parties');
        Schema::dropIfExists('quizzes');
        Schema::dropIfExists('quiz_answers');
    }
};
