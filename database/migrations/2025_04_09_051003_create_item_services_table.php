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
        Schema::create('item_service', function (Blueprint $table) {
            $table->id();

            //many to many table between service and items
            $table->foreignId('service_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('item_id')
                ->constrained()
                ->onDelete('cascade');

            //price of item when the service was done
            $table->decimal('price', 10, 2);

            //quantity of item used in the service
            $table->integer('quantity')->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_service');
    }
};
