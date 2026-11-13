<?php

namespace App\Http\Controllers;

use App\Models\salidas;
use Illuminate\Http\Request;

class SalidasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salidas=salidas::all();
        return responce()->json($salidas, 200);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datos=$request->validate ([
            "ci"=>"required",
            "destino"=>"required",
            "precio"=>"precio",
            "cantidad"=>"cantidad"
        ]);
        $salidas=salidas::create($datos);
        return responce()->json($salidas, 201);

        //
    }

    /**
     * Display the specified resource.
     */
    public function show(salidas $salidas)
    {
        return responce()->json($salidas, 200);

        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, salidas $salidas)
    {
        $datos=$request->validate ([
            "ci"=>"required",
            "destino"=>"required",
            "precio"=>"precio",
            "cantidad"=>"cantidad"
        ]);
        return responce()->json($salidas, 200);
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(salidas $salidas)
    {
        $salidas->delete();
        return responce()->noContent();
        //
    }
}
