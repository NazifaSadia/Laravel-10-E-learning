<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('english_title')->unique();
            $table->string('bangla_title')->nullable();
            $table->string('slug');
            $table->string('intro_video')->nullable();
            $table->integer('price');
            $table->string('bangla_price');
            $table->string('graduate_number');
            $table->string('total_lecture');
            $table->string('class_hour');
            $table->string('course_duration');
            $table->text('motivational_content')->nullable();
            $table->text('course_opportunity')->nullable();
            $table->text('curriculum_description')->nullable();
            $table->text('course_requirement')->nullable();
            $table->integer('coupon_status')->default(1)->comment('1 for accept, 2 for not-accept');
            $table->integer('status')->default(1)->comment('1 for active, 2 for inactive');
            $table->text('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
