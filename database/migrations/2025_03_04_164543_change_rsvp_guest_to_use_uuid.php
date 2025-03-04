<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('rsvp_guest', function (Blueprint $table) {
            $table->foreignUuid('rsvp_id')->change();
        });
    }

    public function down(): void
    {
        Schema::table('rsvp_guest', function (Blueprint $table) {
            $table->foreignId('rsvp_id')->change();
        });
    }
};
