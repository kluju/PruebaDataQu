<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use Illuminate\Support\Facades\DB;
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
        
        $empresas = DB::select(DB::raw("
                
                select empresas.id id_empresa,empresas.name as nom_empresa , concat_ws(' ', clientes.name, clientes.paterno) as nombre,id_cliente,rut from empresas 
                inner join arriendos  on empresas.id = arriendos.id_empresa
                inner join clientes   on clientes.id = arriendos.id_cliente order by nom_empresa

        "));
        $salida_empresas = [];
        foreach ($empresa as $clave => $cliente) {
            $salida_empresas[$empresa->nom_empresa][]=$empresa->rut;
        }
        
        return $salida_empresas;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCompaniesSortByProfits()
    {
        
        $empresas = DB::select(DB::raw("
        select id_empresa,empresas.name empresa,sum(costo_diario * dias) suma
        from arriendos 
        inner join empresas  on empresas.id = arriendos.id_empresa
        group by id_empresa
        order by suma,id_empresa

        "));
        return $empresas;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCompaniesWithRentsOver1Week()
    {
        
        $empresas = DB::select(DB::raw("
            SELECT empresa, count(id_cliente) as total from (
            select id_empresa,empresas.name empresa,id_cliente,sum(dias) dias_arriendo
            from arriendos 
            inner join empresas  on empresas.id = arriendos.id_empresa
            inner join clientes on clientes.id = arriendos.id_cliente
            group by id_empresa,empresa,id_cliente
            HAVING dias_arriendo >= 7
            order by id_empresa,empresa,id_cliente
            ) as empresas_All
            GROUP BY empresa
        "));
        $salida_empresa = [];
        foreach ($empresas as $clave => $empresa) {
            $salida_empresa[$empresa->empresa]=$empresa->total;
        }
        
        return $salida_empresa;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClientsWithLessExpense()
    {
        
        $empresas = DB::select(DB::raw("
            
            SELECT empresa,id_cliente,min(total_arriendo) from (
            select empresas.name empresa,id_cliente,clientes.name as nombre,  sum(costo_diario * dias) total_arriendo 
            from arriendos 
            inner join clientes on clientes.id = arriendos.id_cliente
            inner join empresas  on empresas.id = arriendos.id_empresa
            group by  empresa,id_cliente,clientes.name 
            ) empresas_ALL
            group by  empresa
    
        "));
        
        $salida_empresa = [];
        foreach ($empresas as $clave => $empresa) {
            $salida_empresa[$empresa->empresa]=$empresa->id_cliente;
        }
        
        return $salida_empresa;
    }
}
