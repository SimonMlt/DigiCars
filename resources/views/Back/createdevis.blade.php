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
                        <input type="number" class="form-control" name="quantite">

                        <label for="total">Total</label>
                        <input type="text" name="total" class="form-control price-input" readonly>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary float-right">Créer le devis</button>
            </form>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $('.vehicle-type').on('change', function() {
                $('.price-input')
                    .val(
                        $(this).find(':selected').data('price')
                    );
            });
        </script>
@endsection
