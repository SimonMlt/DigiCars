@extends('layouts.app')

@section('content')
        <div class="container" style="padding-top: 100px">
            <form method="POST" action="{{ url('admin/devis/create') }}">
                @csrf
                <div class="row" id="tabs">
                    <div class="col-lg-8">
                        <label>Client</label>
                        <select class="form-control" name="id_client">
                            <option selected disabled value="#"> --Sélectionner-- </option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                            @endforeach
                        </select>

                        <label>Véhicule</label>
                        <select class="form-control vehicle-type" name="id_vehicule">
                            <option selected disabled value="#"> --Sélectionner-- </option>
                            @foreach($vehicules as $vehicule)
                                <option data-price="{{ $vehicule->prix }}" value="{{ $vehicule->id }}">{{ $vehicule->marque }} {{ $vehicule->modele }}</option>
                            @endforeach
                        </select>

                        <label>Quantité</label>
                        <input type="number" id="quantite" class="form-control quantite" name="quantite">

                        <label for="total">Total</label>
                        <input type="text" name="total" id="total" class="form-control price-input" readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Créer le devis</button>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            const quantite = document.querySelector(".quantite");

            $('.quantite').on('change', function() {
                $('.price-input')
                    .val(
                        $('.vehicle-type').find(':selected').data('price') * quantite.value
                    );
            });

            $('.vehicle-type').on('change', function() {
                $('.price-input')
                    .val(
                        $(this).find(':selected').data('price') * quantite.value
                    );
            });

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
