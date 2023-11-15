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
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'restaurant_name' => ['required', 'unique:restaurants,restaurant_name', 'max:100'],
            'restaurant_address' => ['required', 'max:255'],
            'vat_number' => ['required', 'unique:restaurants,vat_number', 'digits:11'],
            'restaurant_image' => ['required','image'],
            'restaurant_phone' => ['required', 'string', 'max:30'],
            'cuisines'=> ['array'],
        ]);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($request->password),
        ]);
    
        $restaurantIMGPath = Storage::put("restaurants", $data['restaurant_image']);
        $data['restaurant_image'] = $restaurantIMGPath;

        $restaurant = Restaurant::create([
        'restaurant_name' => $data['restaurant_name'],
        'restaurant_address' => $data['restaurant_address'],
        'vat_number' => $data['vat_number'],
        'restaurant_image' => $data['restaurant_image'],
        'restaurant_phone' => $data['restaurant_phone'],
        'user_id'=> $user->id,
        
        ]);

        event(new Registered($user));

        Auth::login($user);
        
        
        if (key_exists("cuisines", $data)){
            $restaurant->cuisines()->attach($data['cuisines']);
        }

        return redirect()->route("admin.plates.create");
    }
}