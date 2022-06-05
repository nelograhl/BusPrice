<?php

namespace App\Http\Controllers;

use App\Models\Tramo;
use Illuminate\Http\Request;

class TramoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Tramo::where("estado","Activo")->get();
        return response()->json($registros);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $registros = Tramo::create($request->post());
        return response()->json([
            'tramo' => $registros
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tramo  $tramo
     * @return \Illuminate\Http\Response
     */
    public function show(Tramo $tramo)
    {
        return response()->json($tramo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tramo  $tramo
     * @return \Illuminate\Http\Response
     */
    public function edit(Tramo $tramo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tramo  $tramo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tramo $tramo)
    {
        $tramo->fill($request->post())->save();
        return response()->json([
            'tramo' => $tramo
        ]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tramo  $tramo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tramo $tramo)
    {
        $tramo->estado = "Eliminado";
        $tramo->save();
        response()->json([
            'mensaje' => 'Registro eliminado exitosamente'
        ]);
    }
}
