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
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->string('color')->comment('カラー');//データの型がstring型（文字列）
            $table->integer('u_flag')->default(1)->comment('使用フラグ');//データ型がinteger型デフォルト値１(整数)
            $table->string('biko')->nullable()->comment('備考');//nullableは入力はいってなくてもOK
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('colors');
    }
};
