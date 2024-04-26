<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;

class userscontroller extends Controller
{
   

    function show($a)
    {
        return "Hello from controller-$a";
    }

    public function product()
    {
        // return DB::select("select * from sys.product");
        $products = Product::all();
        // echo "<pre>";print_r($product->toArray());die;
      
        $data = compact('products');
        // echo "<pre>";print_r($data);die;
        return view('users',$data);


    }

    public function productDisplay(Request $request)
    {
        
 //both below statement gives same result means request class object $request can be accessed like this
        // dd($request['all_ids']);
        // dd($request->all_ids);
        
        $receivedIds = $request->all_ids;
        // print_r($receivedIds).">>>".gettype($receivedIds);die;
        // $idsOfArray = explode(",",$receivedIds);
        // dump(array_count_values($idsOfArray));
        $newArrays = array_count_values($receivedIds);
        // dd($newArrays);
        foreach($newArrays as $id=>$qty)
        {
            dump($id."and".$qty);
            // $data = Product::where('id',$id)->get();
            // dd($data->toSql());
            // foreach($data as $product)
            // dd($product->label);
            
            // $data['qty']=$qty;
            // echo"<pre>";print_r($data->toArray());
            // $productDisplayDatas[] = $data->toArray();

        }
        // echo"<pre>";print_r($productDisplayDatas);
        // return view('product_display',$productDisplayDatas);


    }

   
}
