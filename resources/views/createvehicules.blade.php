@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <form method="POST" action="{{ url('vehicules/create') }}">
            @csrf
            <div class="form-group">
                <label>Marque</label>
                <input type="text" class="form-control" name="marque">
            </div>
            <div class="form-group">
                <label>Modèle</label>
                <input type="text" class="form-control" name="modele">
            </div>
            <div class="form-group">
                <label>Année</label>
                <input type="text" class="form-control" name="annee">
            </div>
            <div class="form-group">
                <label>Energie</label>
                <input type="text" class="form-control" name="energie">
            </div>
            <div class="form-group">
                <label>Finition</label>
                <input type="text" class="form-control" name="finition">
            </div>
            <div class="form-group">
                <label>Boîte de vitesse</label>
                <input type="text" class="form-control" name="bdv">
            </div>
            <div class="form-group">
                <label>Couleur extérieure</label>
                <input type="text" class="form-control" name="ce">
            </div>
            <div class="form-group">
                <label>Couleur intérieure</label>
                <input type="text" class="form-control" name="ci">
            </div>
            <div class="form-group">
                <label>Puissance DIN</label>
                <input type="text" class="form-control" name="puissancedin">
            </div>
            <div class="form-group">
                <label>Puissance fiscale</label>
                <input type="text" class="form-control" name="puissancefiscale">
            </div>
            <div class="form-group">
                <label>Nombres de portes</label>
                <input type="text" class="form-control" name="portes">
            </div>
            <div class="form-group">
                <label>Nombres de places</label>
                <input type="text" class="form-control" name="places">
            </div>

            <button type="submit" class="btn btn-primary float-right">Submit</button>
        </form>
    </div>

@endsection
