<?php

namespace App\Http\Controllers;

use App\Models\CoefConsumo;
use Illuminate\Http\Request;

class CoefConsumoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = CoefConsumo::all();
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
        $registros = CoefConsumo::create($request->post());
        return response()->json([
            'coeficientes' => $registros
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoefConsumo  $coefConsumo
     * @return \Illuminate\Http\Response
     */
    public function show(CoefConsumo $coeficiente)
    {
        return response()->json($coeficiente);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoefConsumo  $coefConsumo
     * @return \Illuminate\Http\Response
     */
    public function edit(CoefConsumo $coefConsumo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoefConsumo  $coefConsumo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoefConsumo $coeficiente)
    {
        $coeficiente->fill($request->post())->save();
        return response()->json([
            'coeficientes' => $coeficiente
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoefConsumo  $coefConsumo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoefConsumo $coeficiente)
    {
        $coeficiente->delete();
        response()->json([
            'mensaje' => 'Registro eliminado exitosamente'
        ]);
    }
}
