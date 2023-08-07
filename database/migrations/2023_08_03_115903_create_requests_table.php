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
        Schema::create('requests', function (Blueprint $table) {

            $table->id();
            $table->foreignId("user_id")->constrained("users")->references("id");

            $table->foreignId("blood_donation_id")->constrained("blood_donations")->references("id");
            $table->enum("status" , ["Approved" , "Pending"])->default("Approved");
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('requests');

    }
};
