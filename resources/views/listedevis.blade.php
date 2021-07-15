@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 style="padding: 20px 0">Liste des devis</h1>
        <div style="padding-top: 20px;padding-bottom: 20px;">
            <a href="{{ url('admin/devis/create/') }}"><button style="float: left;margin-left: 20px;" class="submit">Créer un devis</button></a><br><br>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Client</th>
                    <th scope="col">Véhicule</th>
                    <th scope="col">Quantité</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($devis as $quote)
                    <tr>
                        <th>{{ $quote->id }}</th>
                        <th>{{ $quote->user->name }}</th>
                        <th>{{ $quote->vehicules->marque }} {{ $quote->vehicules->modele }}</th>
                        <th>{{ $quote->quantite }}</th>
                        <th>{{ $quote->total }}€</th>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
