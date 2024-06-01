<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        // $user = Auth::user();
        // dd($user);
        $category = Category::all();

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'message' => 'List Category Success',
            'data' => [
                'user' => auth()->user(),
                'category' => $category
            ]
        ]);
    }
}
