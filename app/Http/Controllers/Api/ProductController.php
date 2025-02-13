<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Resources\ProductResource;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    public function index() {
        // get all products
        $products = Product::latest()->paginate(10);

        return new ProductResource(200, 'List Data Products', $products);    
    }

    public function store(Request $request) {
        // validatethe request
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'price' => 'required|integer|numeric',
            'stock' => 'required|integer|numeric',
        ]);
        // return error if validation fails
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 400);
        }
        // create a new product
        $product = Product::create($request->all());
        // return success response
        return new ProductResource(201, 'Product Created', $product);

    }

    public function show($id) {
        // find product by id
        $product = Product::find($id);
        // return product if found, otherwise return error
        if ($product) {
            return new ProductResource(200, 'Product Details', $product);
        } else {
            return response()->json(['error'=>'Product not found'], 404);
        }
    }

    public function update(Request $request, $id) {
        // find product by id
        $product = Product::find($id);
        // return error if product not found
        if (!$product) {
            return response()->json(['error'=>'Product not found'], 404);
        }
        // validate the request
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:100',
            'description' => 'required|max:255',
            'price' => 'required|integer|numeric',
            'stock' => 'required|integer|numeric',
        ]);
        // return error if validation fails
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 422);
        }
        // update the product
        $product->update($request->all());
        // return updated product
        return new ProductResource(200, 'Product Updated', $product);
    }

    public function destroy($id) {
        // find product by id
        $product = Product::find($id);
        // return error if product not found
        if (!$product) {
            return response()->json(['error'=>'Product not found'], 404);
        }
        // delete the product
        $product->delete();
        // return success response
        return new ProductResource(200, 'Product Deleted', []);
        // return response()->json(['message'=>'Product deleted successfully'], 204);
    }
}
