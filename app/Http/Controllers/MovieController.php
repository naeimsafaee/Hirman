<?php

namespace App\Http\Controllers;

use App\Models\Celeb;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index()
    {
        $movies = Movie::all();
        return view('movies.index',compact('movies'));
    }

    public function show($slug)
    {
        //$art = Art::with('celebs')->find($id);
        // $movies = Art::with('mac')->find(1);
        // return $movies;
        //  $celebs = ArtCeleb::query()->where('art_id','=',$art->id);
       // $celeb = Movie::find($movie->id)->celebs;
       // return $celeb;

        //$celebs = Movie::query()->find($movie->id)->celebs;

      //  return $celebs;
        //
      //  return $c;
        //$celebs = Art::query()->find(1)->celebs;
      //  return $celebs;
        //return $art->with('celebs')->celebs->get();
        // return $art;
        $title = str_replace('-',' ', $slug);
        $movie = Movie::query()->where('title','=',$title)->firstOrFail();
        $writers = Movie::query()->find($movie->id)->writers;
        $actors = Movie::query()->find($movie->id)->actors;
        $producers = Movie::query()->find($movie->id)->producers;
        $directors = Movie::query()->find($movie->id)->directors;
      //  return $directors;
        return view('movies.show',compact('movie','writers','actors','producers','directors'));
    }
}
