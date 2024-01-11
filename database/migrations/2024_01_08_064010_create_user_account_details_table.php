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
        Schema::create('user_account_details', function (Blueprint $table) {
            $table->id();
            $table->string('account_number');
            $table->string('account_type');
            $table->string('nationality');
            $table->date('dob');
            $table->string('cid')->nullable();
            $table->string('passport_number')->nullable();
            $table->string('work_permit')->nullable();
            $table->string('guarantor_id')->nullable();
            $table->string('dzongcode');
            $table->string('gewocode');
            $table->string('villcode');
            $table->string('thram_number');
            $table->string('house_number');
            $table->string('phone_number');
            $table->string('email');
            $table->string('new_account_number');
            $table->timestamps();   

            $table->foreign('dzongcode')->references('dzongcode')->on('dzongkhags');
            $table->foreign('gewocode')->references('gewogcode')->on('gewogs');
            $table->foreign('villcode')->references('villcode')->on('villages');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_account_details');
    }
};
