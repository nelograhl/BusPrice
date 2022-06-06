<?php

namespace App\Http\Controllers;

use App\Models\DatosOperacionales;
use Illuminate\Http\Request;

class DatosOperacionalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datosoperacionales = DatosOperacionales::find(1);
        if(empty($datosoperacionales)){
            $datosoperacionales = DatosOperacionales::create([
                "totalhabitantes" => 0,
                "totalpasajeros" => 0,
                "totalflota" => 0,
                "kilometrajediario" => 0,
                "rpd" => 0,
                "rpm" => 0,
                "ipk" => 0
            ]);
        }
        return response()->json($datosoperacionales);
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
     * @param  \App\Models\DatosOperacionales  $datosOperacionales
     * @return \Illuminate\Http\Response
     */
    public function show(DatosOperacionales $datosOperacionales)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DatosOperacionales  $datosOperacionales
     * @return \Illuminate\Http\Response
     */
    public function edit(DatosOperacionales $datosOperacionales)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DatosOperacionales  $datosOperacionales
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DatosOperacionales $datosoperacionale)
    {
        $datosoperacionale->fill($request->post())->save();
        return response()->json([
            'datosoperacionales' => $datosoperacionale
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DatosOperacionales  $datosOperacionales
     * @return \Illuminate\Http\Response
     */
    public function destroy(DatosOperacionales $datosOperacionales)
    {
        //
    }
}
