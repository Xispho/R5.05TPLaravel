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
        Schema::create('evaluations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('module_id')->constrained('modules')->onDelete('cascade');
            $table->string('titre');
            $table->date('date');
            $table->integer('coefficient');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.  SSSDZCEFERRCERVAGT A5A 5YGV5VZG5TZG5 A5G5GV5 JU I7 U7 J7J65 7U U7U U3R 
     */
    public function down(): void
    {
        Schema::dropIfExists('evaluations');
    }
};
