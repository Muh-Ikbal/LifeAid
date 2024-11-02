<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('injury_instructions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('injury_id')->constrained('injuries')->onDelete('cascade');
            $table->integer('step_number');
            $table->text('instruction');
            $table->string('image', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('injuriy_instructions');
    }
};
