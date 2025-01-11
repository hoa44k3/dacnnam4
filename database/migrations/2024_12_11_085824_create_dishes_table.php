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
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->change();
            $table->string('image');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamp('availability');
            $table->integer('quantity')->default(0);
            $table->text('origin')->nullable(); // Nguồn gốc món ăn
            $table->text('ingredients')->nullable(); // Nguyên liệu
            $table->text('preparation')->nullable(); // Cách làm
            $table->text('cultural_value')->nullable(); // Giá trị văn hóa
            $table->unsignedBigInteger('region_id')->nullable();//vùng miền
             $table->foreign('region_id')->references('id')->on('regions')->onDelete('set null');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dishes');
    }
};
