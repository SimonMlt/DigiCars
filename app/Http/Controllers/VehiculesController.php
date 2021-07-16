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
        return view('Back/backvehicules', compact('vehicules'));
    }

    public function index2()
    {
        //
        $vehicules = Vehicules::get()->all();
        return view('vehicules', compact('vehicules'));
    }

    public function index3()
    {
        //
        $vehicules = Vehicules::latest()->take(3)->get();
        return view('home', compact('vehicules'));
    }

    public function details($id)
    {
        //
        $vehicules = Vehicules::findOrFail($id);
        return view('detailsvehicule', compact('vehicules'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function create()
    {
        //
        return view('Back/createvehicules');
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
        $request->validate([
            'filename' => 'required',
            'marque' => 'required',
            'modele' => 'required',
            'annee' => 'required',
            'energie' => 'required',
            'bdv' => 'required',
            'ce' => 'required',
            'ci' => 'required',
            'puissancedin' => 'required',
            'puissancefiscale' => 'required',
            'portes' => 'required',
            'places' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'option1' => 'nullable',
            'option2' => 'nullable',
            'option3' => 'nullable',
            'option4' => 'nullable',
        ]);

        // ensure the request has a file before we attempt anything else.
        if ($request->hasFile('filename')) {

            $request->validate([
                'image' => 'mimes:jpeg,bmp,png' // Only allow .jpg, .bmp and .png file types.
            ]);

            /// Save the file locally in the storage/public/ folder under a new folder named /product
            $request->filename->store('files', 'public');

            // Store the record, using the new file hashname which will be it's new filename identity.
            $vehicules = new Vehicules([
                "filename" => $request->filename->hashName(),
                'marque' => $request->get('marque'),
                'modele' => $request->get('modele'),
                'annee' => $request->get('annee'),
                'energie' => $request->get('energie'),
                'bdv' => $request->get('bdv'),
                'ce' => $request->get('ce'),
                'ci' => $request->get('ci'),
                'puissancedin' => $request->get('puissancedin'),
                'puissancefiscale' => $request->get('puissancefiscale'),
                'portes' => $request->get('portes'),
                'places' => $request->get('places'),
                'prix' => $request->get('prix'),
                'description' => $request->get('description'),
                'option1' => $request->get('option1'),
                'option2' => $request->get('option2'),
                'option3' => $request->get('option3'),
                'option4' => $request->get('option4'),
            ]);
            $vehicules->save(); // Finally, save the record.
        }

//        $vehicules = Vehicules::create($attributes);
        return redirect()->route('adminvehicules');
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
        return view ('Back/editvehicules', compact('vehicules'));
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
            'marque' => 'required',
            'modele' => 'required',
            'annee' => 'required',
            'energie' => 'required',
            'bdv' => 'required',
            'ce' => 'required',
            'ci' => 'required',
            'puissancedin' => 'required',
            'puissancefiscale' => 'required',
            'portes' => 'required',
            'places' => 'required',
            'prix' => 'required',
            'description' => 'required',
            'option1' => 'nullable',
            'option2' => 'nullable',
            'option3' => 'nullable',
            'option4' => 'nullable',
        ]);
        $vehicules = Vehicules::findOrFail($id);
        $vehicules->update($attributes);
        return redirect()->route('adminvehicules');
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
        return redirect()->route('adminvehicules');
    }
}
