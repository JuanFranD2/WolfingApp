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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();

            // Client
            $table->string('client')->nullable();

            // Contact person
            $table->string('contact_person')->nullable();

            // Contact phone
            $table->string('contact_phone')->nullable();

            // Description
            $table->text('description')->nullable();

            // Contact email
            $table->string('contact_email')->nullable();

            // Address
            $table->string('address')->nullable();

            // City
            $table->string('city')->nullable();

            // Postal code
            $table->string('postal_code', 10)->nullable();

            // Province (INE code)
            $table->unsignedSmallInteger('province')->nullable();

            // Status (P=Pending, R=Completed, C=Cancelled, ...)
            $table->enum('status', ['P', 'R', 'C'])->default('P');

            // Task creation date (automatic)
            $table->timestamp('created_at')->useCurrent();

            // Assigned operator
            $table->string('assigned_operator')->nullable();

            // Task realization date
            $table->date('realization_date')->nullable();

            // Previous notes
            $table->text('previous_notes')->nullable();

            // Subsequent notes
            $table->text('subsequent_notes')->nullable();

            // Summary file
            $table->string('summary_file')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
