<?php

namespace App\Http\Controllers;

use App\Models\TasasImpuestos;
use Illuminate\Http\Request;

class TasasImpuestosController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasasimpuestos = TasasImpuestos::find(1);
        if(empty($tasasimpuestos)){
            $tasasimpuestos = TasasImpuestos::create([
                "desinfeccion" => 0,
                "canon" => 0,
                "inspeccion" => 0,
                "patentemunicipal" => 0,
                "patentecomercial" => 0
            ]);
        }
        return response()->json($tasasimpuestos);
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
     * @param  \App\Models\TasasImpuestos  $tasasImpuestos
     * @return \Illuminate\Http\Response
     */
    public function show(TasasImpuestos $tasasImpuestos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TasasImpuestos  $tasasImpuestos
     * @return \Illuminate\Http\Response
     */
    public function edit(TasasImpuestos $tasasImpuestos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TasasImpuestos  $tasasImpuestos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TasasImpuestos $tasasimpuesto)
    {
        $tasasimpuesto->fill($request->post())->save();
        return response()->json([
            'tasasimpuestos' => $tasasimpuesto
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TasasImpuestos  $tasasImpuestos
     * @return \Illuminate\Http\Response
     */
    public function destroy(TasasImpuestos $tasasImpuestos)
    {
        //
    }
}
