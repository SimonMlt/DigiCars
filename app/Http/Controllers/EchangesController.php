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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $devis = Echanges::get()->all();
        return view('Back/backdevis', compact('devis'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $devis = Echanges::get()->all();
        $users = User::get()->all();
        $vehicules = Vehicules::get()->all();
        return view('Back/createdevis', compact('vehicules','users','devis'));
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
    public function show($id)
    {
        $devis = Echanges::findOrFail($id);
        $users = User::get()->all();
        $vehicules = Vehicules::get()->all();
        return view('Back/backvoirdevis', compact('devis', 'users', 'vehicules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $devis = Echanges::findOrFail($id);
        $users = User::get()->all();
        $vehicules = Vehicules::get()->all();
        return view ('Back/editdevis', compact('devis', 'users', 'vehicules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Echanges  $echanges
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributes = request()->validate([
            'id_client' => 'required',
            'id_vehicule' => 'required',
            'quantite' => 'required',
            'total' => 'required',
        ]);
        $devis = Echanges::findOrFail($id);
        $devis->update($attributes);
        return redirect()->route('admindevis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Echanges  $echanges
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $devis = Echanges::findOrFail($id);
        $devis->delete();
        return redirect()->route('admindevis');
    }
}
