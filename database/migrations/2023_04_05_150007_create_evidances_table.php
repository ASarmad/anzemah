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
        Schema::create('evidances', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->unsigned()->nullable()->index();
            $table->integer('number');
            $table->string('topic');
            $table->text('question');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evidances');
    }
};
