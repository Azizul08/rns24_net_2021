<?php

namespace App\Http\Controllers\Backend\About;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\About\AboutInfo;
use App\Models\Backend\About\Team;

class AboutPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = AboutInfo::orderBy('id','desc')->get();
        $teams = Team::orderBy('id','desc')->get();
        return view('backend.pages.about.manage', compact('abouts','teams'));
    }

    
}
