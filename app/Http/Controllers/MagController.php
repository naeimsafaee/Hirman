<?php

namespace App\Http\Controllers;

use App\Models\Mag;
use Illuminate\Http\Request;

class MagController extends Controller
{
    public function index_blog()
    {
        $mags = Mag::query()->where('type','=','blog')->get();
        return view('mags.index',compact('mags'));
    }
    public function index_foreign()
    {
        $mags = Mag::query()->where('type','=','foreign')->get();
        return view('mags.index',compact('mags'));
    }
    public function index_internal()
    {
        $mags = Mag::query()->where('type','=','internal')->get();
        return view('mags.index',compact('mags'));
    }

    public function show_blog($slug)
    {
        $title = str_replace('-',' ',$slug);
        $mag = Mag::query()->where([['title','=',$title], ['type', '=', 'blog']])->firstOrFail();
        return view('mags.show',compact('mag'));
    }
    public function show_internal($slug)
    {
        $title = str_replace('-',' ',$slug);
        $mag = Mag::query()->where([['title','=',$title], ['type', '=', 'internal']])->firstOrFail();
        return view('mags.show',compact('mag'));
    }
    public function show_foreign($slug)
    {
        $title = str_replace('-',' ',$slug);
        $mag = Mag::query()->where([['title','=',$title], ['type', '=', 'foreign']])->firstOrFail();
        return view('mags.show',compact('mag'));
    }
}
