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
        //
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Re-create 'requests' table if needed
        Schema::create('requests', function (Blueprint $table) {
            $table->id();
            // Add other columns as needed
            $table->timestamps();
        });
    }
};
