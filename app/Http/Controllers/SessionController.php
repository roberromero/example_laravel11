<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('login');
    }

    public function store(Request $request){

        $attributes = $request->validate([
            'email' => 'required|email|min:6',
            'password' => 'required|min:6',
        ]);

        if(! Auth::attempt($attributes)){
            throw ValidationException::withMessages([
                'email' => 'Credentials are not valid.'
            ]);
        };
        request()->session()->regenerate();
        //CHECK CONTROL THE RATE OF REQUESTS THAT MAY BE SENT TO THE SERVER
        return redirect('/')->with('success', 'Logged in successfully.');
    }

    public function destroy(){
        Auth::logout();
        return redirect('/');
    }
}
