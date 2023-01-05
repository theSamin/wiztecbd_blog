<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class CommentController extends Controller
{
    public function StoreComment(Request $request)
    {
        Comment::insert([
            "blog_id" => $request->blogId,
            "message" => $request->message,
            "created_at" => Carbon::now(),
        ]);

        $notification = [
            "message" => "Your Message Submited Successfully",
            "alert-type" => "success",
        ];

        return redirect()
            ->back()
            ->with($notification);
    } // end mehtod
}
