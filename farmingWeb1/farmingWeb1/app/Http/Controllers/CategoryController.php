<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Category::orderBy('created_at','DESC')->search()->paginate(15);
        return view('admin.category.index', compact('data'));
    }

    public function create()
    {
        
        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:category',
            'prioty' => 'required'
        ],[
            'name.required' => 'Tên danh mục không để trống',
            'prioty.required' => 'Thứ tự ưu tiên không để trống',
            'name.unique' => 'Danh mục này đã có trong  CSDL',
        ]);

        if(Category::create($request->all())){
            return redirect()->route('category.index')->with('success', 'Them Moi Thanh Cong');
        }
    }


    public function show(Category $categories)
    {
        //
    }


    public function edit($categories)
    {
        
        $id = Category::findorFail($categories);
        return view('admin.category.edit', compact('id'));

    }


    public function update(Request $request, $categories)
    {
        $request->validate([
            'name' => 'required|unique:accounts',
            'prioty' => 'required'
        ],[
            'name.required' => 'Tên danh mục không để trống',
            'prioty.requir ed' => 'Thứ tự ưu tiên không để trống',
            'name.unique' => 'Danh mục này đã có trong  CSDL',
        ]);
       $id = Category::find($categories);
       $id->update($request->only('name', 'prioty', 'status'));
       return redirect()->route('category.index')->with('success', 'Sua thanh cong');
    }

    public function destroy($categories)
    {
        if(Product::where('category_id', $categories)->count() > 0){
            return redirect()->route('category.index')->with('error', 'Xoa khong thanh cong');
        }
        else{
             Category::where('id', $categories)->delete();
            return redirect()->route('category.index')->with('success', 'Xoa thanh cong');
        }
    }
}
