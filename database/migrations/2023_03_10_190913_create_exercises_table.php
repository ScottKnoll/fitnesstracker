<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('type_id');
            $table->string('name');
            $table->json('muscles')->nullable();
            $table->string('size')->nullable();
            $table->timestamps();
        });

        Schema::create('exercise_workout', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('exercise_id');
            $table->unsignedInteger('workout_id');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('exercises');

        Schema::dropIfExists('exercise_workout');
    }
};
