<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')                                      ->unique();
            $table->string('password');

            $table->string('email')                                         ->unique();
            $table->string('first_name')                                    ->nullable()->comment('Tên');
            $table->string('last_name')                                     ->nullable()->comment('Họ');
            $table->string('phone', 20)                                     ->nullable();

            $table->string('province_id', 10)                               ->nullable();
            $table->string('district_id', 10)                               ->nullable();
            $table->string('ward_id', 10)                                   ->nullable();
            $table->string('address')                                       ->nullable();
            $table->dateTime('birthday')                                    ->nullable();
            $table->string('image')                                         ->nullable();
            $table->tinyInteger('publish')                                  ->default(1);
            $table->enum('role', ["admin", "editor", "author", "reader"])   ->default("reader");

            $table->timestamp('email_verified_at')                          ->nullable()->comment("Thời gian mà email của người dùng đã được xác minh");

            $table->string('email_verification_token')                      ->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
