<?php

namespace App\Http\Controllers;
use Twilio\Rest\Client;
use App\Models\{Reservation,Suit};
use Barryvdh\DomPDF\Facade\Pdf;
use Nette\Utils\Random;


class SuitsController extends Controller
{

    public function home(){
        $latest = Suit::latest()->with('images')->take(5)->get();
        return view('home',compact('latest'));
    }

    public function suits(){
        $count = Suit::all()->count();
        $suits = Suit::with('images')->paginate(6);
        return view('suits',compact('suits','count'));
    }
    public function suit($slug){
        $suit = Suit::where('slug',$slug)->with('images')->firstorfail();
        return view('suit',compact('suit'));
    }

    public function reserve($slug){
        $suit = Suit::where('slug', $slug)->firstorFail();
        return view('reserve',['suit'=>$suit]);
    }

    public function reserveation(){

        //create secret code
        $secret_code = Random::generate(2,'0-9A-Z').'-'.Random::generate(2,'0-9A-Z').'-'.Random::generate(2,'A-Z');

        //save reservation
        $reservation = Reservation::create([
            'day'=>today(),
            'duration'=>request()->duration,
            'secret_code'=>$secret_code,
            'name'=>request()->name,
            'phone'=>request()->phone,
            'suit_id'=> request()->suit_id,
            'email'=>request()->email,
            'taken'=>0,
        ]);
        
        //get suit data
        $suit = Suit::where('id',request()->suit_id)->firstorFail();

        //create pdf invoice
        $pdf = Pdf::loadView('pdf.reserve',['reservation'=>$reservation]);
        $pdf->download('reservation.pdf');

        //send message to customer
        $twilio = new Client(env('Twilio_Account_SID'), env('Twilio_Auth_Token'));

        $message = $twilio->messages
        ->create('+2'.request()->phone, // to
            array(
            "from" => env('Twilio_Number'),
            "body" => "Thanks, ".request()->name." . Your code is: ".$secret_code.". Estimated price to be paid: ".$suit->price*request()->duration."LE. Please visit us to get your suit"
            )
        );

        //send message to admin
        $twilio = new Client(env('Twilio_Account_SID'), env('Twilio_Auth_Token'));

        $message = $twilio->messages
        ->create('+201063153994', // to
            array(
            "from" => env('Twilio_Number'),
            "body" => "There is a new reservation from: ".request()->name."( ".request()->phone.
            " ) For ".request()->duration." Days. For suit:  " . $suit->title
            )
        );


        // //redirect to success page
        return redirect()->route('home.success')->with('reservation', $reservation);

    }

    public function success(){
        return view('success');
    }

    public function invoice($secret_code){
        
        $reservation = Reservation::where('secret_code',$secret_code)->firstorFail();
        $pdf = Pdf::loadView('pdf.reserve',['reservation'=>$reservation]);
        return $pdf->download('reservation.pdf');
    }
}
