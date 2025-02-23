<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use app\models\Favorites;

class FavoritesController extends Controller {

    public function index() {
        $products = [];
        $status = true;

        if (!isset($data['action_type'])) {
            //exit;
        }

//        $favorites = new Favorites();
//        $products = $favorites->getProducts();
//        $product_id = (int)($data['prod_id'] ?? 0);

//        switch($data['action_type']) {
//            case 'get':
//                $products = $favorites->getProducts();
//                break;
//            case 'add':
//                $status = $product_id && $favorites->addProduct($product_id);
//                break;
//            case 'remove':
//                $status = $product_id && $favorites->removeProduct($product_id);
//                break;
//        }

        exit(json_encode([
            'status' => $status,
            'products' => $products,
        ]));
    }


}
