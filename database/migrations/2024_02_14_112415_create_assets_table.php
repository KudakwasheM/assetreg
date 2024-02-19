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
        Schema::create('assets', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->string('make')->nullable(false);
            $table->string('model')->nullable(false);
            $table->string('type')->nullable(false);
            $table->string('assettag')->unique();
            $table->string('serial')->unique()->nullable(false);
            $table->string('age')->default(0);
            $table->date('purchase_date')->nullable(false);
            $table->boolean('warranty');
            $table->date('warranty_expiry');
            $table->boolean('assigned')->default(false);
            $table->boolean('active')->default(true);
            $table->unsignedBigInteger('user_id')->nullable(true);
            $table->unsignedBigInteger('department_id')->nullable(true);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('department_id')->references('id')->on('departments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('assets', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
};
