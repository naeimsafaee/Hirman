<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('services.index',compact('services'));
    }

    public function show($slug)
    {
        $title = str_replace('-',' ',$slug);
        $service = Service::query()->where('title','=',$title)->firstOrFail();
        return view('services.show',compact('service'));
    }
}
