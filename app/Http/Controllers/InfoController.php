<?php

namespace App\Http\Controllers;

use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard.information', ['data' => Info::first()]);
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
            'site_title' => 'required',
            'site_description' => 'required',
            'info_title' => 'required',
            'info_description' => 'required',
            'info_experience' => 'required|integer',
            'info_client' => 'required|integer',
            'service_title' => 'required',
            'service_description' => 'required',
            'service_button_text' => 'required',
            'service_button_link' => 'required',
            'contact_description' => 'required',
            'contact_map' => 'required',
        ]);

        $files = [];
        if ($request->hasFile('info_image')) {
            $request->validate([
                'info_image' => 'required|image',
            ]);
            $image = $request->file('info_image');
            $new_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $files += ['info_image' => 'images/' . $new_name];
        }
        if ($request->hasFile('info_resume')) {
            $request->validate([
                'info_resume' => 'required|file',
            ]);
            $image = $request->file('info_resume');
            $new_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $files += ['info_resume' => 'images/' . $new_name];
        }
        if ($request->hasFile('contact_image')) {
            $request->validate([
                'contact_image' => 'required|image',
            ]);
            $image = $request->file('contact_image');
            $new_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $files += ['contact_image' => 'images/' . $new_name];
        }
        if ($request->hasFile('site_logo')) {
            $request->validate([
                'site_logo' => 'required|image',
            ]);
            $image = $request->file('site_logo');
            $new_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $files += ['site_logo' => 'images/' . $new_name];
        }
        if ($request->hasFile('service_background')) {
            $request->validate([
                'service_background' => 'required|image',
            ]);
            $image = $request->file('service_background');
            $new_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $files += ['service_background' => 'images/' . $new_name];
        }
        Info::where('id', 1)->update($request->except(['_token', 'info_image', 'info_resume', 'contact_image','site_logo','service_background']) + $files);

        return redirect()->back()->with('message', 'data successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param Info $info
     * @return Response
     */
    public function show(Info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Info $info
     * @return Response
     */
    public function edit(Info $info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Info $info
     * @return Response
     */
    public function update(Request $request, Info $info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Info $info
     * @return Response
     */
    public function destroy(Info $info)
    {
        //
    }
}
