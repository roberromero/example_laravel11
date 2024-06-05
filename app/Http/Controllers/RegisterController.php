<?php
namespace App\Http\Controllers;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function create(){
        return view('register');
    }
    public function store(Request $request){
        $attributes = $request->validate([
            'name' => 'required|min:3|max:255',
            'surname' => 'min:3|max:255',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Password::min(6)->letters()->numbers()->mixedCase()],
            //'password_confirmation' => 'required|min:6|same:password' NO NEEDED because laravel
            //searches for password_confirmation input
        ]);
        //check if email exists
        $existingUser = User::where('email', $request->email)->exists();
        if ($existingUser) {
            return back()->withErrors(['email' => 'The provided email already exists.']);
        }
        // Create a new user record in the database
        // $user = User::create([
        //     'name' => $request->name,
        //     'surname' => $request->surname,
        //     'email' => $request->email,
        //     'password' => $hashedPassword,
        // ]);
        $user = User::create($attributes);
         // Log the user in
        Auth::login($user);
        // Return a response, such as redirecting to a success page
        return redirect('/')->with('success', 'User registered successfully.');

    }
}
