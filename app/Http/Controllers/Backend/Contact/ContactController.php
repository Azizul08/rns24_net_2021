<?php

namespace App\Http\Controllers\Backend\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Contact\Contact;
use App\Newsletter;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::orderBy('id','asc')->get();
        return view('backend.pages.contact.manage', compact('contacts'));
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
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);
        $contact->address = $request->address;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->f_link = $request->f_link;
        $contact->save();

        //successs message
        $request->session()->flash('update','Contact information updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function newsletterStore(Request $request)
    {
        $request->validate([
            'email' => 'required'
        ]);
        $newsletter = new Newsletter();

        $newsletter->email = $request->email;
        $newsletter->save();
        return response()->json($newsletter, 200);
    }
    
    public function emailShow(){
        $emails = Newsletter::orderBy('id','desc')->get();
        return view('backend.pages.email.manage', compact('emails'));
    }
    public function emailDelete(Request $request, Newsletter $email){
        if( !is_null($email) ){
            $email->delete();
            $request->session()->flash('delete','Email deleted successfully');
            return back();
        }
    }
    
}
