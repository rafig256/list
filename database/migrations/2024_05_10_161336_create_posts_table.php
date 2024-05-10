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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('slug' , 255);
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->comment('User who created the post');
            $table->string('image')->nullable();
            $table->integer('views')->default(0);
            $table->boolean('is_popular')->default(false);
            $table->foreignId('listing_id')->nullable()->constrained()->onDelete('cascade');
            $table->text('description');
            $table->boolean('status')->default(false);
            $table->string('seo_title')->nullable();
            $table->string('seo_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
