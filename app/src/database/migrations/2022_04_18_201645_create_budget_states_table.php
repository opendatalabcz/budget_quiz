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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budget_states');
    }
};
