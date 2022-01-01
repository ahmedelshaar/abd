<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard.contact.index', ['data' => contact::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'message' => 'required',
        ]);
        contact::create($request->except(['_token', 'title'] + ['name'=> $request->title]));
        return redirect(route('contact.index'))->with('message', 'data successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param contact $contact
     * @return Response
     */
    public function show(contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param contact $contact
     * @return Response
     */
    public function edit(contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param contact $contact
     * @return Response
     */
    public function update(Request $request, contact $contact)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param contact $contact
     * @return Response
     */
    public function destroy($id)
    {
        contact::where('id', $id)->delete();
        return redirect(route('contact.index'))->with('message', 'Delete data successfully');
    }
}
