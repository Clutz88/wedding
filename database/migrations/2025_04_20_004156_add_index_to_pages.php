<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('pages', function (Blueprint $table) {
            $table->index('slug');
        });
        Schema::table('page_seos', function (Blueprint $table) {
            $table->index('page_id');
        });
        Schema::table('rsvps', function (Blueprint $table) {
            $table->index('code');
        });
        Schema::table('guests', function (Blueprint $table) {
            $table->index('rsvp_id');
        });
        Schema::table('settings', function (Blueprint $table) {
            $table->index('group');
        });
    }

    public function down(): void
    {
        //
    }
};
