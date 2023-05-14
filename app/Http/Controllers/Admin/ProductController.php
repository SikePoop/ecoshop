<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function AddProduct() {
        return view('admin.addproduct');
    }
    public function AllProduct() {
        $products = Product::latest()->get();
        return view('admin.allproducts',compact('products'));
    }
    public function StoreProduct(Request $request) {
        $request->validate([
            'product_name' => 'required|unique:products',
            'product_price' => 'required',
            'product_short_des' => 'required',
            'product_long_des' => 'required',
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'product_category_id' => 'required',
            'product_subcategory_id' => 'required',
            'quantity' => 'required',
        ]);

        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url = 'upload/' . $img_name;

        $category_id = $request->product_category_id;
        $subcategory_id = $request->product_subcategory_id;

        $category_name = Category::where('id', $category_id)->value('category_name');
        $subcategory_name = SubCategory::where('id', $subcategory_id)->value('subcategory_name');

        Product::insert([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'product_category_name' => $category_name,
            'product_subcategory_name' => $subcategory_name,
            'slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_category_id' => $request->product_category_id,
            'product_subcategory_id' => $request->product_subcategory_id,
            'product_size' => $request->product_size,
            'quantity' => $request->quantity,
            'product_img' => $img_url,
        ]);

        Category::where('id', $category_id)->increment('product_count',1);
        SubCategory::where('id', $subcategory_id)->increment('product_count',1);

        return redirect()->route('admin.allproducts')->with('message', 'Product Added Successfully');

    }
    public function EditProduct($id) {
        $product_info = Product::findOrFail($id);
        return view('admin.editproduct',compact('product_info'));
    }
    public function UpdateProduct(Request $request){
        $id = $request->id;
        Product::where('id',$id)->update([
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_short_des' => $request->product_short_des,
            'product_long_des' => $request->product_long_des,
            'slug' => strtolower(str_replace(' ','-',$request->product_name)),
            'product_size' => $request->product_size,
            'quantity' => $request->quantity,
        ]);
        return redirect()->route('admin.allproducts')->with('message', 'Sub Category Updated Successfully');
    }
    public function DeleteProduct(Request $request) {
        $id = $request->product_id;
        $category_id = Product::where('id',$id)->value('product_category_id');
        $subcategory_id = Product::where('id',$id)->value('product_subcategory_id');
        Product::where('id', $id)->delete();
        Category::where('id', $category_id)->decrement('product_count',1);
        SubCategory::where('id', $subcategory_id)->decrement('product_count',1);
        return redirect()->route('admin.allproducts')->with('message', 'Product Deleted Successfully');
    }
    public function Activateproduct(Request $request) {
        $id = $request->product_id;
        Product::where('id', $id)->update([
            'status'=>'active'
        ]);
        return redirect()->route('admin.allproducts')->with('message', 'Product Activated Successfully');
    }
    public function Deactivateproduct(Request $request) {
        $id = $request->product_id;
        Product::where('id', $id)->update([
            'status'=>'notactive'
        ]);
        return redirect()->route('admin.allproducts')->with('message', 'Product Deactivated Successfully');
    }
    public function EditProductImg($id) {
        $product_info = Product::where('id',$id)->first();
        return view('admin.editproductimg',compact('product_info'));
    }
    public function UpdateProductImg(Request $request) {
        $request->validate([
            'product_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $id = $request->id;
        $image = $request->file('product_img');
        $img_name = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        $request->product_img->move(public_path('upload'),$img_name);
        $img_url = 'upload/' . $img_name;
        Product::where('id',$id)->Update([
            'product_img' => $img_url,
        ]);
        return redirect()->route('admin.allproducts')->with('message', 
        'Product Image Updated Successfully');
    }
}
