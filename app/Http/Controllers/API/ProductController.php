<?php

namespace App\Http\Controllers\API;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json([
            'status' => 'success',
            'message' => 'Product found successfully',
            'data' => $product
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json([
                'status' => 'success',
                'message' => 'Product found successfully',
                'data' => $product
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found',
                'data' => null
            ], 404);
        }
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'product_name' => 'required',
            'category_id' => 'required',
            'product_code' => 'required',
            'description' => 'required',
            'price' => 'required',
            'unit' => 'required',
            'stock' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validate->errors(),
                'data' => null
            ], 422);
        }
        $product = Product::create([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'product_code' => $request->product_code,
            'description' => $request->description,
            'price' => $request->price,
            'unit' => $request->unit,
            'stock' => $request->stock
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'Product created successfully',
            'data' => $product
        ]);
    }

    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'product_name' => 'required',
            'category_id' => 'required',
            'product_code' => 'required',
            'description' => 'required',
            'price' => 'required',
            'unit' =>  'required',
            'stock' => 'required'
        ]);
        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validate->errors(),
                'data' => null
            ], 422);
        }
        $product = Product::where('id', $id)->update([
            'product_name' => $request->product_name,
            'category_id' => $request->category_id,
            'product_code' => $request->product_code,
            'description' => $request->description,
            'price' => $request->price,
            'unit' => $request->unit,
            'stock' => $request->stock
        ]);
        if ($product) {
            $product = Product::find($id);
            return response()->json([
                'status' => 'success',
                'message' => 'Product updated successfully',
                'data' => $product
            ]);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            return response()->json([
                'status' => 'success',
                'message' => 'Product deleted successfully',
                'data' => null
            ]);
        }
        else {
            return response()->json([
                'status' => 'error',
                'message' => 'Product not found',
                'data' => null
            ], 404);
        }
    }
}
