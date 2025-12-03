<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ListingReview;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = ListingReview::with('listing')->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.reviews.index', compact('reviews'));
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:0,1,2',
        ]);

        $review = ListingReview::findOrFail($id);
        $review->status = (int) $request->status;
        $review->save();

        return redirect()->back()->with('success', 'Review status updated.');
    }
}
