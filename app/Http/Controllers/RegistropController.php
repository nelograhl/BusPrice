<?php

namespace App\Http\Controllers;

use App\Models\Registrop;
use Illuminate\Http\Request;

class RegistropController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $registros = Registrop::all();
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
        $registro = Registrop::create($request->post());
        return response()->json([
            'registrop' => $registro
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registrop  $registrop
     * @return \Illuminate\Http\Response
     */
    public function show(Registrop $registrop)
    {
        return response()->json($registrop);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registrop  $registrop
     * @return \Illuminate\Http\Response
     */
    public function edit(Registrop $registrop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Registrop  $registrop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Registrop $registrop)
    {
        $registrop->fill($request->post())->save();
        return response()->json([
            'registro' => $registrop
        ]); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registrop  $registrop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registrop $registrop)
    {
        $registrop->delete();
        response()->json([
            'mensaje' => 'Registro eliminado exitosamente'
        ]);
    }
}
