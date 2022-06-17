<?php

namespace App\Http\Controllers;

use App\Models\Banners;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banners::orderBy('created_at','DESC')->search()->paginate(1);
        return view('admin.banner.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banner.create');
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
            $file_name = time().'-'.'banner.'.$ext;
            $file->move(public_path('Uploads'), $file_name); 
            
        }
        $request->merge(['image' => $file_name]);
        if(Banners::create($request->all())){
            return redirect()->route('banner.index')->with('success', 'Them Moi Thanh Cong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function show(Banners $banners)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function edit($banners)
    {
        $banner = Banners::findorFail($banners);
        
        return view('admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$banners)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'banner.'.$ext;
            $file->move(public_path('Uploads'), $file_name); 
            
        }
        $request->merge(['image' => $file_name]);
        $id = Banners::find($banners);
        $id->update($request->all());
       return redirect()->route('banner.index')->with('success', 'Sua thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banners  $banners
     * @return \Illuminate\Http\Response
     */
    public function destroy($banners)
    {
        Banners::where('id', $banners)->delete();
        return redirect()->route('banner.index')->with('success', 'Xoa thanh cong');
    }
}
