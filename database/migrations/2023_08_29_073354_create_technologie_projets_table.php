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
        Schema::create('technologie_projets', function (Blueprint $table) {

            $table->unsignedBigInteger('projet_id'); // Assuming 'id_project' is of type unsignedBigInteger
            $table->unsignedBigInteger('technologie_id'); 

            // Define the composite primary key
            $table->primary(['projet_id', 'technologie_id']);

            // Optionally, add foreign key constraints if needed
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
            $table->foreign('technologie_id')->references('id')->on('technologies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('technologie_projets');
    }
};
