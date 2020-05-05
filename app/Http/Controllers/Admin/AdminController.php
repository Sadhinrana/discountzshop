<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Admin;
use Carbon\Carbon;
use App\Model\User\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Siteinfo\Subscription;

class AdminController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('Auth:admin');
        $this->middleware('Admin.role')->only('admins', 'destroy');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Get all client
        $clients = User::all()->sortByDesc('id');

        // Get order of latest one month
        $orders = Order::whereMonth(
            'created_at', '=', Carbon::now()->month
        )->whereYear(
            'created_at', '=', Carbon::now()->year
        )->count();

        // Get all subscription
        $subscriptions = Subscription::all()->sortByDesc('id');

        // Show the admin dashboard
        return view('admin.index', compact('clients', 'subscriptions', 'orders'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admins()
    {
        $admins = Admin::all()->sortByDesc('id');

        return view('admin.admin.admins', compact('admins'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vendor  $vendor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Admin::destroy($request->id);

        return response()->json();
    }
}
