<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Gallery\image;
use App\Http\services\fileService;
use App\Http\Requests\ImageRequest;
use App\Http\services\imageService;
use App\Http\Controllers\Controller;

use function Pest\Laravel\json;

class ImageController extends Controller
{
    public function __construct(
        private fileService $fileService,
        private imageService $imageService
    ) {}

    public function index()
    {
        return view('backend.image.index', [
            'images' => $this->imageService->select(2)
        ]);
    }

    public function create()
    {
        return view('backend.image.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ImageRequest $request)
    {
        $data = $request->validated();

        try {
            $data['file'] = $this->fileService->upload($data['file'], 'images');
            $this->imageService->create($data);

            return redirect()->route('image.index')->with('success', 'Image created successfully');
        } catch (\Exception $err) {
            $this->fileService->delete($data['file']);
            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.image.detail', [
            'image' => $this->imageService->selectBy('uuid', $id)
        ]);
    }

    public function edit(string $uuid)
    {
        return view('backend.image.edit', [
            'image' => $this->imageService->selectBy('uuid', $uuid)
        ]);
    }

    public function update(ImageRequest $request, string $uuid)
    {
        $data = $request->validated();
        $getImage = $this->imageService->selectBy('uuid', $uuid);

        try {
            // jika edit gambar
            if ($request->has('file')) {
            //    hapus gambar lama
            $this->fileService->delete($getImage->file);

            //    upload gambar baru
            $data['file'] = $this->fileService->upload($data['file'], 'images');
            }else{
                $data['file'] = $getImage->file;
            }

            $this->imageService->update($data, $uuid);

            return redirect()->route('image.index')->with('success', 'Image update successfully');
        } catch (\Exception $err) {
            $this->fileService->delete($data['file']);
            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    public function destroy(string $uuid)
    {
        $getImage = $this->imageService->selectBy('uuid', $uuid);
        $this->fileService->delete($getImage->file);
        $getImage->delete();

        return response()->json([
            'message' => 'Image deleted successfully'
        ]);
    }
}
