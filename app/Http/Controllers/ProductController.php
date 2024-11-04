<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    //
    public function getAllProducts(){
        try{
            $products = Product::all();
            if($products){
                return response()->json(["success" => true, "message" => "All Products Fetched Succcessfully", "data" => $products], 200);
            }

            return response()->json(["success" => false, "message" => "An Error Occurred"], status: 500);
        }catch(Exception $e){
            return response()->json(["success" => false, "message" => "An Error Occurred: ".$e->getMessage()], status: 500);
        }
    }

    public function get_products_by_user($id){
        try{
            $products = Product::where("user_id", $id)->get();
            if($products){
                return response()->json(["success" => true, "message" => "Products Fetched Succcessfully", "data" => $products], 200);
            }else{

            return response()->json(["success" => false, "message" => "An Error Occurred"], status: 500);
            }
        }catch(Exception $e){
            return response()->json(["success" => false, "message" => "An Error Occurred: ".$e->getMessage()], status: 500);
        }
    }

}
