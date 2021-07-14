@extends('layouts.app')

@section('content')
        <div class="container" style="padding-top: 100px">
            <form method="POST" action="{{ url('admin/devis/create') }}">
                @csrf
                <div class="row" id="tabs">
                    <div class="col-lg-8">
                        <label>Client</label>
                        <select name="id_client">
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>

                        <label>Véhicule</label>
                        <select name="id_vehicule">
                            @foreach($vehicules as $vehicule)
                                <option value="{{ $vehicule->id }}">{{ $vehicule->marque }} {{ $vehicule->modele }}</option>
                            @endforeach
                        </select>

                        <label>Quantité</label>
                        <input type="number" name="quantite">

                        <label>Total</label>
                        <input type="number" name="total">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Créer le devis</button>
            </form>
        </div>
@endsection
