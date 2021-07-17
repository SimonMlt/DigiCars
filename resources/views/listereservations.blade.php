@extends('layouts.app')

@section('content')
    <html lang="fr">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
    <div class="container mt-5" style="padding-top:100px;">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="row text-center">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card" style="border-bottom:none; border-bottom-left-radius: 0px 0px; border-bottom-right-radius: 0px 0px; background:#31d900;">
                            <div class="card-body " style="border-bottom:none;">
                                <div class="row">
                                    <div class="col-md-6">
                                        <i class="far fa-calendar-alt" style="font-size: 1.2vw;"></i> Date
                                    </div>
                                    <div class="col-md-6">
                                        <i class="far fa-clock" style="font-size: 1.2vw;"></i> Heure
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card" style="border-top:none; border-top-left-radius: 0px 0px; border-top-right-radius: 0px 0px;">
                            <div class="card-body " style="border-top:none; ">
                               
                                <hr>
                                <i class="fas fa-user" style="font-size: 1.2vw;"></i> Nom Prenom
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 text-center">
                                        <button type="button" class="btn btn-secondary"> <i class="fas fa-sync-alt"></i> Modifier</button>
                                    </div>
                                    <div class="col-md-6 text-center">
                                        <button type="button" class="btn btn-danger"><i class="far fa-trash-alt"></i> Supprimer</button>
                                    </div>
                                </div>
                                    <hr>
                                    <div class="row text-center">
                                        <div class="col-md-1">
                                        </div>
                                        <div class="col-md-2">
                                            <i class="fas fa-info-circle" style="font-size: 3vw;"></i>
                                        </div>
                                        <div class="col-md-9">
                                            Email : test@test.test

                                            <br>
                                            <br>

                                            Type de rdv : Achat
                                        </div>
                                    </div>
                                

                                
                            </div>
                        </div>
                        
                    </div>
            </div>
            </div>
        </div>
        <i class="fas fa-info-circle"></i>
        <i class="fas fa-shopping-cart"></i>
        <i class="fas fa-handshake"></i>
    </div>
    <script src="https://kit.fontawesome.com/772e7ca8e4.js" crossorigin="anonymous"></script>
    

    </body>

    </html>

@endsection
