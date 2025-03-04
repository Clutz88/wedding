<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rsvp_guest', function (Blueprint $table) {
            $table->foreignId('rsvp_id');
            $table->foreignUuid('guest_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rsvp_guest');
    }
};
