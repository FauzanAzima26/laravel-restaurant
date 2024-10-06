<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\services\fileService;
use App\Http\Requests\VideoRequest;
use App\Http\services\VideoService;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
    public function __construct(
        private VideoService $videoService,
        private fileService $fileService)
    {}

    public function index()
    {
        return view('backend.video.index', [
            'videos' => $this->videoService->select(2)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VideoRequest $request)
    {
        $data = $request->validated();

        try {
            $data['video'] = $this->fileService->upload($data['video'], 'videos');
            $this->videoService->create($data);

            return redirect()->route('video.index')->with('success', 'Video created successfully');
        } catch (\Exception $exception) {
            $this->fileService->delete($data['video']);
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('backend.video.detail', [
            'video' => $this->videoService->selectBy('uuid', $id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('backend.video.edit', [
            'video' => $this->videoService->selectBy('uuid', $id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */ 
    public function update(VideoRequest $request, string $id)
    {
        $data = $request->validated();
        $getVideo = $this->videoService->selectBy('uuid', $id);

        try {
            if ($request->has('video')) {
                $this->fileService->delete($getVideo->video);
                $data['video'] = $this->fileService->upload($data['video'], 'videos');
            }else{
                $data['video'] = $getVideo->video;
            }
            $this->videoService->update($data, $id);

            return redirect()->route('video.index')->with('success', 'Video update successfully');
        } catch (\Exception $exception) {
            $this->fileService->delete($data['video']);
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $getVideo = $this->videoService->selectBy('uuid', $id);

        $this->fileService->delete($getVideo->video);

        $getVideo->delete();

        return response()->json([
            'message' => 'Video deleted successfully'
        ]);
    }
}
