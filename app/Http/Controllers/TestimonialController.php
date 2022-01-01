<?php

namespace App\Http\Controllers;

use App\Models\testimonial;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard.testimonial.index', ['data'=> testimonial::all()->sortByDesc('id')]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.testimonial.add');
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
            'image' => 'required|image'
        ]);
        $image = $request->file('image');
        $new_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        testimonial::create($request->except(
            ['_token', 'image', 'title']) +
            ['image' => 'images/'.$new_name, 'name' => $request->title]
        );
        return redirect(route('testimonial.index'))->with('message', 'data successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param testimonial $testimonial
     * @return Response
     */
    public function show(testimonial $testimonial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param testimonial $testimonial
     * @return Response
     */
    public function edit($id)
    {
        $testimonial = testimonial::find($id);
        return view('dashboard.testimonial.edit', ['id' => $id, 'type' => $testimonial]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param testimonial $testimonial
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);
        $testimonial = testimonial::find($id);
        $testimonial->name = $request->title;
        $testimonial->description = $request->description;
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image'
            ]);
            $image = $request->file('image');
            $new_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $testimonial->image = 'images/' . $new_name;
        }
        $testimonial->save();
        return redirect(route('testimonial.index'))->with('message', 'Edit data successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param testimonial $testimonial
     * @return Response
     */
    public function destroy($id)
    {
        testimonial::where('id', $id)->delete();
        return redirect(route('testimonial.index'))->with('message', 'Delete data successfully');
    }
}
