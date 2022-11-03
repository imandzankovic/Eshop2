<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\orderModel;
use App\productModel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders=orderModel::all();
        $products=productModel::all();
        return view('showAllOrders')->with('orders', $orders)->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderObj = new orderModel;
        $orderObj->adress = $request->adress;
        $orderObj->customer = $request->customer;
        $orderObj->phone = $request->phone;
        $orderObj->product_id = $request->product_id;
        $orderObj->save();
        return redirect('orders');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
       // $orderToShow = orderModel::find($id);
       // $orderToDelete->delete();
       // return redirect('orders/{orderToShow}');
    //}
    public function show($id)
    {   
        $orders=orderModel::find($id);   
        return view('showOneOrder')->with('orders', $orders);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $orderObj = orderModel::find($id);
        $orderObj->adress = $request->adress;
        $orderObj->customer = $request->customer;
        $orderObj->phone = $request->phone;
        $orderObj->product_id = $request->product_id;
        $orderObj->save();
        return redirect('orders');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderToDelete = orderModel::find($id);
        $orderToDelete->delete();
        return redirect('orders');
    }

    public static function getMinimum(Request $request){
        $my_array= $request->input;
        $n = count($my_array);
        $min_val = $my_array[0];
        for ($i = 1; $i < $n; $i++)
           if ($min_val > $my_array[$i] && $my_array[$i]>0)
              $min_val = $my_array[$i];
              return $min_val;
     }
    
}
