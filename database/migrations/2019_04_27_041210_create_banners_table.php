<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('banner_one');
            $table->string('banner_one_link');
            $table->string('banner_two');
            $table->string('banner_two_link');
            $table->string('banner_deal_page');
            $table->string('banner_link_deal_page');
            $table->string('banner_offer_page');
            $table->string('banner_link_offer_page');
            $table->string('banner_brand_page');
            $table->string('banner_link_brand_page');
            $table->string('banner_brand_single_page');
            $table->string('banner_link_brand_single_page');
            $table->string('banner_category_page');
            $table->string('banner_link_category_page');
            $table->string('banner_industry_page');
            $table->string('banner_link_industry_page');
            $table->string('banner_industry_single_page');
            $table->string('banner_link_industry_single_page');
            $table->string('banner_product_page');
            $table->string('banner_link_product_page');
            $table->string('banner_searched_product_page');
            $table->string('banner_link_searched_product_page');
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
        Schema::dropIfExists('banners');
    }
}
