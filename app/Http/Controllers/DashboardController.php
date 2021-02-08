<?php

namespace App\Http\Controllers;

use App\Exports\OrdersExport;
use App\Models\Category;
use App\Models\Productss;
use App\Models\SubCategory;
use App\Models\Color;
use App\Models\Order;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    function dashboard(){
        $cat_count = Category::count();
        $cat_count_t = Category::onlyTrashed()->count();
        $scat_count = SubCategory::count();
        $scat_count_t = SubCategory::onlyTrashed()->count();
        $products_count = Productss::count();
        $products_count_t = Productss::onlyTrashed()->count();
        $category = Category::inrandomOrder()->limit(1)->get();
        $colors = Color::count();

        $today = User::whereDate('created_at', Carbon::now())->count();
        $one_day_ago = User::whereDate('created_at', Carbon::now()->subDays(1))->count();
        $two_days_ago = User::whereDate('created_at', Carbon::now()->subDays(1))->count();

        return view('backend.dashboard', compact('today', 'one_day_ago', 'two_days_ago', 'cat_count', 'cat_count_t', 'scat_count', 'scat_count_t', 'category', 'products_count', 'products_count_t', 'colors'));
    }

    public function all_orders()
    {
        $orders = Order::latest()->paginate(10);
        return view('backend.orders.index', compact('orders'));
    }

    public function exportExcel()
    {
        return Excel::download(new OrdersExport, 'oders.xlsx');
    }
}
