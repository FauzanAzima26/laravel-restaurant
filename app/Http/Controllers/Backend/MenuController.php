<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests\MenuRequest;
use App\Http\services\fileService;
use App\Http\Controllers\Controller;
use App\Http\services\categoryService;
use App\Http\services\menuService;

class MenuController extends Controller
{
    public function __construct(
        private categoryService $categoryService,
        private fileService $fileService,
        private menuService $menuService){}
    
    public function index()
    {
        return view('backend.menu.index', [
            'menus' => $this->menuService->select(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.menu.create', [
            'categories' => $this->categoryService->select()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MenuRequest $request)
    {
        $data = $request->validated();

        try {
            $data['image'] = $this->fileService->upload($data['image'], 'images');
            $this->menuService->create($data);

            return redirect()->route('menu.index')->with('success', 'Menu created successfully');
        } catch (\Exception $err) {
            $this->fileService->delete($data['image']);
            return redirect()->back()->with('error', $err->getMessage());
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.menu.detail', [
            'menu' => $this->menuService->selectBy('uuid', $id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        return view('backend.menu.edit', [
            'menu' => $this->menuService->selectBy('uuid', $uuid),
            'categories' => $this->categoryService->select()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MenuRequest $request, string $id)
    {
        $data = $request->validated();
        $getMenu = $this->menuService->selectBy('uuid', $id);

        try {
            if ($request->has('image')) {
                $this->fileService->delete($getMenu->image);
                $data['image'] = $this->fileService->upload($data['image'], 'images');
            }else{
                $data['image'] = $getMenu->image;
            }
            $this->menuService->update($data, $id);            
            return redirect()->route('menu.index')->with('success', 'Menu updated successfully');

        } catch (\Exception $err) {
            $this->fileService->delete($data['image']);
            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $getMenu = $this->menuService->selectBy('uuid', $uuid);

        $this->fileService->delete($getMenu->image);

        $getMenu->delete();

        return response()->json([
            'message' => 'Menu has been deleted'
        ]);
    }
}
