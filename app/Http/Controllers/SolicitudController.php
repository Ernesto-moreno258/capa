<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Solicitud::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'CURP' => 'required|min:16',
            'FechaRegistro' => 'nullable|date',
            'FechaPago' => 'nullable|date',
            'Referencia' => 'required',
            'EstatusPago' => 'required'
        ]);
        $solicitud = new Solicitud;

        $solicitud->CURP = $request->CURP;
        $solicitud->FechaRegistro = $request->FechaRegistro;
        $solicitud->FechaPago = $request->FechaPago;
        $solicitud->Referencia = $request->Referencia;
        $solicitud->EstatusPago = $request->EstatusPago;

        $solicitud->save();

        return $solicitud;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $solicitud = Solicitud::find($id);
        $solicitud ->fill($request->all());
        $solicitud->save();

        return Solicitud::all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $solicitud = Solicitud::find($id);
        $solicitud->delete();

        solicitud::destroy($id);
        return Solicitud::all();
    }
}
