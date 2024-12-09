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
//        echo gettype($products);exit(0);
//         dd($products);
        $data = compact('products');    //understand the compact functionality ye same key access hogi users page/view pe
//        dd($data);
        return view('users',$data);


    }

 /*   public function productDisplay(Request $request)
    {
        $data =$request->input('id');
//        dump($data);exit;
//        $row=[];
//        foreach($data as $id)
//        {
//             $query = Product::where('id', $id);
//           $query = Product::where('id', $id)->ddRawSql(); // This will print the raw SQL query with data binding
//           break;

//        }

        return view('product_display');
    }*/

     public function productDisplay(Request $request)
     {

  //both below statement gives same result means request class object $request can be accessed like this
//          dd($request['all_ids']);  // not best practice in laravel beca it treats it as a array
//          dd($request->all_ids);


         $receivedIds = $request->all_ids;
//         $receivedIds = [2,2,3]; just to check the functionality of array_count_values()
         $newArrays = array_count_values($receivedIds);
//          dump($newArrays);
//          die;
//         $productDisplayData=[];
         foreach($newArrays as $id=>$qty)
         {
             $data = Product::find($id);
//             dump($data);
//             dump($qty);
             $data['qty']=$qty;
//             dump($data);
             $productDisplayData[] = $data;
             // $productDisplayData['qty']=$qty;


         }
//          $a = array(
//              '0'=>array('id'=>12,'name'=>'frfr'),
//              '1'=>array('id'=>32,'name'=>'cccc'),
//          );
//          foreach($a as $r)
//          {
//              dump($r['name']);
//          }
//          die;
//          dump($productDisplayData);
         return view('product_display',['productDisplayData'=>$productDisplayData]);
         exit();


     }

     public function issue_testing()
     {
//         return view('test_problem');
         // return DB::select("select * from sys.product");
         $products = Product::all();
//        echo gettype($products);exit(0);
//         dd($products);
         $data = compact('products');    //understand the compact functionality ye same key access hogi users page/view pe
//        dd($data);

         return view('qty_not_updating',$data);
     }

    public function inc_dec()
    {
        return view('inc_dec_page');
    }

//public function productDisplay(Request $request)
//    {
//       dump($request['all_ids']);
//       dd( $_POST['all_ids']);

//        $idsArray = json_decode(urldecode($id), true);
//        print_r($idsArray);die;


//    }




}
