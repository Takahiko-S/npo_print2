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
        Schema::create('joseihons', function (Blueprint $table) {
            $table->id();
            $table->string('type')->comment('種類');
            $table->integer('hyousi')->comment('表紙係数');
            $table->string('honbun')->comment('本文係数');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('joseihons');
    }
};
