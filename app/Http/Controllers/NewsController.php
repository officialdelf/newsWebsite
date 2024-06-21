<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Models\News;
use App\Models\Category;
use App\Models\Author; // Import the Author model
use App\Models\Editor;
use App\Models\Front;



class NewsController extends Controller
{
    //
    public function home(){
        $categories = Category::all(); // Retrieve all records from the categories table
        $front = News::select(['id','title','content','slug','author' ,'image1','created_at'])
        ->where('side','frontMain')->get(); // Retrieve all records from the categories table

        $side = News::select(['id','title','content','slug','author' ,'image1','created_at'])
        ->where('side','frontSide')->get(); // Retrieve all records from the categories table
        //top news
        $topNews = News::orderBy('views', 'desc')->take(3)->get();

        $topBusinessNews = News::select(['id','title','content','slug','author' ,'image1','created_at'])
        ->where('category', '1')
        ->get();
        $popular = News::select(['id','title','content','slug','author' ,'image1','created_at'])
        ->where('category', '8')
        ->get();
        $topSportsNews =News::select(['id','title','content','slug','author' ,'image1','created_at'])
        ->where('category', '4')
        ->get();
        $latestNews = News::latest()->take(3)->get();
        //dd($topBusinessNews);
        return view('home2',compact('categories','front','side','topNews','topBusinessNews','topSportsNews','popular'));
    }

    public function navbar(){
        $categories = Category::all(); // Retrieve all records from the categories table
      return view('navbar',compact('categories'));
    }
    //footer
    public function footer(){
        $categories = Category::all(); // Retrieve all records from the categories table
        $topNews = News::orderBy('views', 'desc')->take(3)->get();
        //$latest = News::orderBy('published_at', 'desc')->take(3)->get();
        // Add this line to fetch the latest news
        $latestNews = News::latest()->take(4)->get();

      return view('footer',compact('categories','topNews','latestNews'));
    }

    public function addNews(Request $request){

      /*  $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category' => 'required',
            'author' => 'required',
            'editor' => 'required',
            'published_at' => 'required',
            //'image1.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Add validation for images
        ]); */



        // Assign the submitted form data to the News instance
        // Create a new News instance
        $data = new News();
        $image1 =$request->image1;
        $image1name=time().$image1->getClientOriginalExtension();
        $request->image1->move('news',$image1name);
        $data->image1=$image1name;

        $image2 =$request->image2;
        $image2name=time().$image2->getClientOriginalExtension();
        $request->image2->move('news',$image2name);
        $data->image2=$image2name;

        $image3 =$request->image3;
        $image3name=time().$image3->getClientOriginalExtension();
        $request->image3->move('news',$image3name);
        $data->image3=$image3name;

        $image4 =$request->image4;
        $image4name=time().$image4->getClientOriginalExtension();
        $request->image4->move('news',$image4name);
        $data->image4=$image4name;

        $data->title =$request->title;
        $data->category =$request->category;
        $data->author =$request->author;
        $data->editor =$request->editor;
        $data->published_at =$request->published_at;
        $data->slug = Str::slug($data->title); // Generate a slug from the title
        $data->caption = $request->caption;

        $data->title = $request->title;
        $data->content =$request->content;

        $data->category = $request->category;
        $data->author = $request->author;
        $data->editor = $request->editor;
        $data->published_at = $request->published_at;
        $data->slug = Str::slug($data->title); // Generate a slug from the title
        $data->caption = $request->caption;




           /* $image1=$request->file('image1');
            $image1name=time(). '.'.$image1->getClientOriginalExtension();
            $image1->move('newss',$image1name);
            $data->image1=$image1name; */


        $data->save();

        return redirect()->back()->with('message', 'News added successfully!');
    }
    public function search(Request $request)
{
    $search = $request->search;
    $topNews = News::orderBy('views', 'desc')->take(4)->get();

        $categories = Category::all();
    $data = News::select(['id','title', 'category', 'content', 'author', 'editor', 'published_at', 'image1', 'slug'])
        ->where('title', 'LIKE', '%' . $search . '%')
        ->orWhere('category', 'LIKE', '%' . $search . '%')
        ->orWhere('content', 'LIKE', '%' . $search . '%')
        ->orWhere('author', 'LIKE', '%' . $search . '%')
        ->orWhere('editor', 'LIKE', '%' . $search . '%')
        ->orWhere('published_at', 'LIKE', '%' . $search . '%')
        ->orderBy('views', 'DESC')
        ->paginate(9);
        $latestNews = News::latest()->take(3)->get();

    if ($data->count()) {
       return view('search', compact('data','categories','topNews','latestNews'));
       //return response()->json($data);

    }
    else {
       return abort(404);
    }
}


    public function postNews()
    {
        $categories = Category::all(); // Retrieve all records from the categories table
        $authors = Author::all(); // Assuming you have an Author model
        $editors = Editor::all();
         return view('admin.addNews',compact('categories', 'authors', 'editors'));

    }
    public function addFront(Request $request){

        /*  $request->validate([
              'title' => 'required',
              'content' => 'required',
              'category' => 'required',
              'author' => 'required',
              'editor' => 'required',
              'published_at' => 'required',
              //'image1.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048' // Add validation for images
          ]); */

          $data = new Front();
          $image1 =$request->image1;
          $image1name=time().$image1->getClientOriginalExtension();
          $request->image1->move('news',$image1name);
          $data->image1=$image1name;

          $image2 =$request->image2;
          $image2name=time().$image2->getClientOriginalExtension();
          $request->image2->move('news',$image2name);
          $data->image2=$image2name;

          $image3 =$request->image3;
          $image3name=time().$image3->getClientOriginalExtension();
          $request->image3->move('news',$image3name);
          $data->image3=$image3name;

          $image4 =$request->image4;
          $image4name=time().$image4->getClientOriginalExtension();
          $request->image4->move('news',$image4name);
          $data->image4=$image4name;
          $data->position =$request->position;


          $data->title =$request->title;
          $data->content =$request->content;
          $data->category =$request->category;
          $data->author =$request->author;
          $data->position =$request->position;

          $data->caption =$request->caption;


          //$data->editor =$request->editor;
          $data->published_at =$request->published_at;
          $data->slug = Str::slug($data->title); // Generate a slug from the title


             /* $image1=$request->file('image1');
              $image1name=time(). '.'.$image1->getClientOriginalExtension();
              $image1->move('newss',$image1name);
              $data->image1=$image1name; */


          $data->save();

          return redirect()->back()->with('message', 'Front news added successfully!');
      }

      public function postFront()
      {
          $categories = Category::all(); // Retrieve all records from the categories table
          $authors = Author::all(); // Assuming you have an Author model
          $editors = Editor::all();
           return view('admin.addFront',compact('categories', 'authors', 'editors'));

      }
    ///addImages
    public function addImages(Request $request){

        $data = new image();
        $data->news_title =$request->news_title;
        $data->imageName =$request->imageName;
        $image=$request->image;
     $imagename=time(). '.'.$image->getClientOriginalExtension();
     $request->image->move('images',$imagename);
     $data->image=$imagename;


        $data->save();
        return redirect()->back()->with('message','image added successfully!');
    }
//show by category
//public function showByCategory($category)
//{
    //$news = News::where('category', $category)->get();
    //return view('showByCategory', ['news' => $news]);
//}
public function showByCategory($category)
{
    $newsItem = News::where('category', $category)->get();
    $categories = Category::all();
    $topNews = News::orderBy('views', 'desc')->take(3)->get();
    $latestNews = News::latest()->take(3)->get();


    return view('showByCategory', compact('newsItem', 'categories', 'topNews','latestNews'));
}
//news details
public function newsDetails($id)
{
    \Log::info('News ID: ' . $id);

    try {
        $newsItem = News::findOrFail($id);
        \Log::info('Found news item: ' . $newsItem->title);
        return view('newsDetails', compact('newsItem'));
    } catch (\Exception $e) {
        \Log::error('Error: ' . $e->getMessage());
        abort(404);
    }
}

public function details($id)
      {
          $news = news::where('id', $id)->get(); // Retrieve all records from the categories table

          // return view('newsDetails',compact('news'));

      }
      public function sky(){
        $news=news::all();
        return view('sky',compact('news'));

      }
      public function frontDetails($id)
    {
        $newsItems = Front::with('comments.user') // Eager load comments and user relationships
            ->where('id', $id)
            ->firstOrFail();

        $related = $this->getRelatedNews($newsItems);

        $newsItems->increment('views');
        $categories = Category::all(); // Retrieve all records from the categories table
        $topNews = News::orderBy('views', 'desc')->take(3)->get();
        $latestNews = News::latest()->take(3)->get();


        return view('frontDetails', compact('newsItems', 'related','categories','topNews','latestNews'));
        //frontDetails relatedFront

    }

    public function relatedFront($id, $slug)
    {
        $newsItems = Front::with('comments.user') // Eager load comments and user relationships
            ->where('id', $id)
            ->where('slug', $slug)
            ->firstOrFail();

        $related = $this->getRelatedNews($newsItems);
        $latestNews = News::latest()->take(3)->get();


        $newsItems->increment('views');


        return view('frontDetails', compact('newsItems', 'related',''));
    }


}
