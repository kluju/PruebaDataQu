<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arriendo;
use Illuminate\Support\Facades\DB;

class ArriendoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salida = DB::select(DB::raw(
            "select arriendos.id,id_empresa,empresas.name as empresa,id_cliente,clientes.name as nombre,clientes.paterno, costo_diario, dias from arriendos inner join clientes on clientes.id = arriendos.id_cliente inner join empresas  on empresas.id = arriendos.id_empresa")
        );
       
        return $salida;
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arriendo = new Arriendo();
        $arriendo->id_cliente = $request->id_cliente;
        $arriendo->id_empresa = $request->id_empresa;
        $arriendo->costo_diario = $request->costo_diario;
        $arriendo->dias = $request->dias;
        $arriendo->save();
        
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
    public function update(Request $request)
    {
        $arriendo = Arriendo::findOrFail($request->id);
        $arriendo->id_cliente = $request->id_cliente;
        $arriendo->id_empresa = $request->id_empresa;
        $arriendo->costo_diario = $request->costo_diario;
        $arriendo->dias = $request->dias;
        $arriendo->save();
        return $arriendo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $arriendo = Arriendo::destroy($request->id);
        return $arriendo;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function arriendoPorMes()
    {
        $arriendos = DB::table('arriendos')->get();//->where('estado', 0)->pluck('id_proceso')->first();
        $arriendosMax = DB::select(DB::raw(
            "select id_cliente,  sum(costo_diario * dias) suma from arriendos group by id_cliente order by suma desc limit 1")
        );
        $arriendosMin = DB::select(DB::raw(
            "select id_cliente,  sum(costo_diario * dias) suma from arriendos group by id_cliente order by suma asc limit 1")
        );
        $salida["cli_mayor_monto"] = $arriendosMax; 
        $salida["cli_menor_monto"] = $arriendosMin; 
        return $salida;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function arriendoMayorMonto()
    {
        $arriendos = DB::table('arriendos')->get();//->where('estado', 0)->pluck('id_proceso')->first();
        $salida = DB::select(DB::raw(
            "select id_cliente,clientes.name as nombre, sum(costo_diario * dias) suma from arriendos inner join clientes on clientes.id = arriendos.id_cliente group by id_cliente,clientes.name order by suma desc limit 1")
        );
       
        return $salida;
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function arriendoMenorMonto()
    {
        $arriendos = DB::table('arriendos')->get();//->where('estado', 0)->pluck('id_proceso')->first();
        $salida = DB::select(DB::raw(
            "select id_cliente,clientes.name as nombre, sum(costo_diario * dias) suma from arriendos inner join clientes on clientes.id = arriendos.id_cliente group by id_cliente,clientes.name order by suma asc limit 1")
        );
        
        
        return $salida;
    }


}
