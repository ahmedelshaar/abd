<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\contact;
use App\Models\Info;
use App\Models\offer;
use App\Models\portfolio;
use App\Models\social;
use App\Models\slider;
use App\Models\testimonial;
use App\Models\types;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('front.index', [
            'info' => Info::first(),
            'socials' => social::all(),
            'sliders' => slider::all(),
            'offers' => offer::all(),
            'portfolios' => portfolio::all(),
            'testimonials' => testimonial::all(),
        ]);
    }
    public function portfolios(){
        return view('front.portfolios', [
            'info' => Info::first(),
            'socials' => social::all(),
            'portfolios' => portfolio::all(),
            'types' => types::all(),
        ]);
    }
    public function portfolio($id){
        return view('front.portfolio', [
            'info' => Info::first(),
            'socials' => social::all(),
            'portfolio' => portfolio::find($id),
        ]);
    }
    public function about(){
        return view('front.about', [
            'info' => Info::first(),
            'socials' => social::all(),
            'about' => about::first(),
            'offers' => offer::all(),
        ]);
    }
    public function contact(){
        return view('front.contact', [
            'info' => Info::first(),
            'socials' => social::all(),
        ]);
    }
    public function message(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile' => 'required|integer',
            'message' => 'required',
        ]);

        contact::create($request->except(['_token']));
    }
}
