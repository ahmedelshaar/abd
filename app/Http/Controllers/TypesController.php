<?php

namespace App\Http\Controllers;

use App\Models\types;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard.type.index', ['data'=> types::all()->sortByDesc('id')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.type.add');
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
            'title' => 'required'
        ]);
        types::create(['name'=>$request->title]);
        return redirect(route('type.index'))->with('message', 'data successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param types $types
     * @return Response
     */
    public function show(types $types)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param types $types
     * @return Response
     */
    public function edit($id)
    {
        $type = types::find($id);
        return view('dashboard.type.edit', ['id' => $id, 'type' => $type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param types $types
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $type = types::find($id);
        $type->name = $request->title;
        $type->save();
        return redirect(route('type.index'))->with('message', 'Edit data successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param types $types
     * @return Response
     */
    public function destroy($id)
    {
        types::where('id', $id)->delete();
        return redirect(route('type.index'))->with('message', 'Delete data successfully');
    }
}
