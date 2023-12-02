<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function biodata()
    {
        return view('biodata');
    }

    public function index()
    {
        $jumlah_produk = Product::count();
        $jumlah_category = ProductCategory::count();
        $total_harga = Product::sum('price');
        $total_stock = Product::sum('stock');


        function getAggregatedChartData($aggregateFunction)
        {
            return Product::join('product_categories', 'products.category_id', '=', 'product_categories.id')
                ->select('product_categories.category_name', 'products.category_id', DB::raw("$aggregateFunction as total"))
                ->groupBy('product_categories.category_name', 'products.category_id')
                ->orderBy('product_categories.category_name', 'desc')
                ->get();
        }

        $produkchart = getAggregatedChartData('count(*)');
        $produkTotalPriceChart = getAggregatedChartData('sum(price)');
        $produkTotalStockChart = getAggregatedChartData('sum(stock)');

        return view('pages.dashboard', compact('jumlah_produk', 'jumlah_category', 'total_harga', 'total_stock', 'produkchart', 'produkTotalPriceChart', 'produkTotalStockChart'));
    }

    public function profile()
    {
        return view('pages.profile');
    }

    public function admin()
    {
        return view('pages.admin');
    }

    public function user()
    {
        return view('pages.user');
    }
}
