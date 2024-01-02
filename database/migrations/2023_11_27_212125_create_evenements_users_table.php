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
        Schema::create('evenement_user', function (Blueprint $table) {
            $table->id();
            $table->string('nombrePlace')->default(1);
            $table->string('reference')->unique();
            $table->boolean('est_acepte')->default(true);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('evenement_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('evenement_id')->references('id')->on('evenements')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements_users');
    }
};
