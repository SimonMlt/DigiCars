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
                    <select name="id_vehicule" id="id_vehicule">
                        @foreach($vehicules as $vehicule)
                            <option value="{{ $vehicule->id }}">{{ $vehicule->marque }} {{ $vehicule->modele }}</option>
                        @endforeach
                    </select>

                    <input type="text" id="prix" value="{{ $vehicule->prix }}">

                    <label>Quantité</label>
                    <input type="number" name="quantite" id="quantite">

                    <label>Total</label>
                    <input type="text" name="total" id="total" disabled="disabled" readonly value="{{ $vehicule->prix }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary float-right">Créer le devis</button>
        </form>
    </div>

    <script>
        const prix = document.querySelector("#prix");
        const quantite = document.querySelector("#quantite");
        const total = document.querySelector("#total");
        const modele = document.querySelector("#id_vehicule");

        quantite.addEventListener('change', (event) => {
            total.value = quantite.value * prix.value;
            console.log(prix);
        })

        modele.addEventListener('change', (event) => {
            total.value = quantite.value * prix.value;
        })
    </script>
@endsection
