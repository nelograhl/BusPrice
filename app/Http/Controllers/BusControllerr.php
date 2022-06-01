<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;

class BusController extends Controller
{
    public function index(){
        $buses = Bus::all();
        return response()->json($buses);
    }
    public function store(Request $request){
        
    }
    public function show(Bus  $bus){
        return response()->json($bus);
    }

    public function update(Request $request, Bus  $bus){
        $bus->fill($request->bus)->save();
        return response()->json([
            'bus' => $bus
        ]);  
    }

    public function destroy(Bus $bus){
        $bus->delete();
        response()->json([
            'mensaje' => 'Registro eliminado exitosamente'
        ]);
    }
}
