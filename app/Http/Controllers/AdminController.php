<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Flasher\Laravel\Facade\Flasher;
use Flasher\Toastr\Prime\ToastrInterface;

class AdminController extends Controller
{
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

}
