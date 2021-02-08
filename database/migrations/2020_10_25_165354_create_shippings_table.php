<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone');
            $table->foreignId('country_id');
            $table->foreignId('city_id');
            $table->string('zipcode');
            $table->string('address');
            $table->string('product_status')->default(0)->comment('0=pending, 1=shipping, 2=deliver');
            $table->string('payment_status')->default(0)->comment('0=unpaid, 1=paid');
            $table->text('total_amount');
            $table->text('coupon_code')->nullable();
            $table->text('coupon_discount')->nullable();
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shippings');
    }
}
