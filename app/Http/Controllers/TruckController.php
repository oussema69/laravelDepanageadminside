<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\CarController;
use App\Models\Car;
use App\Models\CamionRemourquage;


class TruckController extends Controller
{
    public function index(Car $car)
    {
        $trucks = $car->camionRemourquage()->get();
        return view('trucks.index', [
            'car' => $car,
            'trucks' => $trucks
        ]);
    }
    public function show(CamionRemourquage $truck)
{
    return view('trucks.show', [
        'truck' => $truck
    ]);
}
public function edit(CamionRemourquage $truck)
{
    return view('trucks.edit', compact('truck'));
}
public function update(Request $request, CamionRemourquage $truck)
{
    $validatedData = $request->validate([
        'matricule' => 'required',
        'model' => 'required',
        'etat' => 'required',
    ]);

    $truck->matricule = $validatedData['matricule'];
    $truck->model = $validatedData['model'];
    $truck->etat = $validatedData['etat'];
    $truck->save();

    return redirect()->back()->with('message', 'IT WORKS!');

}
 
    
    

}
