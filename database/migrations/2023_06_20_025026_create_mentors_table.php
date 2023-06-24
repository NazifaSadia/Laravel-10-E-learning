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
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('designation');
            $table->string('slug');
            $table->text('overview')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->text('fiverr_img')->nullable();
            $table->string('fiverr_url')->nullable();
            $table->text('upwork_img')->nullable();
            $table->string('upwork_url')->nullable();
            $table->text('profile_pic')->nullable();
            $table->integer('status')->default(1)->comment('1 = Active, 2 = Inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentors');
    }
};
