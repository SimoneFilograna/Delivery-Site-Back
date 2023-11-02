<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cuisine;
use App\Models\Restaurant;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

use Illuminate\Support\Facades\Storage;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $cuisines = Cuisine::all();
        $restaurants = Restaurant::all();

        return view('auth.register', compact('cuisines', 'restaurants'));
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $data=$request->validate([
            // 'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'name' => ['required', 'unique:restaurants,name', 'max:100'],
            'address' => ['required', 'max:255'],
            'vat_number' => ['required', 'unique:restaurants,vat_number', 'digits:11'],
            'image' => ['required','image'],
            'phone' => ['required', 'string', 'max:30'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($request->password),
        ]);
    
        $restaurant = Restaurant::create([
        'name' => $data['name'],
        'address' => $data['address'],
        'vat_number' => $data['vat_number'],
        'image' => $data['image'],
        'phone' => $data['phone'],
        'user_id'=> $user->id,
        
        ]);

        event(new Registered($user));

        Auth::login($user);
        

        if (key_exists("cuisines", $data)){
            $restaurant->cuisines()->attach($data['cuisines']);
        }

        return redirect(RouteServiceProvider::HOME);
    }
}