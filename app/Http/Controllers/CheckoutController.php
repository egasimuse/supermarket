<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function checkout(Request $request)
    {
        $validated = $request->validate([
           'products' => 'required|max:10|alpha'
        ]);
        $products = str_split($validated['products']);
        foreach ($products as $product) {
            $productsByType[strtoupper($product)][] = $product;
        }
        $finalProducts = $this->calculateProductPrice($productsByType);
        $this->store($finalProducts);
        return view('receipt', compact('finalProducts'));
    }

    /**
     * Gets products and calculate their prices.
     *
     * @param $products
     * @return array
     */
    private function calculateProductPrice($products)
    {
        $data = [];
        $data['totalPrice'] = 0;
        $getProducts = Product::select()->whereIn('name', array_keys($products))->get();
        foreach ($getProducts as $product) {
            $productQty = count($products[$product->name]);
            $data['products'][$product->name]['productName'] = $product->name;
            $data['products'][$product->name]['productQty'] = $productQty;
            if (!empty($product->special_unit) && $productQty >= $product->special_unit) {
                $specialPriceApplications = intdiv($productQty, $product->special_unit);
                $remainingQty = $productQty % $product->special_unit;
                $totalCost = ($specialPriceApplications * $product->special_price) + ($remainingQty * $product->unit_price);
                $data['products'][$product->name]['productTotalPrice'] = $totalCost;
            }
            else {
                $data['products'][$product->name]['productTotalPrice'] = $product->unit_price *  $productQty;
            }
            $data['totalPrice'] += $data['products'][$product->name]['productTotalPrice'];
        }
        return $data;
    }

    /**
     * Store ordered products into database.
     *
     * @param $data
     *   Products which will be stored.
     * @return void
     */
    private function store($data)
    {
        foreach ($data['products'] as $product) {
            $productModel = new Order();
            $productModel->name = $product['productName'];
            $productModel->quantity = $product['productQty'];
            $productModel->total_price = $product['productTotalPrice'];
            $productModel->save();
        }
    }

}
