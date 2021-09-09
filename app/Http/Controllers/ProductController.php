<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductSpecialResource;


class ProductController extends Controller
{
    
    public function index()
    {     
        $products = new ProductCollection(Product::paginate(3));
        return $this->sendResponse("show database ", $products);
        //dd($products);
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create($request->all());
        return $this->sendResponse("save ",new ProductResource($product));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return $this->sendResponse("show id : $id ", new ProductResource($product));
    }

    public function update(ProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
        return $this->sendResponse("update ",  new ProductResource($product) );   
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();       
        return $this->sendResponse("delete ", new ProductResource($product));
    } 
    
    
}
