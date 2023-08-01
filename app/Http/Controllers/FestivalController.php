<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Festival;

class FestivalController extends Controller
{
    public function index_news()
    {
        $festivals = Festival::query()->where('type','=','news')->get();
        return view('festivals.index',compact('festivals'));
    }

    public function index_playtime()
    {
        $festivals = Festival::query()->where('type','=','playtime')->get();
        return view('festivals.index',compact('festivals'));
    }

    public function show_news($slug)
    {
        $title = str_replace('-',' ',$slug);
        $festival = Festival::query()->where([['title','=',$title], ['type', '=', 'news']])->firstOrFail();
        return view('festivals.show',compact('festival'));
    }
    public function show_playtime($slug)
    {
        $title = str_replace('-',' ',$slug);
        $festival = Festival::query()->where([['title','=',$title], ['type', '=', 'playtime']])->firstOrFail();;
        return view('festivals.show',compact('festival'));
    }

    public function index_winner()
    {
        $winners = Movie::query()->where('festival_winner','=',1)->get();
        return view('festivals.winners_index',compact('winners'));
    }

    public function show_winner($slug)
    {
        $title = str_replace('-',' ',$slug);
        $winner = Movie::query()->where('title','=',$title)->firstOrFail();
        $writers = Movie::query()->find($winner->id)->writers;
        $actors = Movie::query()->find($winner->id)->actors;
        $producers = Movie::query()->find($winner->id)->producers;
        $directors = Movie::query()->find($winner->id)->directors;
        return view('festivals.winners_show',compact('winner','writers','actors','producers','directors'));
    }

}
