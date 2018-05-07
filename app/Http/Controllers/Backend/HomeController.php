<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\User;
use App\Product;
use App\Order;
use Analytics;

class HomeController extends Controller{
    public function __construct(){
        $this->middleware('admin');
    }

    public function index(){
        $endDate   = Carbon::today();
        $startDate = Carbon::today()->subDays(7);

        $users = [
            'total'  => User::where('active', 1)->count(),
            'new'    => User::where('active', 1)->where('created_at', '>', $startDate)->count()
        ];

        $products = [
            'total'  => Product::where('published', 1)->count(),
            'new'    => Product::where('published', 1)->where('created_at', '>', $startDate)->count()
        ];

        $orders = [
            'total'  => Order::count(),
            'new'    => Order::where('created_at', '>', $startDate)->count()
        ];

        $contra = [
            'total' => Order::where('tipo_pago', 'contraentrega')->count(),
            'new'   => Order::where('tipo_pago', 'contraentrega')->where('created_at', '>', $startDate)->count()
        ];

        $linea = [
            'total' => Order::where('tipo_pago', 'en_linea')->count(),
            'new'   => Order::where('tipo_pago', 'en_linea')->where('created_at', '>', $startDate)->count()
        ];

        $ordenes = Order::all();
        $productos = [];
        $total_prod = 0;

        foreach ($ordenes as $order) {
            $total_prod += $order->products->count();
            foreach ($order->products as $product) {
                if (array_key_exists($product->id, $productos)) {
                    $productos[$product->id]['valor'] = $productos[$product->id]['valor'] + 1;
                } else {
                    $productos[$product->id] = ['nombre' => $product->title, 'valor' => 1];
                }
            }
        }
        if (!empty($productos)) {
            $productos = array_multisort_by($productos, 'valor', SORT_DESC);
            $productos = array_slice($productos, 0, 3);
        }

        $ventas = [
            'total'     => $total_prod,
            'productos' => array_slice($productos, 0, 3)
        ];

        $analytics = [
            'navegadores' => Analytics::getTopBrowsersForPeriod($startDate, $endDate, 30),
            'visitores'   => Analytics::getVisitorsAndPageViews(7),
            'paginas'     => Analytics::getMostVisitedPages(365, 20),
            'id'     => Analytics::getSiteId(),
        ];

        // $most = Analytics::getTopBrowsersForPeriod($startDate, $endDate, 30);
        // $most = Analytics::getVisitorsAndPageViews();

        return view('admin.home', compact('users', 'products', 'orders', 'contra', 'linea', 'ventas', 'analytics'));
    }
}
