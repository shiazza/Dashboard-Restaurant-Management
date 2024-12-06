<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $categoryCount = Category::count();
        $menuCount = Menu::count();
        $orderCount = Order::count();

        return view('dashboard', compact('userCount', 'categoryCount', 'menuCount', 'orderCount'));
    }
}