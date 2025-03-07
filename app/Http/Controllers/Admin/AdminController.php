<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Helpers\Helper;
use Carbon\Carbon;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('admin');
    }

    public function index() {
        $today = Carbon::today();

        $new_orders = Order::where('order_date', '>=', $today)->count();
        $pay_orders = Order::where('payment_date', '>=', $today)
            ->where('payment_date', '>=', $today)
            ->where('order_status', 1)
            ->count();
        $new_clients = User::where('users.user_role', User::ROLE_USER)
            ->where('users.created_at', '>=', $today)
            ->join('orders', 'orders.client_email', '=', 'users.user_email')
            ->count();
        $new_orders_sum = Order::where('payment_date', '>=', $today)->sum('order_sum');

        $chart = [
            'months' => [],
            'count' => [],
        ];

        for ($i = 12; $i >= -1; $i--) {
            $start_date =  Carbon::create(null, null, 1, 0, 0, 0)->subMonth($i);
            $end_date =  Carbon::create(null, null, 1, 0, 0, 0)->subMonth($i-1);

            $count = Order::where('payment_date', '>=', $start_date)
                ->where('payment_date', '<', $end_date)
                ->where('order_status', 1)
                ->count();

            $chart['months'][] = Helper::getMonthNameByNum($start_date->format('m'));
            $chart['count'][] = $count;
        }

        return view('admin.index', [
            'statistics' => [
                'new_orders' => $new_orders,
                'pay_orders' => $pay_orders,
                'new_clients' => $new_clients,
                'new_orders_sum' => (int)$new_orders_sum,
                'chart' => $chart,
            ]
        ]);
    }

    public function error404() {
        return view('admin.errors.404', []);
    }
}
