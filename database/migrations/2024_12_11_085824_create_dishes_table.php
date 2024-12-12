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
            $table->decimal('price', 10, 2)->change();
            $table->decimal('sale_price', 10, 2)->change();
            $table->text('description')->change();
            $table->string('image');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->timestamp('availability');
            $table->dropColumn('password');
            $table->integer('quantity')->default(0);

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
