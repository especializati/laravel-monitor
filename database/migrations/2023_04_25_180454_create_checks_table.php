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
        Schema::create('checks', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('endpoint_id')->index();
            $table->unsignedInteger('status_code');
            $table->text('response_body')->nullable();
            $table->timestamps();

            $table->foreign('endpoint_id')
                        ->references('id')
                        ->on('endpoints');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('checks');
    }
};
