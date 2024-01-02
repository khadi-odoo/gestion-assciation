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
        Schema::create('evenements', function (Blueprint $table) {
            $table->id();
            $table->string('libelle');
            $table->text('description');
            $table->date('date_limite_iscription');
            $table->string('image');
            $table->boolean('est_clos')->default(false);
            $table->date('date_evenement');
            $table->integer('nombre_place');
            $table->unsignedBigInteger('association_id');
            $table->foreign('association_id')->references('id')->on('associations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evenements');
    }
};
