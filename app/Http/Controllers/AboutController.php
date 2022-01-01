<?php

namespace App\Http\Controllers;

use App\Models\about;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Collection;
use function PHPUnit\Framework\isEmpty;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard.about', ['data' => about::first()]);
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
            'title1' => 'required',
            'subtitle1' => 'required',
            'description1' => 'required',
            'title2' => 'required',
            'subtitle2' => 'required',
            'description2' => 'required',
            'title3' => 'required',
            'subtitle3' => 'required',
            'description3' => 'required',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $new_name = md5(time().rand()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
                about::where('id',1)->update($request->except(['_token', 'image']) + ['image' => 'images/'.$new_name]);
        }else{
            about::where('id',1)->update($request->except(['_token', 'image']));
        }

        return redirect()->back()->with('message', 'data successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param about $about
     * @return Response
     */
    public function show(about $about)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param about $about
     * @return Response
     */
    public function edit(about $about)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param about $about
     * @return Response
     */
    public function update(Request $request, about $about)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param about $about
     * @return Response
     */
    public function destroy(about $about)
    {
        //
    }
}
