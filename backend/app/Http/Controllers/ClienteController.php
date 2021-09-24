<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\DB;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = Cliente::all();
        return $clientes;
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cliente = new Cliente();
        $cliente->rut = $request->rut;
        $cliente->name = $request->name;
        $cliente->save();
        
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
        $cliente = Cliente::findOrFail($request->id);
        $cliente->rut = $request->rut;
        $cliente->name = $request->name;
        $cliente->save();
        return $cliente;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $cliente = Cliente::destroy($request->id);
        return $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClientIds()
    {
        
        $clientes = Cliente::select('id')->get();
        return $clientes;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClientSortByLastName()
    {
        
        $clientes = DB::select(DB::raw("
                select id_cliente from clientes 
                inner join arriendos  on clientes.id = arriendos.id_cliente order by clientes.name

        "));
        return $clientes;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClientsSortByRentExpenses()
    {
        
        $clientes = DB::select(DB::raw("
            select concat_ws(' ', clientes.name, clientes.paterno) as nombre,  sum(costo_diario * dias) suma 
            from arriendos inner join clientes on clientes.id = arriendos.id_cliente
            group by id_cliente,clientes.name order by suma desc

        "));
        return $clientes;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCompanyClientsSortByName()
    {
        
        $clientes = DB::select(DB::raw("
                
                select empresas.id id_empresa,empresas.name as nom_empresa , concat_ws(' ', clientes.name, clientes.paterno) as nombre,id_cliente,rut from empresas 
                inner join arriendos  on empresas.id = arriendos.id_empresa
                inner join clientes   on clientes.id = arriendos.id_cliente order by nom_empresa

        "));
        $salida_clientes = [];
        foreach ($clientes as $clave => $cliente) {
            $salida_clientes[$cliente->nom_empresa][]=$cliente->rut;
        }
        
        return $salida_clientes;
    }

    public function getClientsSortByAmount($id)
    {
        
        $clientes = DB::select(DB::raw("
            select concat_ws(' ', clientes.name, clientes.paterno) as nombre,  sum(costo_diario * dias) suma 
            from arriendos inner join clientes on clientes.id = arriendos.id_cliente
            group by id_cliente,clientes.name order by suma desc

        "));
        return $clientes;
    }


}
