<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function Index() {
        $pending_orders = Order::where('status','pending')->latest()->get();
        $orders = Order::where('status','done')->latest()->get();
        return view('admin.pendingorder',compact('pending_orders','orders'));
    }
    public function Approve(Request $request) {
        $id = $request->id;
        Order::where('id',$id)->update([
            'status' => 'done',
        ]);
        return redirect()->route('pendingorder')->with('message','Order Approved Successfully!');
    }
}
