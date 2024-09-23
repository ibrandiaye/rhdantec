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
           /*  $table->string("employeur");
            $table->string("type_contrat");
            $table->string("nature_contrat");
            $table->string("fonction");
            $table->string("responsabilite");
            $table->string("csp");
            $table->string("famille_pro");
            $table->string("unite");
            $table->string("bureau");
            $table->string("titre");
            $table->string("service"); */
            $table->date("dateps");
            $table->unsignedBigInteger("identification_id");
            $table->foreign("identification_id")
            ->references("id")
            ->on("identifications");
            $table->unsignedBigInteger("employeur_id")->nullable();
            $table->foreign("employeur_id")
            ->references("id")
            ->on("employeurs");
            $table->unsignedBigInteger("type_contrat_id")->nullable();
            $table->foreign("type_contrat_id")
            ->references("id")
            ->on("type_contrats");
            $table->unsignedBigInteger("nature_contrat_id")->nullable();
            $table->foreign("nature_contrat_id")
            ->references("id")
            ->on("nature_contrats");
            $table->unsignedBigInteger("fonction_id")->nullable();
            $table->foreign("fonction_id")
            ->references("id")
            ->on("fonctions");
            $table->unsignedBigInteger("titre_id")->nullable();
            $table->foreign("titre_id")
            ->references("id")
            ->on("titres");
            $table->unsignedBigInteger("responsabilite_id")->nullable();
            $table->foreign("responsabilite_id")
            ->references("id")
            ->on("responsabilites");
            $table->unsignedBigInteger("csp_id")->nullable();
            $table->foreign("csp_id")
            ->references("id")
            ->on("csps");
            $table->unsignedBigInteger("famille_pro_id")->nullable();
            $table->foreign("famille_pro_id")
            ->references("id")
            ->on("famille_pros");
            $table->unsignedBigInteger("service_id")->nullable();
            $table->foreign("service_id")
            ->references("id")
            ->on("services");
            $table->unsignedBigInteger("division_id")->nullable();
            $table->foreign("division_id")
            ->references("id")
            ->on("divisions");
            $table->unsignedBigInteger("bureau_id")->nullable();
            $table->foreign("bureau_id")
            ->references("id")
            ->on("bureaus");
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
