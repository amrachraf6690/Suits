<?php

namespace App\Http\Controllers;

use App\Http\Requests\{Login,SuitRequest};
use App\Models\{Suit,Image, Reservation};
use Illuminate\Support\Str;

class ManageController extends Controller
{
    //Login view
    public function __construct()
    {
       return $this->middleware('auth')->except(['auth','login']);
    }

    //Login check
    public function login()
    {
        return view('manage.login');
    }

    public function auth(Login $request)
    {
        if(auth()->attempt(['username'=>$request->username,'password'=>$request->password]))
        {
           return redirect()->route('manage.home')->with('message','Welcome back, '. auth()->user()->name . '!');
        }
        return back()->withErrors(['error'=>'Wrong Email/Password'])->withInput();
    }

    //home dashboard
    public function home()
    {
        $count['suits'] = Suit::count();
        $count['reservations'] = Reservation::count();
        $count['booked_reservations'] = Reservation::where('taken',1)->count();
        $count['unbooked_reservations'] = Reservation::where('taken',0)->count();
        return view('manage.home', compact('count'));
    }

    //view suits
    public function suits()
    {
        $suits = Suit::paginate(10);
        return view('manage.suit.suits',compact('suits'));
    }

    //add suit
    public function add_suit()
    {
        return view('manage.suit.add');
    }

    //store suit
    public function store_suit(SuitRequest $request){
        $request['slug'] = Str::slug($request['title'],'_');
        $suit = Suit::create($request->toArray());


        for ($i=1; $i <= 3; $i++) { 
                Image::create([
                    'image'=>$request->file('image'.$i)->store('suits','public'),
                    'suit_id'=> $suit->id
                ]);
            }

        return redirect()->route('manage.home')->with('message','Suit "' . $suit->title . '" added successfully.');
            
    }

   
    //edit suits
    public function edit_suit($slug){
        $suit = Suit::where('slug',$slug)->firstorFail();
        return view('manage.suit.edit',compact('suit'));
    }

    //update suit
    public function update_suit(){
        Suit::where('id', request()->id)->update([
            'title' => request()->title,
            'slug' => Str::slug(request()->title,'_'),
            'discription' => request()->discription,
            'price' => request()->price,
            'color' => request()->color,
        ]);
        return redirect()->route('manage.home')->with('message','Suit "' . request()->title . '" updated successfully.');
    }

    //delete suit
    public function delete_suit(){
        Suit::destroy(request()->id);
        return redirect()->route('manage.home')->with('message','Suit "' . request()->title . '" Deleted successfully.');
    }

    //view reservations
    public function reservations()
    {
        $reservations = Reservation::paginate(10);
        return view('manage.reservations.home',compact('reservations'));
    }

    //reservation check
    public function reservation_check()
    {
        return view('manage.reservations.check');
    }

    //validate secret code of reservations
    public function reservation_validate()
    {
        request()->validate([
            'secret_code'=>'required|regex:/^[0-9A-Z]{2}-[0-9A-Z]{2}-[0-9A-Z]{2}$/'
        ]);
        $reservation = Reservation::where('secret_code', request()->input('secret_code'))->with('suit')->first();
        return view('manage.reservations.result',compact('reservation'));

    }

    //book reservation
    public function reservation_book($secret_code)
    {
        $reservation = Reservation::where('secret_code', $secret_code)->update([
            'taken' => true,
        ]);

        return redirect()->route('manage.home')->with('message','Suit Reserved Successfully.');
    }

    //logout
    public function logout()
    {
        auth()->logout();
        return redirect()->route('manage.login')->withErrors(['error'=>'You have been logged out']);
    }
}
