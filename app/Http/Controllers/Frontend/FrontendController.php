<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\News\News;
use App\Models\Backend\Category\Category;
use App\Models\Backend\About\AboutInfo;
use App\Models\Backend\About\Team;
use App\Models\Backend\Contact\Contact;
use App\Models\Frontend\Message;
use App\Models\Backend\Ad\Ad;
use App\Models\Backend\News\Gallery;

class FrontendController extends Controller
{
    
    //index page show
    public function index(){
        $newses = News::orderBy('id','desc')->where('is_delete',0)->where('is_pending',0)->where('status',1)->take(9)->get();
        $allnewses = News::orderBy('id','desc')->where('is_pending',0)->where('is_delete',0)->where('status',1)->take(20)->get();
        $categories = Category::orderBy('id','desc')->get();
        return view('frontend.pages.index', compact(
            'newses', 'allnewses','categories'
        ));
    }

    //about page show
    public function about(){
        $abouts = AboutInfo::orderBy('id','desc')->get();
        $teams = Team::orderBy('id','desc')->get();
        return view('frontend.pages.about', compact(
            'abouts', 'teams'
        ));
    }

    //contact page show
    public function contact(){
        $contacts = Contact::orderBy('id','asc')->get();
        return view('frontend.pages.contact', compact('contacts'));
    }
    public function contactmessage(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);
        $message = new Message();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();
        return response()->json($message, 200);
    }

    //search page show
    public function search( Request $request ){
        $search = $request->search;
        $searchnews = News::orWhere('title','like','%'.$search.'%')->orWhere('description','like','%'.$search.'%')->orWhere('title','slug','%'.$search.'%')->orWhere('ref','like','%'.$search.'%')->orderBy('id','desc')->paginate(40);
        return view('frontend.pages.search', compact(
            'searchnews','search'
        ));
    }

    //newsdetail page show
    public function newsdetail($id){
        // dd($id);
        $news = News::find($id);
        // dd($news);
        $categories = Category::orderBy('id','asc')->where('id',$news->category_id)->get();
        $relatednewses = News::orderBy('id','desc')->where('category_id', $news->category_id)->whereNotIn('id',[$news->id])->get();
        $galleries = Gallery::where('news_id', $news->id)->get();
        return view('frontend.pages.newsdetail', compact('news','categories','relatednewses','galleries') );
    }

    //category show
    public function categoryshow(Category $category){
        $categorynews = News::orderBy('id','desc')->where('status',1)->where('is_pending',0)->where('is_delete',0)->where('category_id',$category->id)->paginate(24);
        return view('frontend.pages.category', compact('category','categorynews'));
    }



}
