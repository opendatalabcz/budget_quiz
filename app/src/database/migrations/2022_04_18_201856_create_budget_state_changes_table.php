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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('budget_state_changes');
    }
};
