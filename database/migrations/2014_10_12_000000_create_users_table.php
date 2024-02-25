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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar')->default('/default/avatar.png');
            $table->string('banner')->default('/default/breadcroumb_bg.jpg');
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->text('website')->nullable();
            $table->text('fb_link')->nullable()->comment('faceBook');
            $table->text('x_link')->nullable()->comment('twitter');
            $table->text('in_link')->nullable()->comment('linkedIn');
            $table->text('wa_link')->nullable()->comment('whats up');
            $table->text('instagram_link')->nullable()->comment('instagram');
            $table->text('about')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('user_type',['user', 'admin'])->default('user');
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
