<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\PageTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        $pagemeta =  PageTag::where('page_name', Route::current()->getName())->first();


        return view('frontend.home', compact('pagemeta'));
    }
    public function aboutUs()
    {
        $pagemeta =  PageTag::where('page_name', Route::current()->getName())->first();

        return view('frontend.aboutUs', compact('pagemeta'));
    }

    public function contact()
    {
        $pagemeta =  PageTag::where('page_name', Route::current()->getName())->first();
        return view('frontend.contact', compact('pagemeta'));
    }

    public function termsConditions()
    {
        $pagemeta =  PageTag::where('page_name', Route::current()->getName())->first();
        return view('frontend.termsConditions', compact('pagemeta'));
    }
    public function privacyPolicy()
    {
        // dd(Route::current()->getName());
        $pagemeta =  PageTag::where('page_name', Route::current()->getName())->first();
        return view('frontend.privacyPolicy', compact('pagemeta'));
    }

    public function thankYou()
    {
        $pagemeta =  PageTag::where('page_name', Route::current()->getName())->first();
        return view('frontend.thankYou', compact('pagemeta'));
    }
}
