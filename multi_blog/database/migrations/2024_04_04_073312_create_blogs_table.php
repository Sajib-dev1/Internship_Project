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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->integer('bloger_id');
            $table->string('blog_title');
            $table->integer('category');
            $table->string('tag');
            $table->longText('blog_des');
            $table->string('summary_title')->nullable();
            $table->longText('field_name')->nullable();
            $table->longText('summary_blog')->nullable();
            $table->string('image');
            $table->integer('status')->default(1);
            $table->integer('populer_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
