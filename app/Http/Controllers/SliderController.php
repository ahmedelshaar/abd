<?php

namespace App\Http\Controllers;

use App\Models\slider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard.slider.index', ['data'=> slider::all()->sortByDesc('id')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.slider.add');
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
            'subtitle' => 'required',
            'button_title' => 'required',
            'button_link' => 'required',
            'description' => 'required',
            'big_image' => 'required|image'
        ]);
        $image = $request->file('big_image');
        $new_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        slider::create($request->except(['_token', 'big_image']) + ['background' => 'images/'.$new_name]);
        return redirect(route('slider.index'))->with('message', 'data successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param slider $slider
     * @return Response
     */
    public function show(slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param slider $slider
     * @return Response
     */
    public function edit($id)
    {
        $slider = slider::find($id);
        return view('dashboard.slider.edit', ['id' => $id, 'type' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param slider $slider
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'button_title' => 'required',
            'button_link' => 'required',
            'description' => 'required',
        ]);
        $slider = slider::find($id);
        $slider->title = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->button_title = $request->button_title;
        $slider->button_link = $request->button_link;
        $slider->description = $request->description;
        if ($request->hasFile('big_image')) {
            $request->validate([
                'big_image' => 'image'
            ]);
            $image = $request->file('big_image');
            $new_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $slider->background = 'images/' . $new_name;
        }
        $slider->save();
        return redirect(route('slider.index'))->with('message', 'Edit data successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param slider $slider
     * @return Response
     */
    public function destroy($id)
    {
        slider::where('id', $id)->delete();
        return redirect(route('slider.index'))->with('message', 'Delete data successfully');
    }
}
