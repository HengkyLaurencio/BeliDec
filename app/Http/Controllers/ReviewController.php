<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    //get all reviews
    public function index(){
        $reviews = Review::latest()->paginate(10);
        //return view('review.index', compact ('reviews'));
    }

    //get review based on order_item_id column
    public function getReview($order_item_id){

        $reviews = Review::all();
        foreach ($reviews as $review){
            if ($review->order_item_id == $order_item_id){
                echo $review.'<br>';
            }
        }
        
    }

}
