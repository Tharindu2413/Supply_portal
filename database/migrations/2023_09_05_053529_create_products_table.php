<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('supplier_id')->constrained('suppliers')->onDelete('cascade');
            $table->string('product_name', 255)->nullable(false)->min(3);
            $table->string('product_code', 255)->nullable(false)->unique();
            $table->string('logo_image')->nullable();
            $table->text('description')->nullable();
            $table->decimal('unit_price', 10, 2)->nullable(false);
            $table->integer('quantity')->nullable(false);
            $table->boolean('status')->default(true); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
