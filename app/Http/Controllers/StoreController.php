<?php

namespace App\Http\Controllers;

use App\Crud;
use App\Price;
use App\Models\Product;
use App\Services\ProductService;
use Cron\Tests\AbstractFieldTest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use MongoDB\BSON\Regex;


class StoreController extends Controller
{

    private $productService ;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

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
        $this->productService->save($request);
        return redirect('/products');
    }
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }
    public function update(Request $request, Product $product)
    {
        $this->productService->update($product, $request);
        return redirect('/products');

    }
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect('/products');
    }

}
