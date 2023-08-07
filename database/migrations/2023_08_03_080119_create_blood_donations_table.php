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
        Schema::create('blood_donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId("user_id")->constrained("users")->references("id")->cascadeOnDelete();
            $table->enum("blood_type" , ["O+" , "O-" , "A+" , "A-" , "B+" , "B-" ,"AB+", "AB-"]);
                //->collation("O+" , "O-" , "A+" , "A-" , "B+" , "B-" ,"AB+", "AB-");
            $table->float("quantity")->default(0);
            $table->string("location");
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blood_donation');
    }
};
