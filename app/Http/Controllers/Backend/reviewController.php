<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class reviewController extends Controller
{
    public function index()
    {
        return view('backend.review.index', [
            'reviews' => Review::with('transaction:id,code')->paginate(10)
        ]);
    }

    public function show($id){

        return view('backend.review.detail', [
            'review' => Review::with('transaction:id,code,name,type')->where('uuid', $id)->firstOrFail()
        ]);
    }

    public function destroy($id){
        $review = Review::where('uuid', $id)->firstOrFail();
        $review->delete();

        return response()->json([
            'message' => 'Review deleted successfully'
        ]);
    }
}
