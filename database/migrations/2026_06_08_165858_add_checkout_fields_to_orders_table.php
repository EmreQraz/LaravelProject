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
        Schema::table('orders', function (Blueprint $table) {
            $table->string('phone')->nullable()->after('customer_email');
            $table->text('address')->nullable()->after('phone');
            $table->string('city')->nullable()->after('address');
            $table->decimal('subtotal', 10, 2)->default(0)->after('city');
            $table->decimal('shipping_price', 10, 2)->default(0)->after('subtotal');
            $table->string('shipping_method')->default('Free Shipping')->after('shipping_price');
            $table->string('payment_method')->default('Cash on Delivery')->after('shipping_method');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'phone',
                'address',
                'city',
                'subtotal',
                'shipping_price',
                'shipping_method',
                'payment_method',
            ]);
        });
    }
};
