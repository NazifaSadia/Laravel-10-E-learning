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
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('batch_name')->unique();
            $table->string('slug');
            $table->string('starting_date')->nullable();
            $table->string('class_day')->nullable();
            $table->string('class_timing')->nullable();
            $table->string('fb_group')->nullable();
            $table->integer('seat_number')->default(25);
            $table->integer('branch_id')->default(0);
            $table->integer('course_id')->default(0);
            $table->integer('mentor_id')->default(0);
            $table->integer('batch_type')->default(1)->comment('1 = Online, 2 = Offline');
            $table->integer('admission_status')->default(2)->comment('1 = Active, 2 = Inactive');
            $table->integer('status')->default(2)->comment('1 = Active, 2 = Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
