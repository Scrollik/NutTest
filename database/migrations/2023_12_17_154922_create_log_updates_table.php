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
        Schema::create('log_updates', function (Blueprint $table) {
            $table->integer('albums_id');
            $table->foreign('albums_id', 'albums_id_fk')->on('albums')->references('id')->onDelete('no action');
            $table->integer('users_id');
            $table->foreign('users_id', 'users_id_fk')->on('users')->references('id')->onDelete('no action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_updates');
    }
};
