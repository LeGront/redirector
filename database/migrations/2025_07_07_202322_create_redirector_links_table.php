<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('redirector_links', function (Blueprint $table) {
            $table->id();
            $table->string('destination');
            $table->foreignId('redirector_post_id');
            $table->foreignId('redirector_resource_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('redirector_links');
    }
};
