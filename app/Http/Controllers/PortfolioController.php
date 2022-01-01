<?php

namespace App\Http\Controllers;

use App\Models\portfolio;
use App\Models\types;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return view('dashboard.portfolio.index', ['data' => portfolio::all()->sortByDesc('id')]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.portfolio.add', ['types' => types::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'image' => 'required|image',
            'big_image' => 'required|image',
            'type_id' => 'required|exists:types,id'
        ]);

        $image = $request->file('image');
        $new_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);

        $big_image = $request->file('big_image');
        $big_new_name = md5(time() . rand()) . '.' . $big_image->getClientOriginalExtension();
        $big_image->move(public_path('images'), $big_new_name);

        portfolio::create($request->except(
            ['_token', 'image', 'big_image']) +
            ['image' => 'images/' . $new_name] +
            ['big_image' => 'images/' . $big_new_name]
        );

        return redirect(route('portfolio.index'))->with('message', 'data successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param portfolio $portfolio
     * @return Response
     */
    public function show(portfolio $portfolio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param portfolio $portfolio
     * @return Response
     */
    public function edit($id)
    {
        $portfolio = portfolio::find($id);
        return view('dashboard.portfolio.edit',
            ['id' => $id, 'type' => $portfolio, 'types' => types::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param portfolio $portfolio
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'type_id' => 'required|exists:types,id'
        ]);

        $portfolio = portfolio::find($id);
        $portfolio->title = $request->title;
        $portfolio->subtitle = $request->subtitle;
        $portfolio->type_id = $request->type_id;

        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'image'
            ]);
            $image = $request->file('image');
            $new_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $portfolio->image = 'images/' . $new_name;
        }
        if ($request->hasFile('big_image')) {
            $request->validate([
                'big_image' => 'image'
            ]);
            $image = $request->file('big_image');
            $new_name = md5(time() . rand()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $new_name);
            $portfolio->big_image = 'images/' . $new_name;
        }
        $portfolio->save();
        return redirect(route('portfolio.index'))->with('message', 'Edit data successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param portfolio $portfolio
     * @return Response
     */
    public function destroy($id)
    {
        portfolio::where('id', $id)->delete();
        return redirect(route('portfolio.index'))->with('message', 'Delete data successfully');
    }
}
