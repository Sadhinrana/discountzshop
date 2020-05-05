<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Model\Siteinfo\Slider;
use App\Model\Product\Product;
use App\Model\Siteinfo\Banner;
use App\Model\Siteinfo\Partner;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Check for the session to determine if the user is new
        if (!Session::has('popup')) {
            Session::put('popup', true);
        }else{
            Session::put('popup', false);
        }

        // Get all partners
        $partners = Partner::all()->sortByDesc('id');

        // Get all sliders
        $sliders = Slider::all();

        // Get all banners
        $banners = Banner::all();

        // Get weekly deal
        $weekly_deal = Product::where([['valid_until', '>=', Carbon::now()], 'is_approved' => true, ['valid_until', '<', Carbon::now()->addDays(7)]])->take(1)->get();

        // Get seasonal discounts
        $seasonal_discounts = Product::where(['discount_type' => 2, 'is_approved' => true, ['valid_until', '>=', Carbon::now()]])->inRandomOrder()->get();

        // Get best deals
        $best_deals = Product::where(['discount_type' => 0, 'is_approved' => true, ['valid_until', '>=', Carbon::now()]])->inRandomOrder()->get();

        // Get regular discounts
        $regular_discounts = Product::where(['is_approved' => true, ['valid_until', '>=', Carbon::now()]])->inRandomOrder()->take(36)->get();

        // Get ending soon product
        $ending_soon = Product::where(['is_approved' => true, ['valid_until', '>=', Carbon::now()->addDays(3)]])->get();

        return view('home', compact('partners', 'sliders', 'banners', 'weekly_deal', 'seasonal_discounts', 'regular_discounts', 'ending_soon', 'best_deals'));
    }
}
