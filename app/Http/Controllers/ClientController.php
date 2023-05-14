<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Message;
use App\Models\SubCategory;
use App\Models\ShippingInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function CategoryPage($id) {
        $category_id = Category::where('id',$id)->first();
        $products = Product::where('product_category_id',$id)->latest()->get();
        return view('user_template.category',compact('products','category_id'));
    }
    public function SubCategoryPage($id) {
        $products = Product::where('product_subcategory_id',$id)->latest()->get();
        return view('user_template.subcategory',compact('products'));
    }
    public function SingleProduct($id) {
        $product = Product::findOrFail($id);
        $subcategory = Product::where('id',$id)->value('product_subcategory_id');
        $productFs = Product::where('product_subcategory_id',$subcategory)->latest()->get();
        return view('user_template.product',compact('product','productFs'));
    }
    public function AddToCart(Request $request) {
        $product_price = $request->product_price;
        $product_quantity = $request->quantity;
        $price = $product_price * $product_quantity;
        Cart::insert([
            'product_id' => $request->product_id,
            'user_id' => Auth::id(),
            'quantity' => $request->quantity,
            'price' => $price 
        ]);
        return redirect()->route('showcart')->with('message','Your item added to cart
        successfully');
    }
    public function ShowCart() {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id',$user_id)->get();
        return view('user_template.addtocart',compact('cart_items'));
    }
    public function RemoveCartItem($id) {
        Cart::where('id',$id)->delete();
        return redirect()->route('showcart')->with('message','Your item removed to cart
        successfully');
    }
    public function ShippingAddress() {
        return view('user_template.shippingaddress');
    }
    public function AddShippingAddress(Request $request) {
        $request->validate([
            'address' => 'required|min:2',
            'phone_number' => 'required|min:10',
        ]);
        ShippingInfo::insert([
            'user_id' => Auth::id(),
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'postal_code' => $request->postal_code,
        ]);
        return redirect()->route('checkout');
    }
    public function Checkout() {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id',$user_id)->get();
        $shipping_address = ShippingInfo::where('user_id',$user_id)->first();
        return view('user_template.checkout',compact('cart_items','shipping_address'));
    }
    public function PlaceOrder() {
        $user_id = Auth::id();
        $cart_items = Cart::where('user_id',$user_id)->get();
        $shipping_address = ShippingInfo::where('user_id',$user_id)->first();

        foreach($cart_items as $item) {
            Order::insert([
                'user_id' => $user_id,
                'shipping_phoneNumber' => $shipping_address->phone_number,
                'shipping_address' => $shipping_address->address,
                'shipping_postalcode' => $shipping_address->postal_code,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'total_price' => $item->price,
                'status' => 'pending',
            ]);
            
            $id = $item->id;
            Cart::findOrFail($id)->delete();
        }
        ShippingInfo::where('user_id',$user_id)->first()->delete();
        return redirect()->route('pendingorders')->with('message','Your Order Has Been 
        Place Successfully!');
    }
    public function Blog() {
        return view('user_template.blog');
    }
    public function About() {
        return view('user_template.about');
    }
    public function Contact() {
        return view('user_template.contact');
    }
    public function UserProfile() {
        
        return view('user_template.userprofile');
    }
    public function PendingOrders() {
        $pending_orders = Order::where('status','pending')->latest()->get();
        return view('user_template.pendingorders',compact('pending_orders'));
    }
    public function History() {
        $pending_orders = Order::where('status','done')->latest()->get();
        return view('user_template.history',compact('pending_orders'));
    }
    public function Message(Request $request) {
        $user_id = $request->user_id;
        message::insert([
            'user_id' => $user_id,
            'message' => $request->message,
        ]);
        return redirect()->route('showmessage')->with('message','Message Sent Successfully');
    }
    public function ShowMessage() {
        $messages = Message::latest()->get();
        return view('user_template.message',compact('messages'));
    }
    public function Logout() {
        Auth::logout();
        return redirect()->route('Home');
    }
}
