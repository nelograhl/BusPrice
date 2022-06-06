<?php

namespace App\Http\Controllers;

use App\Models\Costos;
use Illuminate\Http\Request;

class CostosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costos = Costos::find(1);
        if(empty($costos)){
            $costos = Costos::create([
                "combustible" => 0,
                "lubricantes" => 0,
                "neumaticos" => 0,
                "repuestos" => 0
            ]);
        }
        return response()->json($costos);
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
     * @param  \App\Models\Costos  $costos
     * @return \Illuminate\Http\Response
     */
    public function show(Costos $costos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Costos  $costos
     * @return \Illuminate\Http\Response
     */
    public function edit(Costos $costos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Costos  $costos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Costos $costo)
    {
        $costo->fill($request->post())->save();
        return response()->json([
            'costos' => $costo
        ]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Costos  $costos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Costos $costos)
    {
        //
    }
}
