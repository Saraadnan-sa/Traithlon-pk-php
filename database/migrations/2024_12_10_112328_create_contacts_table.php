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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key
            $table->string('name'); // Name column (VARCHAR(255))
            $table->string('email')->unique(); // Email column (VARCHAR(255)) with unique constraint
            $table->string('phone', 15); // Phone column (VARCHAR(15))
            $table->text('message')->nullable(); // Message column (TEXT), nullable to make it optional
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
