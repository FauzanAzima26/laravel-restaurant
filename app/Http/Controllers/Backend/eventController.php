<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\services\fileService;
use App\Http\Requests\eventRequest;
use App\Http\services\eventService;
use App\Http\Controllers\Controller;

class eventController extends Controller
{

    public function __construct(
        private eventService $eventService,
        private fileService $fileService){}

    public function index()
    {
        return view('backend.event.index',[
            'events' => $this->eventService->select(5)
        ]);
    }


    public function create()
    {
        return view('backend.event.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(eventRequest $request)
    {
        $data = $request->validated();

        try{
            $data['image'] = $this->fileService->upload($data['image'], 'images');
            $this->eventService->create($data);
            return redirect()->route('event.index');
        }catch(\Exception $err){
            $this->fileService->delete($data['image']);
            return redirect()->back()->with('error', $err->getMessage());
        }
    }


    public function show(string $id)
    {
        return view('backend.event.detail', [
            'event' => $this->eventService->selectBy('uuid', $id)
        ]);
    }


    public function edit(string $id)
    {
        return view('backend.event.edit', [
            'event' => $this->eventService->selectBy('uuid', $id)
        ]);
    }


    public function update(eventRequest $request, string $id)
    {
        $data = $request->validated();
        $getEvent = $this->eventService->selectBy('uuid', $id);

        try {
            if ($request->has('image')) {
                $this->fileService->delete($getEvent->image);
                $data['image'] = $this->fileService->upload($data['image'], 'images');
            }else{
                $data['image'] = $getEvent->image;
            }
            $this->eventService->update($data, $id);
            return redirect()->route('event.index');
        } catch (\Exception $err) {
            $this->fileService->delete($data['image']);
            return redirect()->back()->with('error', $err->getMessage());
        }
    }

    public function destroy(string $id)
    {
        $getEvent = $this->eventService->selectBy('uuid', $id);
        $this->fileService->delete($getEvent->image);
        $getEvent->delete();
        return response()->json([
            'message' => 'Event has been deleted'
        ]);
    }
}
