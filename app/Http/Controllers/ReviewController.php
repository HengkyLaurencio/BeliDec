<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index(){
        $reviews = Review::latest()->paginate(10);
        dd ($reviews);
        return view('review.reviewAdmin', compact ('reviews'));
    }

    public function getReview(Request $request){
        $userId = $request->session()->get('user_id');
        $reviews = Review::where('user_id', $userId)->get();
        return view('review.reviewAdmin', compact('reviews'));
    }

    public function createReview(Request $request){
        $review = Review::find($request->order_item_id);

        $request->validate([
            'order_item_id' => ['required', 'string'],
            'user_id' => ['required', 'string'],
            'stars' => ['required', 'integer'],
            'comments' => ['required', 'string'],
        ]);

        $review->items()->create([
            'user_id' => $request->user_id,
            'stars' => $request->stars,
            'comments' => $request->comments,
        ]);

        return redirect(route('orderReview'))->with('success', 'Success, Order reviewed!');

    }

    public function deleteReview(Request $request)
    {
        $review = Review::find($request->id);
        $review->delete();
        return redirect()->route('orderReview')->with('success', 'Success, Review deleted!');
    }
}