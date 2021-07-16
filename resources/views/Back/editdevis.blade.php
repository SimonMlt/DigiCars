@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top: 100px">
        <form method="POST" action="{{ url('admin/devis/edit/'.$devis->id) }}">
            @csrf
            <div class="col-md-6 offset-md-3">
                <div class="form-group">
                    <label>Client :</label>
                    <select class="form-control" name="id_client">
                        <option selected disabled value="#"> --Sélectionner--</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}" {{ $user->id == $devis->id_client ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Véhicule :</label>
                    <select class="form-control vehicle-type" name="id_vehicule">
                        <option selected disabled value="#"> --Sélectionner--</option>
                        @foreach($vehicules as $vehicule)
                            <option data-price="{{ $vehicule->prix }}"
                                    value="{{ $vehicule->id }}" {{ $vehicule->id == $devis->id_vehicule ? 'selected' : '' }}>{{ $vehicule->marque }} {{ $vehicule->modele }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Quantité :</label>
                    <input type="number" id="quantite" class="form-control quantite" name="quantite" value="{{ $devis->quantite }}">
                </div>
                <div class="form-group">
                    <label for="total">Total :</label>
                    <input type="text" name="total" id="total" class="form-control price-input" readonly value="{{ $devis->total }}">
                </div>
                <button type="submit" class="btn btn-primary float-right">Modifier le devis</button>
            </div>
        </form>
        <form action="{{ url('admin/devis/delete/'.$devis->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger mb-4 mr-4 float-right" type="submit">Supprimer</button>
        </form>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        const quantite = document.querySelector(".quantite");

        $('.quantite').on('change', function () {
            $('.price-input')
                .val(
                    $('.vehicle-type').find(':selected').data('price') * quantite.value
                );
        });

        $('.vehicle-type').on('change', function () {
            $('.price-input')
                .val(
                    $(this).find(':selected').data('price') * quantite.value
                );
        });
    </script>

    <script>
        // document.getElementById("quantite").defaultValue = "1";
        // document.getElementById("total").defaultValue = "0";

        /*
        const prix = $('.price-input').val($(this).find(':selected').data('price'));
        const total = document.querySelector("#total")
        const quantite = document.querySelector("#quantite")
        const modele = document.querySelector(".vehicle-type")

        quantite.addEventListener('change', (event) => {
            total.value = prix.value * quantite.value;
        });

        modele.addEventListener('change', (event) => {
            total.value = prix.value * quantite.value;
        });

        */
    </script>
@endsection
