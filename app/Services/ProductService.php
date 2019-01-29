<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Price;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function save(Request $request)
    {
        DB::beginTransaction();
        try
        {
            $success = true;
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
            $success = false;
            DB::rollBack();
        }
        DB::commit();
        return $success;
    }

    public function  update(Product $product, Request $request)
    {
        DB::beginTransaction();
        try
        {
            $success = true;
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
            $success = false;
            DB::rollBack();
        }
        DB::commit();
        return $success;
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
