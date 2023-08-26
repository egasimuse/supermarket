<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Return supermarket home page.
     */
    public function index()
    {
        return view('app');
    }

    /**
     * Return list of products.
     */
    public function products()
    {
        $products = Product::all();
        return view('products', compact('products'));
    }

    /**
     * Return cart with products.
     */
    public function receipt()
    {
        return view('receipt');
    }

    /**
     * Return supermarket home page.
     */
    public function editProducts()
    {
        $products = Product::all();
        return view('edit-products', compact('products'));
    }

    /**
     * Return payment log page.
     */
    public function paymentLog()
    {
        $orders = Order::all();
        return view('payment-log', compact('orders'));
    }

}
