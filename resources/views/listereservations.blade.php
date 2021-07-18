@extends('layouts.app')

@section('content')
    <html lang="fr">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <div class="container mt-5" style="padding-top:50px;">
            <div class="row">
                <div class="col-md-12 text-center">
                    @foreach ($reservations as $reservation)
                        <div class="row text-center">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                                <div class="card" style=" border: 2px solid rgba(0,0,0,.2);border-bottom:none; border-bottom-left-radius: 0px 0px; border-bottom-right-radius: 0px 0px; background:#29b100;color:white;">
                                    <div class="card-body " style="border-bottom:none;">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <i class="far fa-calendar-alt" style="font-size: 1.2vw;"></i> <label style="font-size:1vw" for="">{{ $reservation->date }}</label>
                                            </div>
                                            <div class="col-md-6">
                                                <i class="far fa-clock" style="font-size: 1.2vw;"></i> <label style="font-size:1vw" for="">{{ $reservation->timeslot }}</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card" style="border: 2px solid rgba(0,0,0,.2);border-top:none; border-top-left-radius: 0px 0px; border-top-right-radius: 0px 0px;">
                                    <div class="card-body " style="border-top:none; ">
                                        <i class="fas fa-user" style="font-size: 1vw;"></i> <label class="text-uppercase" style="font-size:1vw" for="">{{ $reservation->name }}</label>                              
                                        <hr>
                                        <div class="row text-center">
                                            <div class="col-md-1">
                                            </div>
                                            <div class="col-md-2">
                                                <br>
                                                @if ($reservation->motif == "Conseil")
                                                    <i class="fas fa-info-circle" style="font-size: 3vw;"></i>
                                                @elseif ($reservation->motif == "Location")
                                                    <i class="fas fa-handshake" style="font-size: 3vw;"></i>

                                                @elseif ($reservation->motif == "Achat")
                                                    <i class="fas fa-shopping-cart" style="font-size: 3vw;"></i>
                                                @else
                                                Error <br>
                                                <i class="fas fa-exclamation-circle" style="font-size: 3vw;"></i>
                                                @endif
                                            </div>
                                            <div class="col-md-9 text-left">
                                                Vous avez un rendez-vous prévu le {{ $reservation->date }} à {{ $reservation->timeslot }} pour 
                                                @if ($reservation->motif == "Conseil")
                                                    un conseil avec un de nos agents.
                                                @elseif ($reservation->motif == "Location")
                                                    la location d'un véhicule.
                                                @elseif ($reservation->motif == "Achat")
                                                    l'achat d'un véhicule.
                                                @endif
                                                <br>
                                                <br>
                                                Afin de vous informer d'une éventuel contrainte toutes les informations vous seront envoyé a l'adresse suivante : 
                                                <br>
                                                <i class="far fa-envelope"></i> : {{ $reservation->email }}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6 text-center">
                                                <button type="button" class="btn btn-secondary"> <i class="fas fa-sync-alt"></i> Modifier le rendez-vous</button>
                                            </div>
                                            <div class="col-md-6 text-center">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $reservation->id }}"><i class="fas fa-times"></i> Annuler le rendez-vous</button>
                                                
                                                <div class="modal fade" id="deleteModal{{ $reservation->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                      <div class="modal-content">
                                                        <div class="modal-body">
                                                            Êtes-vous sure de vouloir annuler votre rendez-vous ? 
                                                        </div>
                                                        <div class="modal-footer">
                                                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Retour</button>
                                                          <form action="{{ url('reservations/liste/delete/'.$reservation->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit">Annuler le rendez-vous</button>
                                                        </form>
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                    @endforeach
                </div>
            </div>
        </div>
        <script src="https://kit.fontawesome.com/772e7ca8e4.js" crossorigin="anonymous"></script>
    </body>
    </html>

@endsection
