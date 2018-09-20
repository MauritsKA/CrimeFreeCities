<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App;
use Session;
use App\Text;
use Auth;
use App\User;
use App\Statistic;

class Dashboardcontroller extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('setlocale');
    }

    public function index()
    {
        $user = Auth::user();
        return view('cms.dashboard', compact('user'));
    }

    public function texts()
    {    
     
        $texts = Text::with('publications','projects','practices','statistics')->get()->all();

        return response()->json(['success' => true, 'texts' => $texts]);
    }

      public function facts()
    {    
     
        $facts = Statistic::all();

        return response()->json(['success' => true, 'facts' => $facts]);
    }


    public function settings()
    {
        $user = Auth::user();
        
        return view('cms.settings', compact('user'));
    }

    public function email(Request $request)
    {
        $this->validate(request(), [
        'email' => 'required|string|email|max:255|unique:users',
        ]);
        
        if(User::where('email', request('email'))->first() == null){
        Auth::user()->update(['email'=>request('email')]);
        }
        
        return back()->with('status', 'Succesfully changed your email!');
    }
    
    public function password(Request $request)
    {
        $this->validate(request(), [
        'password' => 'required|string|min:6|confirmed',
        ]);
        
        if ($request->password == $request->password_confirmation){
        Auth::user()->update(['password'=> bcrypt($request->password)]);

        return back()->with('status', 'Succesfully changed your password!');
        } 
        
      return back()->with('alert', 'Something went wrong!');
    }


}
