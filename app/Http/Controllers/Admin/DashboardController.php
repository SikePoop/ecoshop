<?php

namespace App\Http\Controllers\Admin;

use App\Models\blog;
use App\Models\supply;
use App\Models\Product;
use App\Models\blogpost;
use App\Models\Category;
use App\Models\supplier;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function Dashboard() {
        return view('admin.dashboard');
    }

    // Feedback
    public function feedback() {

    }

    //Supplier
    public function AddSupplier() {
        return view('admin.addsupplier');
    }
    public function StoreSupplier(Request $request) {
        $request->validate([
            'supplier_name' => 'required|unique:suppliers',
        ]);

        supplier::insert([
            'supplier_name' => $request->supplier_name,
            'email' =>$request->email
        ]);
        return redirect()->route('admin.allsupplier')->with('message', 'Supplier Added Successfully');
    }
    public function AllSupplier() {
        $suppliers = supplier::latest()->get();
        return view('admin.allsupplier',compact('suppliers'));
    }
    public function EditSupplier($id) {
        $supplier_info = supplier::findOrFail($id);
        return view('admin.editsupplier',compact('supplier_info'));
    }
    public function UpdateSupplier(Request $request){
        $request->validate([
            'supplier_name' => 'required|unique:suppliers',
        ]);
        $id = $request->supplier_id;
        supplier::where('supplier_id',$id)->update([
            'supplier_name' => $request->supplier_name,
        ]);
        return redirect()->route('admin.allsupplier')->with('message', 'Supplier Updated Successfully');
    }
    public function DeleteSupplier($id) {
        supplier::where('supplier_id', $id)->delete();
        return redirect()->route('admin.allsupplier')->with('message', 'supplier Deleted Successfully');
    }
    // Supply
    public function CreateSupply() {
        return view('admin.createsupply');
    }
    public function StoreSupply(Request $request) {
        $supplier_id = $request->supplier_id;
        supply::insert([
            'supplier_id' => $request->supplier_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);

        return redirect()->route('admin.allsupply')->with('message', 'supply Added Successfully');

    }
    public function AllSupply() {
        $supplys = supply::latest()->get();
        return view('admin.allsupply',compact('supplys'));
    }

    public function EditSupply($id) {
        $supply_info = supply::where('supply_id',$id)->first();
        return view('admin.editsupply',compact('supply_info'));
    }
    public function UpdateSupply(Request $request){
        $id = $request->supply_id;
        supply::where('supply_id',$id)->update([
            'supplier_id' => $request->supplier_id,
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);
        return redirect()->route('admin.allsupply')->with('message', 'Supply Updated Successfully');
    }
    public function DeleteSupply($id) {
        supply::where('supply_id', $id)->delete();
        return redirect()->route('admin.allsupply')->with('message', 'Sub Category Deleted Successfully');
    }
    // Blog
    public function CreateBlog() {
        return view('admin.createblog');
    }
    public function StoreBlog(Request $request) {
        $request->validate([
            'blog_name' => 'required|unique:blogs',
        ]);
        blog::insert([
            'blog_name' => $request->blog_name,
        ]);
        return redirect()->route('admin.allblog')->with('message', 'Blog Added Successfully');
    }
    public function AllBlog() {
        $blogs = blog::latest()->get();
        return view('admin.allblog',compact('blogs'));
    }
    public function EditBlog($id) {
        $blog_info = blog::where('blog_id',$id)->first();
        return view('admin.editblog',compact('blog_info'));
    }
    public function Updateblog(Request $request){
        $request->validate([
            'blog_name' => 'required|unique:blogs',
        ]);
        $id = $request->blog_id;
        blog::where('blog_id',$id)->update([
            'blog_name' => $request->blog_name,
        ]);
        return redirect()->route('admin.allblog')->with('message', 'Blog Updated Successfully');
    }
    public function Deleteblog($id) {
        blog::where('blog_id', $id)->delete();
        return redirect()->route('admin.allblog')->with('message', 'Blog Deleted Successfully');
    }
    // Blog Post
    public function CreateBlogpost() {
        return view('admin.createblogpost');
    }
    public function StoreBlogpost(Request $request) {
        blogpost::insert([
            'blog_id' => $request->blog_id,
            'blogpost_title' => $request->blogpost_title,
            'blogpost_body' => $request->blogpost_body,
        ]);

        return redirect()->route('admin.allblogpost')->with('message', 'Blog post Added Successfully');

    }
    public function Allblogpost() {
        $blogposts = blogpost::latest()->get();
        return view('admin.allblogpost',compact('blogposts'));
    }

    public function EditBlogpost($id) {
        $blogpost_info = blogpost::where('blogpost_id',$id)->first();
        return view('admin.editblogpost',compact('blogpost_info'));
    }
    public function Updateblogpost(Request $request){
        $id = $request->blogpost_id;
        blogpost::where('blogpost_id',$id)->update([
            'blog_id' => $request->blog_id,
            'blogpost_title' => $request->blogpost_title,
            'blogpost_body' => $request->blogpost_body,
        ]);
        return redirect()->route('admin.allblogpost')->with('message', 'Blog post Updated Successfully');
    }
    public function Deleteblogpost($id) {
        blogpost::where('blogpost_id', $id)->delete();
        return redirect()->route('admin.allblogpost')->with('message', 'Blog post Deleted Successfully');
    }
    // Category
    public function CreateCategory() {
        return view('admin.createcategory');
    }
    public function StoreCategory(Request $request) {
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);

        Category::insert([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ','-',$request->category_name))
        ]);
        return redirect()->route('admin.allcategory')->with('message', 'Category Added Successfully');
    }
    public function AllCategory() {
        $categories = Category::latest()->get();
        return view('admin.allcategory',compact('categories'));
    }
    public function EditCategory($id) {
        $category_info = Category::findOrFail($id);
        return view('admin.editcategory',compact('category_info'));
    }
    public function UpdateCategory(Request $request){
        $request->validate([
            'category_name' => 'required|unique:categories',
        ]);
        $id = $request->category_id;
        Category::findOrFail($id)->update([
            'category_name' => $request->category_name,
            'slug' => strtolower(str_replace(' ','-',$request->category_name))
        ]);
        return redirect()->route('admin.allcategory')->with('message', 'Category Updated Successfully');
    }
    public function DeleteCategory($id) {
        Category::where('id', $id)->delete();
        return redirect()->route('admin.allcategory')->with('message', 'Category Deleted Successfully');
    }
    public function ActivateCategory(Request $request) {
        $id = $request->category_id;
        Category::where('id', $id)->update([
            'status'=>'active'
        ]);
        return redirect()->route('admin.allcategory')->with('message', 'Category Activated Successfully');
    }
    public function DeactivateCategory(Request $request) {
        $id = $request->category_id;
        Category::where('id', $id)->update([
            'status'=>'notactive'
        ]);
        return redirect()->route('admin.allcategory')->with('message', 'Category Deactivated Successfully');
    }

    // Sub Category
    public function CreateSubCategory() {
        return view('admin.createsubcategory');
    }
    public function StoreSubCategory(Request $request) {
        $request->validate([
            'subcategory_name' => 'required|unique:sub_categories',
        ]);
        $category_id = $request->category_id;
        $category_name = Category::where('id', $category_id)->value('category_name');
        SubCategory::insert([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
            'product_count' => 0,
            'category_id' => $request->category_id,
            'category_name' => $category_name
        ]);

        Category::where('id', $category_id)->increment('sub_category_count',1);

        return redirect()->route('admin.allsubcategory')->with('message', 'SubCategory Added Successfully');

    }
    public function AllSubCategory() {
        $subcategories = SubCategory::latest()->get();
        return view('admin.allsubcategory',compact('subcategories'));
    }

    public function EditSubCategory($id) {
        $subcategory_info = SubCategory::findOrFail($id);
        return view('admin.editsubcategory',compact('subcategory_info'));
    }
    public function UpdateSubCategory(Request $request){
        $category_name = Category::where('id',$request->category_id)->value('category_name');
        $id = $request->subcategory_id;
        SubCategory::where('id',$id)->update([
            'subcategory_name' => $request->subcategory_name,
            'slug' => strtolower(str_replace(' ','-',$request->subcategory_name)),
            'category_id' => $request->category_id,
            'category_name' => $category_name
        ]);
        return redirect()->route('admin.allsubcategory')->with('message', 'Sub Category Updated Successfully');
    }
    public function DeleteSubCategory($id) {
        $cat_id = SubCategory::where('id', $id)->value('category_id');
        SubCategory::where('id', $id)->delete();
        Category::where('id', $cat_id)->decrement('sub_category_count',1);
        return redirect()->route('admin.allsubcategory')->with('message', 'Sub Category Deleted Successfully');
    }
    public function ActivateSubCategory(Request $request) {
        $id = $request->subcategory_id;
        SubCategory::where('id', $id)->update([
            'status'=>'active'
        ]);
        return redirect()->route('admin.allsubcategory')->with('message', 'Sub Category Activated Successfully');
    }
    public function DeactivateSubCategory(Request $request) {
        $id = $request->subcategory_id;
        SubCategory::where('id', $id)->update([
            'status'=>'notactive'
        ]);
        return redirect()->route('admin.allsubcategory')->with('message', 'Sub Category Deactivated Successfully');
    }

    public function Logout() {
        Auth::logout();
        return redirect()->route('Home');
    }

    
}
