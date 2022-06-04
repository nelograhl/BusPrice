<?php

namespace App\Http\Controllers;

use App\Models\TipoMantenimiento;
use Illuminate\Http\Request;

class TipoMantenimientoController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $registros = TipoMantenimiento::all();
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
        $registros = TipoMantenimiento::create($request->post());
        return response()->json([
            'tipomant' => $registros
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoMantenimiento  $tipoMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function show(TipoMantenimiento $registros)
    {
        return response()->json($registros);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoMantenimiento  $tipoMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoMantenimiento $tipoMantenimiento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoMantenimiento  $tipoMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoMantenimiento $registros)
    {
        $registros->fill($request->post())->save();
        return response()->json([
            'registros' => $registros
        ]);  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoMantenimiento  $tipoMantenimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoMantenimiento $registros)
    {
        $registros->delete();
        response()->json([
            'mensaje' => 'Registro eliminado exitosamente'
        ]);
    }
}
