<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('ad_resources', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('link');
            $table->foreignId('ad_campaign_id');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ad_resources');
    }
};
