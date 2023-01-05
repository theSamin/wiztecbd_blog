<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Comment;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function BlogDetails($id)
    {

        $blogs = Blog::latest()->limit(5)->get();
        $item = Blog::findOrFail($id);
        $comments = Comment::where('blog_id', $id)->orderBy('id', 'DESC')->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('frontend.blog_details', compact('item', 'blogs', 'categories', 'comments'));

    } // End Method

    public function Blog(Request $request)
    {

        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $search_key = $request->search;
        if ($search_key) {

            $blogs = Blog::where('blog_title', 'LIKE', '%' . $search_key . '%')
                ->paginate(3);
        } else {
            $blogs = Blog::latest()->paginate(3);
        }

        return view('frontend.blog', compact('blogs', 'categories', 'search_key'));

    } // End Method

}
