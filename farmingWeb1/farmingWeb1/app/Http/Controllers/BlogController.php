<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Faker\Core\Blood;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::orderBy('created_at','DESC')->search()->paginate(3);
      return view('admin.blog.index', compact('data'));
    }
    public function show()
    {
        $cat = Category::orderBy('name', 'ASC')->select('id', 'name', 'status')->get();
        $blogs = Blog::orderBy('name', 'ASC')->select('id', 'name', 'image', 'sumary', 'description', 'status', 'user_id', 'created_at')->get();
        return view('blog', compact('cat'), compact('blogs'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Blog::orderBy('name', 'ASC')->select('id', 'name', 'status')->get();
        return view('admin.blog.create', compact('cat'));
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
            $file_name = time().'-'.'blog.'.$ext;
            $file->move(public_path('Uploads'), $file_name); 
            
        }
        $request->merge(['image' => $file_name]);
        if(Blog::create([
                'name' => $request->name,
                'status' => $request->status,
                'sumary' => $request->sumary,
                'description' => $request->description,
                'user_id' => Auth::user()->id,
                'image' => $file_name
        ])){
            return redirect()->route('blog.index')->with('success', 'Them Moi Thanh Cong');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit($blogs)
    {
        $blog = Blog::findorFail($blogs);
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $blog)
    {
        if($request->has('file_upload')){
            $file = $request->file_upload;
            $ext = $request->file_upload->extension();
            $file_name = time().'-'.'blog.'.$ext;
            $file->move(public_path('Uploads'), $file_name); 
                
        }
        $request->merge(['image' => $file_name]);
        $id = Blog::find($blog);
       $id->update($request->all());
       return redirect()->route('blog.index')->with('success', 'Sua thanh cong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        
    }
}
