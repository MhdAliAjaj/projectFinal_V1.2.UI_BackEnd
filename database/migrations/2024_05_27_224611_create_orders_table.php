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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('customer_id')->references('id')->on('customers');
            $table->foreignId('user_id')->references('id')->on('users'); //رقم الزبون
            $table->foreignId('service_id')->references('id')->on('services');
            $table->text('description');//وصف ماذا يريد المستخدم من الخدمة
            $table->boolean('status');// default false => pendding  ,  true=>complete
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
