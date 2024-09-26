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
        Schema::create('chirps', function (Blueprint $table) {

            //create the primary key 'id' column
            $table->id();
             // Create a 'user_id' column and set it as a foreign key that references the 'id' column of the 'users' table
            // 'constrained()' automatically links to the 'users' table.
            // 'cascadeOnDelete()' ensures that when the related user is deleted, all their chirps are also deleted
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            //Create a message column for storing the chirp content as a string
            $table->string('message');
              // Adds 'created_at' and 'updated_at' timestamp columns to track when the chirp is created and updated
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chirps');
    }
};
