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
        Schema::create('databases', function (Blueprint $table) {
            $table->id(); // id
            $table->unsignedBigInteger('organization_id'); // organization_id
            $table->string('db_driver'); // db_driver
            $table->string('db_name'); // db_name
            $table->string('db_host'); // db_host
            $table->string('db_username'); // db_username
            $table->string('db_password'); // db_password
            $table->integer('db_port')->nullable(); // db_port
            $table->string('db_prefix')->nullable(); // db_prefix
            $table->string('admin_email'); // admin_email
            $table->string('admin_password'); // admin_password
            $table->string('migration_progress')->nullable(); // migration_progress
            $table->string('seed_progress')->nullable(); // seed_progress
            $table->unsignedBigInteger('created_by')->nullable(); // created_by
            $table->unsignedBigInteger('updated_by')->nullable(); // updated_by
            $table->timestamps(); // created_at, updated_at

            // Foreign key constraints
            $table->foreign('organization_id')->references('id')->on('organizations')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('databases');
    }
};
