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
        Schema::table('tasks', function (Blueprint $table) {
            // Add the foreign key column
            $table->unsignedBigInteger('projet_id')->nullable();
            // Create the foreign key constraint
            $table->foreign('projet_id')->references('id')->on('projets');
            
 

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
             // Drop the foreign key constraint and column
             $table->dropForeign(['projet_id']);
             $table->dropColumn('projet_id');
        });
    }
};
