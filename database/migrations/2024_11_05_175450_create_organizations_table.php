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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id(); // id
            $table->string('name'); // name
            $table->string('address')->nullable(); // address
            $table->string('phone')->nullable(); // phone
            $table->enum('type', ['individual', 'company']); // type
            $table->string('web_url')->nullable(); // web_url
            $table->unsignedBigInteger('created_by')->nullable(); // created_by
            $table->unsignedBigInteger('updated_by')->nullable(); // updated_by
            $table->timestamps(); // created_at, updated_at

            // Foreign key constraints for created_by and updated_by
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
