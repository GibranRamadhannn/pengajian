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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('gender');
            $table->string('lunch_voucher_1')->unique()->nullable();
            $table->string('lunch_voucher_2')->unique()->nullable();
            $table->string('barcode_check_in_1')->unique()->nullable();
            $table->string('barcode_check_out_1')->unique()->nullable();
            $table->string('barcode_check_in_2')->unique()->nullable();
            $table->string('barcode_check_out_2')->unique()->nullable();
            $table->string('age');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
