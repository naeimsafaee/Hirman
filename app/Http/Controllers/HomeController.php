<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Home;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;

class HomeController extends Controller{

    public function index()
    {
        $homes = Home::query()->with('movie')->orderBy('created_at', 'DESC')->take(12)->get();
        if ($homes->isNotEmpty()) {
            if (count($homes) < 12 ) {
                $index = 12 - count($homes);
                for ($i = 0; $i < $index; $i++){
                    $newElement = clone $homes[$i];
                    $newElement->id = 12 + $i;
                    $homes->push($newElement);
                }
            }
        }
        return view('pages.home', compact('homes'));
    }

    public function contact(){
        return view('pages.contact_us');
    }

    public function contact_store(ContactRequest $request){
        $contact = new Contact();
        $contact->full_name = $request->fullName;
        $contact->phone_number = $request->phoneNumber;
        $contact->explain = $request->explain;
        $result = $contact->save();
        if($result){
            return back()->with('success', 'درخواست شما با موفقیت ثبت شد.');
        } else {
            return back()->with('fail', 'درخواست شما ثبت نگردید، کمی دیگر تلاش کنید.');
        }
    }

    public function about(){
        return view('pages.about_us');
    }
}
