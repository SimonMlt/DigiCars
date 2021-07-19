<?php

namespace App\Http\Controllers;

use App\Demandes;
use App\User;
use App\Vehicules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DemandesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $demandes = Demandes::orderBy('created_at', 'desc')->get()->all();
        return view('Back/backdemandes', compact('demandes'));
    }

    public function index2()
    {
        $id = Auth::id();
        $demandes = Demandes::where('id_client', '=', "{$id}")->get()->all();
        return view('listedemandes', compact('demandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        $demandes = Demandes::get()->all();
        return view('createdemandes', compact('demandes'));
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
            'name' => 'required',
            'email' => 'required',
            'object' => 'required',
            'message' => 'required',
            'status' => 'required',
        ]);
        $demandes = Demandes::create($attributes);
        return redirect()->route('demandesliste');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Echanges  $echanges
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $demandes = Demandes::findOrFail($id);
        return view ('Back/answerdemandes', compact('demandes'));
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
            'status' => 'required',
            'answer' => 'required',
        ]);
        $demandes = Demandes::findOrFail($id);
        $demandes->update($attributes);
        return redirect()->route('admindemandes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Echanges  $echanges
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
