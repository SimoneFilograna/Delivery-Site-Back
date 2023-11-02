<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlateRequest;
use App\Models\Plate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $restaurant = Auth::user()->restaurant->id;
        $plates = Plate::where("restaurant_id", $restaurant)->get();
        return view('admin.plates.index', ['plates' => $plates]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {
        return view('admin.plates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlateRequest $request) {
        $data = $request->validated();

        $data['image'] = Storage::put("plates", $data["image"]);
        $data['restaurant_id'] = Auth::user()->restaurant->id;
        $plates = Plate::create($data); //fill e save
        return redirect()->route('admin.plates.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
