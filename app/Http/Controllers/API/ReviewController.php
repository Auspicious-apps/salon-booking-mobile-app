<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Review;
use Auth;

class ReviewController extends Controller
{
    public function insert_review(Request $request)
    {
        $salon_id = $request->input('salon_id');
        $user_id = Auth::user()->id;
        $rating = $request->input('rating');
        $comment = $request->input('comment');
        
        
        $inser_review = new Review;
        
        $inser_review->salon_id = $salon_id;
        $inser_review->user_id = $user_id;
        $inser_review->rating = $rating;
        //$inser_review->comment = $comment;
        $inser_review->save();
        
        if($inser_review)
        {
            $data['status_code']    =   1;
            $data['status_text']    =   'Success';             
            $data['message']        =   'Review added successfully';
        }
        else
        {
            $data['status_code']    =   0;
            $data['status_text']    =   'Failed';             
            $data['message']        =   'Review not added successfully';
        }
        return $data;
    }
}
