<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Main;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\About;


class PagesController extends Controller
{
    function index(){
        $main = Main::first();
        $services = Service::all();
        $portfolios = Portfolio::all();
        $abouts = About::all();

        
      //  dd($main);

        return view('pages\index', compact('main', 'services', 'portfolios', 'abouts'));
    }
    function dashboard(){
        return view('pages\dashboard');
    }
}
