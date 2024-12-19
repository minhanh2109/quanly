<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use Flasher\Laravel\Facade\Flasher;


class AdminController extends Controller
{
    //Danh mục sản phẩm
    public function view_category(){
        $data = Category::all();
        return view('admin.category', compact('data'));
    }
    

    //Thêm danh mục
    public function add_category(Request $request){
        $category = new Category();
        $category->category_name = $request->category;
        $category->save();
        return redirect()->back();
    }

    //Sửa danh mục
    public function edit_category($id){
        $data = Category::find($id);
        return view('admin.edit_category', compact('data'));
    }

    public function update_category(Request $request, $id){
        $data = Category::find($id);
        $data->category_name = $request->category;
        $data->save();
        return redirect('/view_category');
    }

    //Xóa danh mục
    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        return redirect()->back();
    }
    //Danh sách sản phẩm
    public function view_product(){
        $product = Product::paginate(3); //Lấy 3 sản phẩm mỗi trang
        return view('admin.view_product',compact('product'));
    }
    
    //Thêm sản phẩm
    public function add_product(){
        //Lấy danh mục sản phẩm
        $category = Category::all();
        return view('admin.add_product', compact('category'));
    }
    public function upload_product(Request $request){
        $data = new Product();
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->category = $request->category;
        $data->quantity = $request->quantity;
        $image = $request->image;
        if($image){
            //Tạo tên file hình ảnh theo thời gian
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('products',$imagename);
            $data->image = $imagename;
        }
        $data->save();
        return redirect()->back();
    }

    // Hiển thị trang cập nhật sản phẩm
    public function edit_product($id){
        $data = Product::find($id);
        return view('admin.edit_product', compact('data'));
    }

    // Cập nhật thông tin sản phẩm
    public function update_product(Request $request, $id){
        // Tìm sản phẩm theo id
        $data = Product::find($id);

        // Cập nhật các trường thông tin
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->category = $request->category;
        $data->quantity = $request->quantity;

        // Kiểm tra và cập nhật hình ảnh nếu có upload
        if ($request->hasFile('image')) {
            // Lưu hình ảnh mới
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move('/products/', $filename);

            // Xóa hình ảnh cũ (nếu cần)
            if ($data->image && file_exists(public_path('/products/' . $data->image))) {
                unlink(public_path('/products/' . $data->image));
            }

            // Cập nhật tên file ảnh
            $data->image = $filename;
        }

        // Lưu dữ liệu
        $data->save();
        return redirect()->route('view_product');
    }

    //Xóa sản phẩm
    public function delete_product($id){
        $data = Product::find($id);
        $image_path = public_path('products/'.$data->image);
        if(file_exists($image_path)){
            unlink($image_path);
        }
        $data->delete();
        return redirect()->back();
    }

    //Tìm kiếm sản phẩm
    public function product_search(Request $request){
        $search = $request -> search;
        $product = Product::where('title','LIKE','%'.$search.'%')
        ->orWhere('category','LIKE','%'.$search.'%')
        ->paginate(3);
        return view('admin.view_product',compact('product'));
    }


}
