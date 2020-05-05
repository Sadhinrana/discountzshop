<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('product_id')->nullable();
            $table->string('exclude_product_id')->nullable();
            $table->string('category_id')->nullable();
            $table->string('exclude_category_id')->nullable();
            $table->unsignedInteger('limit_per_coupon')->nullable();
            $table->unsignedInteger('limit_per_client')->nullable();
            $table->integer('discount_value');
            $table->tinyInteger('discount_unit');
            $table->date('valid_from');
            $table->date('valid_until');
            $table->string('coupon_code');
            $table->unsignedInteger('minimum_order_value')->nullable();
            $table->unsignedInteger('maximum_order_value')->nullable();
            $table->boolean('is_free_shipping_active')->nullable()->default(0);
            $table->integer('maximum_discount_amount')->nullable();
            $table->tinyInteger('is_redeem_allowed');
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
        Schema::dropIfExists('coupons');
    }
}
