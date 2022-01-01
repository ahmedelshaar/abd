<?php

namespace App\Http\Controllers;

use App\Models\offer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard.offer.index', ['data'=> offer::all()->sortByDesc('id')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.offer.add');
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
            'description' => 'required',
            'icon' => 'required|image'
        ]);
        $image = $request->file('icon');
        $new_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        offer::create($request->except(['_token', 'icon']) + ['icon' => 'images/'.$new_name]);
        return redirect(route('offer.index'))->with('message', 'data successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param offer $offer
     * @return Response
     */
    public function show(offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param offer $offer
     * @return Response
     */
    public function edit($id)
    {
        $offer = offer::find($id);
        return view('dashboard.offer.edit', ['id' => $id, 'type' => $offer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param offer $offer
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $offer = offer::find($id);
        $offer->title = $request->title;
        $offer->description = $request->description;
        if ($request->hasFile('icon')) {
            $request->validate([
                'icon' => 'image'
            ]);
            $image = $request->file('icon');
            $new_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $offer->icon = 'images/' . $new_name;
        }
        $offer->save();
        return redirect(route('offer.index'))->with('message', 'Edit data successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param offer $offer
     * @return Response
     */
    public function destroy($id)
    {
        offer::where('id', $id)->delete();
        return redirect(route('offer.index'))->with('message', 'Delete data successfully');
    }
}
