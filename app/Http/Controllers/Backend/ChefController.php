<?php

namespace App\Http\Controllers\Backend;

use App\Models\Chef;
use Illuminate\Http\Request;
use App\Http\Requests\ChefRequest;
use App\Http\services\chefService;
use App\Http\services\fileService;
use App\Http\services\menuService;
use App\Http\Controllers\Controller;
use App\Http\services\categoryService;

use function PHPUnit\Framework\returnSelf;

class ChefController extends Controller
{
    public function __construct(
        private fileService $fileService, 
        private menuService $menuService,
        private categoryService $categoryService,
        private chefService $chefService)
    {}
    public function index()
    {
        return view('backend.cheff.index', [
            'chefs' => $this->chefService->select(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.cheff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ChefRequest $request)
    {
        $data = $request->validated();

        try {
            $data['image'] = $this->fileService->upload($data['image'], 'images');
            $this->chefService->create($data);

            return redirect()->route('chef.index')->with('success', 'Menu created successfully');
        } catch (\Exception $err) {
            $this->fileService->delete($data['image']);
            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        return view('backend.cheff.detail', [
            'chef' => $this->chefService->selectBy('uuid', $uuid)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.cheff.edit', [
            'chef' => $this->chefService->selectBy('uuid', $id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ChefRequest $request, string $id)
    {
        $data = $request->validated();
        $getChef = $this->chefService->selectBy('uuid', $id);

        try {
            if ($request->has('image')) {
                $this->fileService->delete($getChef->image);
                $data['image'] = $this->fileService->upload($data['image'], 'images');
            }else{
                $data['image'] = $getChef->image;
            }
            $this->chefService->update($data, $id);

            return redirect()->route('chef.index')->with('success', 'Chef updated successfully');
        } catch (\Exception $err) {
            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        $getChef = $this->chefService->selectBy('uuid', $uuid);
        $this->fileService->delete($getChef->image);
        $getChef->delete();
        
        return response()->json([
            'message' => 'Chef has been deleted'
        ]);
    }
}
