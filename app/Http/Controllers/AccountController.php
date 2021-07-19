<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        // $devis = Account::get()->all();
        // return view('Back/backdevis', compact('devis'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        // $devis = Account::get()->all();
        // $users = User::get()->all();
        // $vehicules = Vehicules::get()->all();
        // return view('Back/createdevis', compact('vehicules','users','devis'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // $attributes = request()->validate([
        //     'id_client' => 'required',
        //     'id_vehicule' => 'required',
        //     'quantite' => 'required',
        //     'total' => 'required',
        // ]);
        // $devis = Account::create($attributes);
        // return redirect()->route('createdevis');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Account  $Account
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $devis = Account::findOrFail($id);
        // $users = User::get()->all();
        // $vehicules = Vehicules::get()->all();
        // return view('Back/backvoirdevis', compact('devis', 'users', 'vehicules'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $account = User::findOrFail($id);
        return view ('editaccount', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Account  $Account
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $attributes = request()->validate([
            'name' => 'required',
            'email' => 'required',

        ]);
        $account = User::findOrFail($id);
        $account->update($attributes);
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Account  $Account
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $account = User::findOrFail($id);
        $account->delete();
        return redirect('/');
    }
}
