<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meals', function (Blueprint $table) {
            $table->id();
            $table->string("name")->default('null')->index();
            $table->enum('categoryName', ['breakfast', 'lunch','dinner','snack'])->nullable();
            $table->enum('target', ['build muscle', 'lose weight','keep fit'])/*->nullable()*/;
            $table->enum('type', ['vegetarian', 'sugar free', 'none'])->nullable()->default('none');
            $table->string('calories');
            $table->string('protein');
            $table->string('sugar');
            $table->string('salt');
            $table->string('image')->nullable();
            $table->string('preparation_method')->nullable();
            $table->text('description');
            $table->text('warning')->nullable();
            $table->unsignedBiginteger('day_id')->unsigned()->nullable();
            $table->unsignedBiginteger('coach_id')->unsigned()->nullable();
            $table->foreign('day_id')->references('id')->on('training_days')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('coach_id')->references('id')->on('coaches')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meals');
    }
};
