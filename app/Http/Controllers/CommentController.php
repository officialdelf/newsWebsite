<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;


class CommentController extends Controller
{
    //
   public function store(Request $request, $newsId)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $comment = new Comment([
            'user_id' => auth()->id(),
            'news_id' => $newsId,
            'content' => $request->input('content'),
        ]);

        $comment->save();

        return redirect()->back()->with('success', 'Comment posted successfully.');
    }
}
