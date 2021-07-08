<?php

namespace App\Http\Controllers;

use App\Vehicules;
use Illuminate\Http\Request;

class VehiculesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        //
        $vehicules = Vehicules::get()->all();
        return view('backvehicules', compact('vehicules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        //
        return view('createvehicules');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $attributes = request()->validate([
            'marque'=>'required',
            'modele'=>'required',
            'annee'=>'required',
            'energie'=>'required',
            'finition'=>'required',
            'bdv'=>'required',
            'ce'=>'required',
            'ci'=>'required',
            'puissancedin'=>'required',
            'puissancefiscale'=>'required',
            'portes'=>'required',
            'places'=>'required',
        ]);
        $vehicules = Vehicules::create($attributes);
        return redirect()->route('vehicules');
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        //
        $vehicules = Vehicules::findOrFail($id);
        return view ('editvehicules', compact('vehicules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $attributes = request()->validate([
            'marque'=>'required',
            'modele'=>'required',
            'annee'=>'required',
            'energie'=>'required',
            'finition'=>'required',
            'bdv'=>'required',
            'ce'=>'required',
            'ci'=>'required',
            'puissancedin'=>'required',
            'puissancefiscale'=>'required',
            'portes'=>'required',
            'places'=>'required',
        ]);
        $vehicules = Vehicules::findOrFail($id);
        $vehicules->update($attributes);
        return redirect()->route('vehicules');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        //
        $vehicules = Vehicules::findOrFail($id);
        $vehicules->delete();
        return redirect()->route('vehicules');
    }
}
