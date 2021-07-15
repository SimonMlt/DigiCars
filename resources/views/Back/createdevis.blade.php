@extends('layouts.app')

@section('content')
        <div class="container" style="padding-top: 100px">
            <form method="POST" action="{{ url('admin/devis/create') }}">
                @csrf
                <div class="row" id="tabs">
                    <div class="col-lg-8">
                        <label>Client</label>
                        <input list="id_clients" name="id_clients" placeholder="Chercher un client ...">
                        <datalist id="id_clients">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </datalist>
                    </div>
                </div>

                <div class="row" id="tabs">
                    <div class="col-lg-8">
                        <label>Véhicule</label>
                        <input list="id_vehicule" name="id_vehicule" placeholder="Chercher un véhicule ...">
                        <datalist id="id_vehicule">
                            @foreach($vehicules as $vehicule)
                                <option value="{{ $vehicule->id }}">{{ $vehicule->marque }} {{ $vehicule->modele }}</option>
                            @endforeach
                        </datalist>
                    </div>
                </div>

                <div class="row" id="tabs">
                    <div class="col-lg-8">
                        <label>Quantité</label>
                        <input type="number" name="quantite">
                    </div>
                </div>

                <div class="row" id="tabs">
                    <div class="col-lg-8">
                        <label>Total</label>
                        <input type="number" name="total" step="0.01">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary float-right">Créer le devis</button>
            </form>
        </div>
@endsection
