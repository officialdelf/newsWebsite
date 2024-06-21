<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\author; // Make sure to include the appropriate use statement for the Author model
use App\Models\editor; // Make sure to include the appropriate use statement for the Author model
use App\Models\Front;
use App\Models\User;
use App\Models\News;
use App\Models\Category;



class adminController extends Controller
{
    //
    public function home(){
        return view('admin.adminhome');
    }
    public function addAuthor(Request $request){

        $data = new author();
        $data->name =$request->name;
        $data->save();
        return redirect()->back()->with('message','Author added successfully!');
    }

    public function postAuthor()
    {
    return view('admin.addAuthor');

    }
    public function addEditor(Request $request){

        $data = new Editor();
        $data->name =$request->name;
        $data->save();
        return redirect()->back()->with('message','Editor added successfully!');
    }

    public function postEditor()
    {
    return view('admin.addEditor');

    }

    public function user()
    {
        $data=user::all();
        return view('admin.users',compact("data"));
    }

    public function deleteuser($id)
    {
        $data = user::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function edituser($id)
    {
        $data=user::find($id);

        return view('admin.edituser',compact('data'));

    }


    public function updateuser(Request $request,$id)
    {
      $data=user::find($id);
      $image=$request->image;
      if($image){
        $imagename=time(). '.'.$image->getClientOriginalExtension();
        $request->image->move('productimage',$imagename);
        $data->image=$imagename;

      }

     $data->name=$request->name;
     $data->email=$request->email;
     $data->role=$request->role;
     $data->save();
     return redirect()->back()->with('message','user details updated successfully!');
    }
    public function articles()
    {
        $data=News::all();

        return view('admin.articles',compact("data"));

    }

    //editproduct
    //admin articles
//Route::get('/edit_article/{id}',[adminController::class,'edit_article']);
//Route::post('/update_article/{id}',[adminController::class,'update_article']);
//Route::get('/delete_article/{id}',[adminController::class,'delete_article']);
    public function edit_article($id)
    {
        $categories = Category::all(); // Retrieve all records from the categories table
        $authors =Author::all();
        $editors=Editor::all();

        $data=News::find($id);

        return view('admin.editproduct',compact('data','categories','authors','editors'));

    }

        //updateproduct published_at
        public function update_article(Request $request,$id)
        {
          $data=News::find($id);
          $image1=$request->image1;
          if($image1){
            $image1name=time(). '.'.$image1->getClientOriginalExtension();
            $request->image1->move('productimage',$image1name);
            $data->image1=$image1name;
          }

          if($image2){
            $image2name=time(). '.'.$image2->getClientOriginalExtension();
            $request->image2->move('productimage',$image2name);
            $data->image2=$image2name;
          }
          if($image3){
            $image3name=time(). '.'.$image3->getClientOriginalExtension();
            $request->image3->move('productimage',$image3name);
            $data->image3=$image3name;
          }
          if($image4){
            $image4name=time(). '.'.$image4->getClientOriginalExtension();
            $request->image4->move('productimage',$image4name);
            $data->image4=$image4name;
          }
         $data->title=$request->title;
         $data->category=$request->category;
         $data->content=$request->content;
         $data->caption=$request->caption;
         $data->author=$request->author;
         $data->editor=$request->editor;
         $data->published_at=$request->published_at;
         $data->save();
         return redirect()->back()->with('message','article updated successfully!');

        }
        public function delete_article($id)
        {
            $data = News::find($id);
            $data->delete();
            return redirect()->back();
        }
}


