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
        Schema::create('customers', function (Blueprint $table) {
            $table->increments("customer_id");
            $table->string("first_name",30);
            $table->string("last_name",30);
            $table->string("phone_number",20);
            $table->string("street",30);
            $table->unsignedInteger("house");
            $table->unsignedInteger("housing");
            $table->unsignedInteger("apartment");

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
