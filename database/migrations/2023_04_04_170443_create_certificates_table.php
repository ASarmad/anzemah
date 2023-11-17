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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
            $table->string('status')->nullable();
            $table->string('type')->nullable();
            $table->string('year')->nullable();
            $table->string('version')->nullable();
            $table->string('ref_number')->nullable();
            $table->timestamp('targetdate')->nullable()->default('2022-01-01');
            $table->timestamp('lastdate')->nullable()->default('2022-12-31');
            $table->string('certificate_pdf')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('certificates');
    }
};
