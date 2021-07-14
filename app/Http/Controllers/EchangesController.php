<?php

namespace App\Http\Controllers;

use App\Echanges;
use App\User;
use App\Vehicules;
use Illuminate\Http\Request;

class EchangesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $users = User::get()->all();
        $vehicules = Vehicules::get()->all();
        return view('Back/createdevis', compact('vehicules','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $attributes = request()->validate([
            'id_client' => 'required',
            'id_vehicule' => 'required',
            'quantite' => 'required',
            'total' => 'required',
        ]);
        $devis = Echanges::create($attributes);
        return redirect()->route('createdevis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Echanges  $echanges
     * @return \Illuminate\Http\Response
     */
    public function show(Echanges $echanges)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Echanges  $echanges
     * @return \Illuminate\Http\Response
     */
    public function edit(Echanges $echanges)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Echanges  $echanges
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Echanges $echanges)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Echanges  $echanges
     * @return \Illuminate\Http\Response
     */
    public function destroy(Echanges $echanges)
    {
        //
    }
}
