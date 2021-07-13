@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="padding-top: 20px">
        <form method="POST" action="{{ url('admin/vehicules/edit/'.$vehicules->id) }}">
            @csrf
            <div class="form-group">
                <label>Marque</label>
                <input type="text" class="form-control" name="marque" value="{{ $vehicules->marque }}">
            </div>
            <div class="form-group">
                <label>Modèle</label>
                <input type="text" class="form-control" name="modele" value="{{ $vehicules->modele }}">
            </div>
            <div class="form-group">
                <label>Année</label>
                <input type="text" class="form-control" name="annee" value="{{ $vehicules->annee }}">
            </div>
            <div class="form-group">
                <label>Energie</label>
                <input type="text" class="form-control" name="energie" value="{{ $vehicules->energie }}">
            </div>
            <div class="form-group">
                <label>Finition</label>
                <input type="text" class="form-control" name="finition" value="{{ $vehicules->finition }}">
            </div>
            <div class="form-group">
                <label>Boîte de vitesse</label>
                <input type="text" class="form-control" name="bdv" value="{{ $vehicules->bdv }}">
            </div>
            <div class="form-group">
                <label>Couleur extérieure</label>
                <input type="text" class="form-control" name="ce" value="{{ $vehicules->ce }}">
            </div>
            <div class="form-group">
                <label>Couleur intérieure</label>
                <input type="text" class="form-control" name="ci" value="{{ $vehicules->ci }}">
            </div>
            <div class="form-group">
                <label>Puissance DIN</label>
                <input type="text" class="form-control" name="puissancedin" value="{{ $vehicules->puissancedin }}">
            </div>
            <div class="form-group">
                <label>Puissance fiscale</label>
                <input type="text" class="form-control" name="puissancefiscale" value="{{ $vehicules->puissancefiscale }}">
            </div>
            <div class="form-group">
                <label>Nombres de portes</label>
                <input type="text" class="form-control" name="portes" value="{{ $vehicules->portes }}">
            </div>
            <div class="form-group">
                <label>Nombres de places</label>
                <input type="text" class="form-control" name="places" value="{{ $vehicules->places }}">
            </div>
            <div class="form-group">
                <label>Prix</label>
                <input type="text" class="form-control" name="prix" value="{{ $vehicules->prix }}">
            </div>
            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
        <form action="{{ url('vehicules/delete/'.$vehicules->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mb-4 mr-4 float-right" type="submit">Supprimer</button>
        </form>
    </div>

@endsection
