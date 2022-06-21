<?php

namespace App\Http\Controllers\Backend\News;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\News\News;
use App\Models\Backend\News\Gallery;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Carbon\Carbon;


class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $newses = News::orderBy('id','desc')->where('is_delete',0)->where('is_pending',0)->get();
        
        return view('backend.pages.news.manage',compact('newses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $request->validate([
            'title' => 'required|unique:news,title,',
            'description' => 'required',
            'status' => 'required',
            'featured' => 'required',
            'trending' => 'required',
            'running' => 'required',
            'breaking' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
        ]);
        $news = new News();

        $news->title        = $request->title;
        function make_slug($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        $news->slug         = make_slug($request->title);
        $news->description  = $request->description;
        $news->ref          = $request->ref;
        $news->status       = $request->status;
        $news->is_featured  = $request->featured;
        $news->is_trend     = $request->trending;
        $news->is_running   = $request->running;
        $news->is_breakingNews   = $request->breaking;

        $news->category_id  = $request->category_id;
        $news->author_id    = $request->author_id;

        $news->video = $request->video;



        

        if( $request->image ){
            $image  = $request->file('image');
            $img    = rand(0,10000) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/news/' . $img);
            Image::make($image)->save($location);
            $news->image = $img;
        }
        

        if( $request->audio ){
            $audio  = $request->file('audio');
            $ad    = rand(0,10000) . '.' . $audio->getClientOriginalExtension();
            $location = public_path('audio/' . $ad);
            $audio->move($location, $ad);
            $news->audio = $ad;
        }

        $news->save();

        //success message
        $request->session()->flash('create', 'News added successfully');
        return back();
    }
    public function storeadmin(Request $request)
    {
        
        
        $request->validate([
            'title' => 'required|unique:news,title,',
            'description' => 'required',
            'status' => 'required',
            'featured' => 'required',
            'trending' => 'required',
            'running' => 'required',
            'breaking' => 'required',
            'is_pending' => 'required',
            'category_id' => 'required',
            'author_id' => 'required',
        ]);
        $news = new News();

        $news->title        = $request->title;
        function make_slug_two($string) {
            return preg_replace('/\s+/u', '-', trim($string));
        }
        $news->slug         = make_slug_two($request->title);
        $news->description  = $request->description;
        $news->ref          = $request->ref;
        $news->status       = $request->status;
        $news->is_featured  = $request->featured;
        $news->is_trend     = $request->trending;
        $news->is_running   = $request->running;
        $news->is_pending   = $request->is_pending;
        $news->is_breakingNews   = $request->breaking;

        $news->category_id  = $request->category_id;
        $news->author_id    = $request->author_id;

        $news->video = $request->video;

        

        if( $request->image ){
            $image  = $request->file('image');
            $img    = rand(0,10000) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/news/' . $img);
            Image::make($image)->save($location);
            $news->image = $img;
        }

        if( $request->audio ){
            $audio  = $request->file('audio');
            $ad    = rand(0,10000) . '.' . $audio->getClientOriginalExtension();
            $location = public_path('audio/' . $ad);
            $audio->move($location, $ad);
            $news->audio = $ad;
        }
        $news->save();

        //success message
        $request->session()->flash('create', 'Your news is now in pending list');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        return view('backend.pages.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|unique:news,title,'.$news->id,
            'description' => 'required',
            'status' => 'required',
            'featured' => 'required',
            'trending' => 'required',
            'running' => 'required',
            'breaking' => 'required',
            'category_id' => 'required',
        ]);

        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->description = $request->description;
        $news->ref = $request->ref;
        $news->status = $request->status;
        $news->is_featured = $request->featured;
        $news->is_trend = $request->trending;
        $news->is_running = $request->running;
        $news->is_breakingNews   = $request->breaking;
        $news->category_id = $request->category_id;
        $news->video = $request->video;

        if( $request->image ){
            if( File::exists('images/news/'. $news->image) ){
                File::delete('images/news/'. $news->image );
            }
            $image  = $request->file('image');
            $img    = rand(0,10000) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/news/' . $img);
            Image::make($image)->save($location);
            $news->image = $img;
        }

        if( $request->audio ){
            if( File::exists('audio/'. $news->audio .'/'. $news->audio ) ){
                File::delete('audio/'. $news->audio .'/'. $news->audio );
            }
            $audio  = $request->file('audio');
            $ad    = rand(0,10000) . '.' . $audio->getClientOriginalExtension();
            $location = public_path('audio/' . $ad);
            $audio->move($location, $ad);
            $news->audio = $ad;
        }
        $news->save();

        //success message
        $request->session()->flash('update', 'News updated successfully');
        return redirect()->route('news.show');
    }

    public function pupdate(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|unique:news,title,'.$news->id,
            'description' => 'required',
            'status' => 'required',
            'featured' => 'required',
            'trending' => 'required',
            'running' => 'required',
            'breaking' => 'required',
            'category_id' => 'required',
        ]);

        $news->title = $request->title;
        $news->slug = Str::slug($request->title);
        $news->description = $request->description;
        $news->ref = $request->ref;
        $news->status = $request->status;
        $news->is_featured = $request->featured;
        $news->is_trend = $request->trending;
        $news->is_running = $request->running;
        $news->is_breakingNews   = $request->breaking;
        $news->category_id = $request->category_id;
        $news->video = $request->video;

        if( $request->image ){
            if( File::exists('images/news/'. $news->image) ){
                File::delete('images/news/'. $news->image );
            }
            $image  = $request->file('image');
            $img    = rand(0,10000) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/news/' . $img);
            Image::make($image)->save($location);
            $news->image = $img;
        }

        if( $request->audio ){
            if( File::exists('audio/'. $news->audio .'/'. $news->audio ) ){
                File::delete('audio/'. $news->audio .'/'. $news->audio );
            }
            $audio  = $request->file('audio');
            $ad    = rand(0,10000) . '.' . $audio->getClientOriginalExtension();
            $location = public_path('audio/' . $ad);
            $audio->move($location, $ad);
            $news->audio = $ad;
        }
        $news->save();

        //success message
        $request->session()->flash('update', 'News updated successfully');
        return redirect()->route('pendingnews.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function softdestroy(Request $request, News $news)
    {
        $news->is_delete = 1;
        $news->save();
        //success message
        $request->session()->flash('delete', 'News deleted successfully');
        return redirect()->route('news.show');
    }

    //pending news show
    public function pendingnews()
    {
        $pnewses = News::orderBy('id','desc')->where('is_pending',1)->get();
        return view('backend.pages.news.pending',compact('pnewses'));
    }
    public function editpendingnews(News $news)
    {
        return view('backend.pages.news.editpendingnews', compact('news'));
    }
    public function updatependingnews(Request $request, News $news){
        $request->validate([
            'is_pending' => 'required',
        ]);
        $news->is_pending = $request->is_pending;
        $news->save();

        //success message
        $request->session()->flash('create', 'News approved ');
        return back();
    }
    public function deletependingnews(Request $request, News $news){
        if( !is_null($news) ){
            if( File::exists('images/news/'. $news->image) ){
                File::delete('images/news/'. $news->image );
            }
            if( File::exists('audio/'. $news->audio .'/'. $news->audio ) ){
                File::delete('audio/'. $news->audio .'/'. $news->audio );
            }
            $news->delete();
        }
        $request->session()->flash('delete','News deleted successfully');
        return back();
    }
    
    
    public function deletedNews(){
        $newses = News::orderBy('id','desc')->where('is_delete',1)->where('is_pending',0)->get();
        return view('backend.pages.news.deletednews', compact('newses'));
    }
    
    public function restoreNews(Request $request, News $news){
        $news->is_delete = 0;
        if($news->save()):
            $request->session()->flash('restored','Your news is live again');
            return back();
        endif;
    }
    
    public function restoreAllNews(Request $request){
        $newses = News::where('is_delete',true)->where('is_pending',0)->get();
        foreach($newses as $news){
            $news->is_delete = 0;
            $news->save();
        }
        $request->session()->flash('restored','Your news is live again');
        return back();
        
    }
    
    
    public function galleryNewsView(){
        $newses = News::where('is_delete',0)->get();
        $galleries = Gallery::orderBy('id','desc')->get();
        return view('backend.pages.news.gallery', compact('galleries','newses'));
    }
    
    public function galleryAdd(Request $request){
        $request->validate([
            'caption' => 'required',
            'news_id' => 'required',
            'image' => 'required|max:150',
        ]);
        
        $gallery = new Gallery();
        
        $gallery->news_id = $request->news_id;
        $gallery->caption = $request->caption;
        if($request->image):
            $image  = $request->file('image');
            $img    = rand(0,10000) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/gallery/' . $img);
            Image::make($image)->save($location);
            $gallery->image = $img; 
        endif;
        if($gallery->save()):
            $request->session()->flash('success','Gallery added successfully');
            return redirect()->route('news.gallery');
        endif;
    }
    
    public function galleryEdit($id){
        $newses = News::where('is_delete',0)->get();
        $gallery = Gallery::find($id);
        return view('backend.pages.news.galleryEdit',compact('gallery','newses'));
    }
    
    public function galleryUpdate(Request $request, $id){
        $request->validate([
            'caption' => 'required',
            'news_id' => 'required',
            'image' => 'max:150',
        ]);
        $gallery = Gallery::find($id);
        $gallery->news_id = $request->news_id;
        $gallery->caption = $request->caption;
        if($request->image):
            if( File::exists('images/gallery/'. $gallery->image) ){
                File::delete('images/gallery/'. $gallery->image );
            }
            $image  = $request->file('image');
            $img    = rand(0,10000) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/gallery/' . $img);
            Image::make($image)->save($location);
            $gallery->image = $img; 
        endif;
        if($gallery->save()):
            $request->session()->flash('update','Gallery updated successfully');
            return redirect()->route('news.gallery');
        endif;
    }
    
    public function galleryDelete(Request $request, $id){
        $gallery = Gallery::find($id);
        if( File::exists('images/gallery/'. $gallery->image) ){
            File::delete('images/gallery/'. $gallery->image );
        }
        if($gallery->delete()):
            $request->session()->flash('delete','Gallery deleted successfully');
            return redirect()->route('news.gallery');
        endif;
    }
    
    
}
