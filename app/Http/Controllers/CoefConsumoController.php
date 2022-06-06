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
        $registros = CoefConsumo::find(1);
        if(empty($registros)){
            $registros = CoefConsumo::create([
                "combustible" => 0,
                "lubricante" => 0,
                "neumaticos" => 0,
                "repuestos" => 0,
                "depreciacionvehiculo" => 0
            ]);
        }
        return response()->json($registros);
        #$registros = CoefConsumo::all();
        #return response()->json($registros);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoefConsumo  $coefConsumo
     * @return \Illuminate\Http\Response
     */
    public function show(CoefConsumo $coeficiente)
    {
        //
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
            'coeficiente' => $coeficiente
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
        //
    }
}
