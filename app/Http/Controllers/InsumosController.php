<?php

namespace App\Http\Controllers;

use App\Models\Insumos;
use Illuminate\Http\Request;

class InsumosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $insumos = Insumos::find(1);
        if(empty($insumos)){
            $insumos = Insumos::create([
                "dolar" => 0,
                "combustible" => 0,
                "neumaticos" => 0,
                "cubiertas" => 0,
                "camaras" => 0,
                "protectores" => 0,
                "vidautil" => 0,
                "recapado" => 0,
                "norecap" => 0,
                "chasis" => 0,
                "carroceria" => 0,
                "salariochofer" => 0,
                "salariofiscal" => 0,
                "salariojefe" => 0,
                "segurop" => 0,
                "segurov" => 0
            ]);
        }
        return response()->json($insumos);
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
     * @param  \App\Models\Insumos  $insumos
     * @return \Illuminate\Http\Response
     */
    public function show(Insumos $insumos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Insumos  $insumos
     * @return \Illuminate\Http\Response
     */
    public function edit(Insumos $insumos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Insumos  $insumos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insumos $insumo)
    {
        $insumo->fill($request->post())->save();
        return response()->json([
            'insumos' => $insumo
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Insumos  $insumos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insumos $insumos)
    {
        //
    }
}
