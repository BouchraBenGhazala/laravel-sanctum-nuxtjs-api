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
            Schema::table('users', function (Blueprint $table) {
                $table->date('birthday')->nullable();
                $table->string('phone_number')->nullable();
                $table->string('sexe')->nullable();
                $table->string('picture')->nullable();
            });
       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('birthday');
            $table->dropColumn('phone_number');
            $table->dropColumn('sexe');
            $table->dropColumn('picture');
        });
    }
};
