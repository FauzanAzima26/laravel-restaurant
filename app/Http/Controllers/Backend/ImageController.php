<?php

namespace App\Http\Controllers\Backend;

use App\Models\Gallery\image;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.image.index', [
            'images' => image::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.image.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3',
            'file' => 'required|image|mimetypes:image/jpeg,image/png,image/gif,image/svg,image/jpg|mimes:jpeg,png,gif,svg,jpg|max:2048' 
        ]);

        try{
            $fileName = uniqid() . '.' . $request->file('file')->extension();

            $data['file'] = $request->file('file')->storeAs('images', $fileName, 'public');

            $data['uuid'] = Str::uuid();
            $data['slug'] = Str::slug($data['name']);
            image::create($data);

            return redirect()->route('image.index')->with('success', 'Image created successfully');
        }catch(\Exception $err){
            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
