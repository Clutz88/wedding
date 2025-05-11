<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('guests', function (Blueprint $table) {
            $table->boolean('attending')->nullable()->change();
            DB::update('
                UPDATE guests
                SET attending = NULL
                WHERE attending = 0
            ');
        });
    }
};
