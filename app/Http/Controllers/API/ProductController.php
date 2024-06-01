<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function index(Request $request) {
        try {
            $slug = $request->input('slug');
            $products = Product::with(['category'])->get();

            if ($slug) {
                try {
                    $product = Product::with(['category'])->where('slug', $slug)->firstOrFail();

                    return response()->json([
                        'code' => 200,
                        'status' => 'success',
                        'message' => 'Product Found',
                        'product' => $product,
                    ], 200);
                } catch (ModelNotFoundException $e) {
                    return response()->json([
                        'code' => 404,
                        'status' => 'error',
                        'message' => 'Product Not Found',
                    ], 404);
                }
            }

            // return response()->json([
            //     'code' => 200,
            //     'status' => 'success',
            //     'message' => 'Products Found',
            //     'data' => [
            //         'products' => $products,
            //     ],
            // ], 200);

            return ProductResource::collection($products);
        } catch (Exception $e) {
            return response()->json([
                'code' => 500,
                'status' => 'error',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    public function show($id) {
        try {
        $product = Product::with(['category'])->findOrFail($id);

        if (!$product) {
            return response()->json([
                'code' => 404,
                'status' => 'error',
                'message' => 'Product Not Found',
            ], 404);
        }

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'Product Found',
            'product' => $product,
            
        ],200);
        } catch (Exception $e) {
            return response()->json([
                'code' => 500, 
                'status' => 'error',
                'message' => $e->getMessage(),
            ],500);
        }
    }

    
}
