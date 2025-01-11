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
            $table->string('name');// tiêu đề bài viết
            $table->string('image');//ảnh bài viết
            $table->text('description');//mô tả ngắn
            $table->string('video')->nullable(); // Video
            $table->string('position')->nullable();// nội dung bài viết
            $table->unsignedBigInteger('post_type_id'); // Loại bài viết
            $table->foreign('post_type_id')->references('id')->on('post_types')->onDelete('restrict');
            $table->unsignedBigInteger('view_count')->default(0);
            $table->enum('status', ['pending', 'approved'])->default('pending');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
           
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
