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
        Schema::table('participants', function (Blueprint $table) {
            //
            $table->string('status_broadcast_1')->after('status_wa');
            $table->string('status_broadcast_2')->after('status_broadcast_1');
            $table->string('status_broadcast_3')->after('status_broadcast_2');
            $table->string('status_broadcast_4')->after('status_broadcast_3');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('participants', function (Blueprint $table) {
            //
            $table->dropColumn('status_broadcast_1');
            $table->dropColumn('status_broadcast_2');
            $table->dropColumn('status_broadcast_3');
            $table->dropColumn('status_broadcast_4');
        });
    }
};
