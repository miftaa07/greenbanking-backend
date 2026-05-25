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
        Schema::create('balasan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pesan_id');
            $table->text('isi_balasan');
            $table->timestamps();

            $table->foreign('pesan_id')
                ->references('id')
                ->on('pesan')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balasan');
    }
};
