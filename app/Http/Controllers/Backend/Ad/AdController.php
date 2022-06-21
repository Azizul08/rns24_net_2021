<?php

namespace App\Http\Controllers\Backend\Ad;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Ad\Ad;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::orderBy('id','desc')->get();
        return view('backend.pages.ad.manage', compact('ads'));
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
        $request->validate(
            [
                'image' => 'required'
            ]
        );

        $ad = new Ad();
        
        $ad->link = $request->link;

        if ($request->image) {
            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/ad/' . $img);
            Image::make($image)->save($location);
            $ad->image = $img;
        }
        $ad->save();

        //write success message
        $request->session()->flash('message', ' Advertisement added Successfully');

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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
       
        
        $ad->link = $request->link;
        
        if ($request->image) {
            if( File::exists('images/ad/'.$ad->image) ){
                File::delete('images/ad/'.$ad->image);
            }
            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/ad/' . $img);
            Image::make($image)->save($location);
            $ad->image = $img;
        }
        $ad->save();

        //write success message
        $request->session()->flash('update', ' Advertisement updated Successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Ad $ad)
    {
        if( !is_null($ad) ){
            if( File::exists('images/ad/'.$ad->image) ){
                File::delete('images/ad/'.$ad->image);
            }
        }
        $ad->delete();
        //write success message
        $request->session()->flash('delete', ' Advertisement deleted Successfully');

        return back();
    }
}
