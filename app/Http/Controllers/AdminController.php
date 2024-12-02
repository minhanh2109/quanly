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
        Flasher::addSuccess('Dữ liệu đã được lưu thành công!');
        return redirect()->back();
    }

    //Xóa danh mục
    public function delete_category($id){
        $data = Category::find($id);
        $data->delete();
        return redirect()->back();
    }

}
