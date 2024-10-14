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
        Schema::table('documents', function (Blueprint $table) {
            $table->unsignedBigInteger("candidat_id")->nullable();
            $table->unsignedBigInteger("identification_id")->nullable()->change();
            $table->foreign("candidat_id")
            ->references("id")
            ->on("candidats");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign("candidat_id");
            $table->dropColumn("candidat_id");
        });
    }
};
