<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePlateRequest;
use App\Models\Plate;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PlateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $restaurant = Auth::user()->restaurant->id; //prendiamo id restaurant
        $plates = Plate::where("restaurant_id", $restaurant)->get(); //colleghiamo ai piatti
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

        $data['plate_image'] = Storage::put("plates", $data["plate_image"]); //immagini nello storage
        $data['restaurant_id'] = Auth::user()->restaurant->id; //id restaurant
        $plate = Plate::create($data); //fill e save
        return redirect()->route('admin.plates.index');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $plate = Plate::where("id", $id)->firstOrFail(); //id del piatto
        if (Auth::user()->restaurant->id == $plate->restaurant_id) { //se sei loggato con ristorante corretto allora puoi editare
            return view('admin.plates.edit', ['plate' => $plate]); 
        } else {
            return abort(404); //se non sei loggato con ristorante corretto -> 404
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePlateRequest $request, int $id)
    {
        $plate = Plate::where("id", $id)->firstOrFail(); //id del piatto
        $data = $request->validated();

        if (isset($data["plate_image"])) {
            if ($plate->plate_image) {
                Storage::delete($plate->plate_image); //cancello dallo storage l'immagine che c'era prima della modifica
            }
            //salvo file nel sistema
            $image_percorso = Storage::put("plates", $data["plate_image"]);
            $data['plate_image'] = $image_percorso;
        }
        $plate -> update($data);// fill + save

        return redirect()->route('admin.plates.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $plate = Plate::where("id", $id)->firstOrFail();

        if ($plate->plate_image) {
            Storage::delete($plate->plate_image); //cancello dallo storage l'immagine
        }
        $plate->delete();
        
        return redirect()->route('admin.plates.index');
    }
}
