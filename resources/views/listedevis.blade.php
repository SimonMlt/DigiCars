@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 style="padding: 20px 0">Mes devis</h1>

        <table class="table" style="text-align: center">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Client</th>
                <th scope="col">Véhicule</th>
                <th scope="col">Quantité</th>
                <th scope="col">Total</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($devis as $quote)
                <tr>
                    <th>{{ $quote->id }}</th>
                    <th>{{ $quote->user->name }} ({{ $quote->user->id }})</th>
                    <th>{{ $quote->vehicules->marque }} {{ $quote->vehicules->modele }}</th>
                    <th>{{ $quote->quantite }}</th>
                    <th>{{ $quote->total }}€</th>
                    <th><a href="{{ url('admin/devis/'.$quote->id) }}" target="_blank">Voir</a></th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
