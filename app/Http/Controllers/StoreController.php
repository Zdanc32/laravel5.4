<?php

namespace App\Http\Controllers;

use App\Crud;
use App\Price;
use App\Product;
use Cron\Tests\AbstractFieldTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use MongoDB\BSON\Regex;


class StoreController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
    public function create()
    {
        return view('products.create');
    }
    public function store(Request $request)
    {
        DB::beginTransaction();
        try
        {
            $product = new Product([
                'product_name' => $request->get('product_name'),
                'product_description' => $request->get('description')
            ]);
            $product->save();
            $prices = explode(',', $request->get('prices'));
            $this->insert_prices_to_product($product, $prices);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
        }
        DB::commit();
        return redirect('/products');
    }
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    public function update(Request $request, Product $product)
    {
        DB::beginTransaction();
        try
        {
            $product->product_name = $request->get('product_name');
            $product->product_description = $request->get('description');
            $product->save();
            $prices = Price::where('product_dwfk', $product->product_dwid)->get();

            foreach ($prices as $price) {
                $price->delete();
            }

            $new_prices = explode(',', $request->get('prices'));
            $this->insert_prices_to_product($product, $new_prices);
        }
        catch (\Exception $e)
        {
            DB::rollBack();
        }
        DB::commit();
        return redirect('/products');

    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }

    private function insert_prices_to_product($product, $prices)
    {
        foreach ($prices as $p)
        {
            $price = new Price([
                'product_dwfk' => $product['product_dwid'],
                'price' => $p
            ]);
            $price->save();
        }
    }
}
