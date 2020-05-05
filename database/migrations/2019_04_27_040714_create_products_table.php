<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->string('productName');
			$table->string('sku');
			$table->mediumText('shortDescription');
			$table->longText('description');
			$table->double('salePrice', 10, 3)->nullable();
			$table->double('regularPrice', 10, 3)->nullable();
			$table->tinyInteger('availability');
			$table->tinyInteger('discount_type');
			$table->integer('discount_value');
            $table->date('valid_until');
            $table->string('product_url')->nullable();
			$table->longText('specification')->nullable();
			$table->boolean('is_approved')->default(false);
			$table->unsignedBigInteger('category_id');
			$table->foreign('category_id')->references('id')->on('categories');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('admin_id')->references('id')->on('admins');
			$table->unsignedBigInteger('brand_id');
			$table->foreign('brand_id')->references('id')->on('brands');
			$table->unsignedBigInteger('country_id');
			$table->foreign('country_id')->references('id')->on('countries');
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
        Schema::dropIfExists('products');
    }
}
