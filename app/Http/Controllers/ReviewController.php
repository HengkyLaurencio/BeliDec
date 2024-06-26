<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\OrderItem;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{

    public function index(){
        $reviews = Review::latest()->paginate(10);

        return view('review.reviewAdmin', compact ('reviews'));
    }

    public function getReview(Request $request){
        $userId = $request->session()->get('user_id');
        $reviews = Review::where('user_id', $userId)->get();
        return view('review.reviewAdmin', compact('reviews'));
    }

    public function getReviewById($order_item_id)
    {

        $orderDetail = OrderItem::where('id',$order_item_id)->get()->first();
        
        if (!$orderDetail) {
            return response('Order cannot be review or not found', 404);
        }
        return view('review.addReview',  compact('orderDetail'));
    }

    public function createReview($order_item_id){
        $review = Review::find($order_item_id);

        Review::create([
            'order_item_id' => $review['order_item_id'],
            'user_id' => $review['user_id'],
            'stars' => $review['stars'],
            'comments' => $review['comments'],
        ]);
    
        // Redirect back with success message
        return redirect()->back()->with('success', 'Success, Order reviewed!');
    }    

    public function deleteReview(Request $request)
    {
        $review = Review::find($request->id);
        $review->delete();
        return redirect()->route('orderReview')->with('success', 'Success, Review deleted!');
    }
}