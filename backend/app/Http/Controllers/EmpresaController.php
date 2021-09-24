<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        return $empresas;
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $empresa = new Empresa();
        $empresa->name = $request->name;
        $empresa->save();
        
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
        $empresa = Empresa::findOrFail($request->id);
        $empresa->name = $request->name;
        $empresa->save();
        return $empresa;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $empresa = Empresa::destroy($request->id);
        return $empresa;
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCompaniesSortByProfits()
    {
        
        $clientes = DB::select(DB::raw("
        select id_empresa,empresas.name empresa,sum(costo_diario * dias) suma
        from arriendos 
        inner join empresas  on empresas.id = arriendos.id_empresa
        group by id_empresa
        order by suma,id_empresa

        "));
        return $clientes;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCompaniesWithRentsOver1Week()
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
}
