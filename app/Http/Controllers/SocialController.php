<?php

namespace App\Http\Controllers;

use App\Models\social;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard.social.index', ['data'=> social::all()->sortByDesc('id')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.social.add');
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
            'link' => 'required',
            'icon' => 'required'
        ]);
        social::create($request->except(['_token']));
        return redirect(route('social.index'))->with('message', 'data successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param social $social
     * @return Response
     */
    public function show(social $social)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param social $social
     * @return Response
     */
    public function edit($id)
    {
        $social = social::find($id);
        return view('dashboard.social.edit', ['id' => $id, 'type' => $social]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param social $social
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'link' => 'required',
            'icon' => 'required'
        ]);
        $social = social::find($id);
        $social->link = $request->link;
        $social->icon = $request->icon;
        $social->save();
        return redirect(route('social.index'))->with('message', 'Edit data successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param social $social
     * @return Response
     */
    public function destroy($id)
    {
        social::where('id', $id)->delete();
        return redirect(route('social.index'))->with('message', 'Delete data successfully');
    }
}
