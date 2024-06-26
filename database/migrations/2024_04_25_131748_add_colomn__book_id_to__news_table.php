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
        Schema::table('News', function (Blueprint $table) {
            $table->foreignId('Book_id')
                ->nullable()
                ->references('id')
                ->on('Books');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('News', function (Blueprint $table) {
            $table->dropColumn('Book_id');
        });
    }
};
