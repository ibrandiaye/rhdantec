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
        Schema::create('emplois', function (Blueprint $table) {
            $table->id();
            //   "","","","","","","",""
        //,"","",""
            $table->string("employeur");
            $table->string("type_contrat");
            $table->string("nature_contrat");
            $table->string("fonction");
            $table->string("responsabilite");
            $table->string("csp");
            $table->string("famille_pro");
            $table->string("unite");
            $table->string("bureau");
            $table->string("titre");
            $table->date("dateps");
            $table->unsignedBigInteger("identification_id");
            $table->foreign("identification_id")
            ->references("id")
            ->on("identifications");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emplois');
    }
};
