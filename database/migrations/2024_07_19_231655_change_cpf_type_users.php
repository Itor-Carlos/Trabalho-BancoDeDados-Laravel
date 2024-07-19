<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('ALTER TABLE users ALTER COLUMN cpf TYPE integer USING cpf::integer');
        // Schema::table('users', function (Blueprint $table) {
        //     //
        //     $table->integer('cpf')->nullable(true)->change();
        // });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('ALTER TABLE users ALTER COLUMN cpf TYPE string USING cpf::string');
        // Schema::table('users', function (Blueprint $table) {
        //     //
        //     $table->
        // });
    }
};
