<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\About\AboutInfo;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class AboutInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
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
    public function edit(AboutInfo $about)
    {
        return view('backend.pages.about.editaboutinfo', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AboutInfo $about)
    {
        $request->validate([
            'info'=> 'required',
        ]);
        $about->info = $request->info;
        if( $request->image ){
            $image = $request->file('image');
            $img = rand(0,100) .'_.'. $image->getClientOriginalExtension();
            $location = public_path('images/about/'.$img);
            Image::make($image)->save($location);
            $about->image = $img;
        }
        $about->save();
        //success message
        $request->session()->flash('update','About information updated successfully');
        return redirect()->route('about.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
