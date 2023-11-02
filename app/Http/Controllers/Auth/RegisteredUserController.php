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

        return view('auth.register', compact('cuisines'));
    }


    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
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
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // $data = [
        //     'name' => $request->input('restaurant_name'),
        //     'address' => $request->input('address'),
        //     'image' => $request->input('image'),
        //     'vat_number' => $request->input('vat_number'),
        //     'phone' => $request->input('phone'),

        // ];
        // if ($request->hasFile('image')) {
        //     $image = $request->file('image');
        //     $cover_path = Storage::put('uploads', $image);
        //     $data['cover_image'] = $cover_path;
        // }
        
        $restaurant = Restaurant::create([
        'name' => $request->restaurant_name,
        'address' => $request->address,
        'vat_number' => $request->vat_number,
        'image' => $request->image,
        'phone' => $request['phone'],
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}