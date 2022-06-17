<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\OrdersDetail;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = Product::orderBy('created_at','DESC')->search()->paginate(1);
        return view('admin.product.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::orderBy('name', 'ASC')->select('id', 'name', 'status')->get();
        return view('admin.product.create', compact('cat'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'product.'.$ext;
            $file->move(public_path('Uploads'), $file_name); 
            
        }
        $request->merge(['image' => $file_name]);
        if(Product::create($request->all())){
            return redirect()->route('product.index')->with('success', 'Them Moi Thanh Cong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Product $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit($products)
    {
        $cat = Category::orderBy('name', 'ASC')->select('id', 'name')->get();
        $product = Product::findorFail($products);
        
        return view('admin.product.edit', compact('product'), compact('cat'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $products)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'product.'.$ext;
            $file->move(public_path('Uploads'), $file_name); 
                
        }
        $request->merge(['image' => $file_name]);
        $id = Product::find($products);
       $id->update($request->all());
       return redirect()->route('product.index')->with('success', 'Sua thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($products)
    {
        if(OrdersDetail::where('product_id', $products)->count() > 0){
            return redirect()->route('product.index')->with('error', 'Xoa khong thanh cong');
        }
        else{
            Product::where('id', $products)->delete();
             return redirect()->route('product.index')->with('success', 'Xoa thanh cong');
        }
    }

}
