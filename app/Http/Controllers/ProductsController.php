<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Add new product to the database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha',
            'unit_price' => 'required|numeric|min:1',
            'special_unit' => 'nullable|min:1',
            'special_price' => 'nullable|min:1',
        ]);
        $productModel = new Product();
        $productName = strtoupper($request->name);
        $productCheck = $productModel::where('name', $productName)->first();
        if (empty($productCheck->id)) {
            $productModel->name = $productName;
            $productModel->unit_price = $request->unit_price;
            $productModel->special_unit = $request->special_unit ?? NULL;
            $productModel->special_price = $request->special_price ?? NULL;

            $productModel->save();
            return redirect()->back();
        }
        return redirect()->back()->withErrors(['Product with this name already exist, please enter unique name.']);
    }

    /**
     * Update selected product in the database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha',
            'unit_price' => 'required|numeric|min:1',
            'special_unit' => 'nullable|min:1',
            'special_price' => 'nullable|min:1',
        ]);
        $productId = $request->get('product_id');
        $productName = strtoupper($request->get('name'));
        $productModel = Product::find($productId);
        $productModel->name = $productName;
        $productModel->unit_price = $request->get('unit_price');
        $productModel->special_unit = $request->get('special_unit') ?? NULL;
        $productModel->special_price = $request->get('special_price') ?? NULL;
        $productModel->save();
        return redirect()->back();
    }

    /**
     * Delete selected product from database.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete(Request $request)
    {
        $product_id = $request->get('product_id');
        $productModel = Product::find($product_id);
        $productModel->delete();
        return redirect()->back();
    }
}
