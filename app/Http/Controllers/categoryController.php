<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\category;
use App\Models\Front;
use App\Models\News;




class categoryController extends Controller
{
    //

public function details($id, $slug)
{
    try {
        $newsItems = News::with('comments.user')
            ->where('id', $id)
            ->where('slug', $slug)
            ->firstOrFail();

        $related = $this->getRelatedNews($newsItems);

        $newsItems->increment('views');
        $categories = Category::all();
        $topNews = News::orderBy('views', 'desc')->take(3)->get();
        $latestNews = News::latest()->take(3)->get();

        // dd($newsItems); // Uncomment this line for debugging

        return view('details', compact('newsItems', 'related', 'categories', 'topNews', 'latestNews'));
    } catch (ModelNotFoundException $e) {
        // Handle the case where the news item is not found
        return abort(404);
    }
}

    public function related($id, $slug)
    {
        $newsItems = News::with('comments.user') // Eager load comments and user relationships
            ->where('id', $id)
            ->where('slug', $slug)
            ->firstOrFail();

        $related = $this->getRelatedNews($newsItems);

        $newsItems->increment('views');

        return view('details', compact('newsItems', 'related'));
    }

    private function getRelatedNews($newsItems)
    {
        return News::where('category', $newsItems->category)
            ->where('id', '!=', $newsItems->id)
            ->limit(3)
            ->get();
    }


}
