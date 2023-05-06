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
        Schema::create('hyousi_namis', function (Blueprint $table) {
            $table->id();
            $table->string('type')->comment('種類');
            $table->string('name')->comment('用紙名');
            $table->string('maker')->nullable()->comment('メーカー');
            $table->string('youto')->nullable()->comment('用途');
            $table->integer('kinryo')->default(0)->comment('斤量');
            $table->integer('kirotanka')->default(0)->comment('キロ単価');
            $table->integer('a3wide')->default(0)->comment('A3ワイド単価');
            $table->string('tokucho')->nullable()->comment('特徴');
            $table->string('sonota')->nullable()->comment('その他');
            $table->integer('u_flag')->default(1)->comment('使用フラグ');
            $table->string('biko')->nullable()->comment('備考');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hyousi_namis');
    }
};
