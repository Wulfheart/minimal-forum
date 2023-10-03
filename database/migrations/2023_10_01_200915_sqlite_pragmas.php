<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('PRAGMA journal_mode=WAL');
        DB::statement('PRAGMA synchronous=1');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
