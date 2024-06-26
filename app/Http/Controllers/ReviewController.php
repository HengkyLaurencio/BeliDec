<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index(){
        $reviews = Review::latest()->paginate(10);
        return view('review.reviewAdmin', compact ('reviews'));
    }

    public function getReview($order_item_id){

        $reviews = Review::all();
        foreach ($reviews as $review){
            if ($review->order_item_id == $order_item_id){
                echo $review.'<br>';
            }
        }
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