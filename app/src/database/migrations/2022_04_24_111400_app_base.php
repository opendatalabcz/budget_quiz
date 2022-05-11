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

        Schema::create('budget_chapters', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('number');
            $table->string('name', 100);
        });

        Schema::create('budget_states', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('income_first_year', false, true)->default(0);
            $table->bigInteger('income_second_year', false, true)->default(0);
            $table->bigInteger('income_third_year', false, true)->default(0);
            $table->bigInteger('expense_first_year', false, true)->default(0);
            $table->bigInteger('expense_second_year', false, true)->default(0);
            $table->bigInteger('expense_third_year', false, true)->default(0);
            $table->foreignId('budget_chapter_id')
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
        });

        Schema::create('budget_state_changes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('income_first_year')->default(0);
            $table->bigInteger('expense_first_year')->default(0);
            $table->bigInteger('income_second_year')->default(0);
            $table->bigInteger('expense_second_year')->default(0);
            $table->bigInteger('income_third_year')->default(0);
            $table->bigInteger('expense_third_year')->default(0);
            $table->foreignId('budget_chapter_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('answer_id')
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

        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name', 100);
        });

        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('hash')->nullable();
            $table->boolean('is_finished')->default(false);
            $table->smallInteger('age', false, true);
            $table->foreignId('region_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('party_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('education_id')
                ->constrained('educations') // Laravel unable to handle plural of education
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });

        Schema::create('quiz_answers', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('budget_chapters');
        Schema::dropIfExists('budget_states');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('answers');
        Schema::dropIfExists('budget_state_changes');
        Schema::dropIfExists('regions');
        Schema::dropIfExists('parties');
        Schema::dropIfExists('educations');
        Schema::dropIfExists('quizzes');
        Schema::dropIfExists('quiz_answers');
    }
};
