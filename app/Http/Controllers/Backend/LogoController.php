<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Logo;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logo::orderBy('id','asc')->get();
        return view('backend.pages.logo.logo', compact('logos'));
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
        $logos = logo::orderBy('id', 'asc')->get();

        if (count($logos) == NULL) {
            $request->validate(
                [
                    'image' => 'required'
                ]
            );

            $logo = new Logo();

            if ($request->image) {
                $image  = $request->file('image');
                $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
                $location = public_path('images/logo/' . $img);
                Image::make($image)->save($location);
                $logo->image = $img;
            }
            $logo->save();

            //write success message
            $request->session()->flash('message', ' Logo added Successfully');

            return back();
        } else {
            //write unsuccess message
            $request->session()->flash('createFailed', 'Logo already added');

            return back();
        }
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
    public function update(Request $request, Logo $logo)
    {

        if ($request->image) {
            if (File::exists('images/logo/' . $logo->image)) {
                File::delete('images/logo/' . $logo->image);
            }
            $image  = $request->file('image');
            $img    = rand(0, 100) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/logo/' . $img);
            Image::make($image)->save($location);
            $logo->image = $img;
        }
        $logo->save();

        //write success message
        $request->session()->flash('update', ' Logo updated Successfully');

        return redirect()->route('logo.show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Logo $logo)
    {
        if( !is_null($logo) ){
            if (File::exists('images/logo/' . $logo->image)) {
                File::delete('images/logo/' . $logo->image);
            }
            $logo->delete();
        }
        //write success message
        $request->session()->flash('delete', ' Logo deleted Successfully');

        return redirect()->route('logo.show');
    }
}
