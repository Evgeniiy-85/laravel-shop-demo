<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Favorites;
use Illuminate\Http\Request;

class FavoritesController extends Controller {

    public function index(Request $request) {
        $validation = $request->validate([
            'action_type' => 'required',
            'prod_id' => 'nullable||numeric|min:1',
        ]);

        $favorites = new Favorites();
        $products = $favorites->getProducts();
        $product_id = $request->input('prod_id');
        $status = true;

        switch($request->input('action_type')) {
            case 'get':
                $products = $favorites->getProducts();
                break;
            case 'add':
                $status = $product_id && $favorites->addProduct($product_id);
                break;
            case 'remove':
                $status = $product_id && $favorites->removeProduct($product_id);
                break;
        }

        exit(json_encode([
            'status' => $status,
            'products' => $products,
        ]));
    }
}
