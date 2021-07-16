@extends('layouts.app')

@section('content')

<?php
$mysqli = new mysqli('localhost', 'root', '', 'digicars');
if(isset($_GET['date'])){
    $date = $_GET['date'];
    $stmt = $mysqli->prepare("select * from reservation where date = ?");
    $stmt->bind_param('s', $date);
    $bookings = array();
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            while($row = $result->fetch_assoc()){
                $bookings[] = $row['timeslot'];
            }

            $stmt->close();
        }
    }
}

if(isset($_POST['submit'])){
    $account_id = $_POST['account_id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $timeslot = $_POST['timeslot'];
    $motif = $_POST['motif'];
    $stmt = $mysqli->prepare("select * from reservation where date = ? AND timeslot = ?");
    $stmt->bind_param('ss', $date, $timeslot);
    if($stmt->execute()){
        $result = $stmt->get_result();
        if($result->num_rows>0){
            $msg = "<div class='alert alert-danger'>Already Booked</div>";
        }else{
            $stmt = $mysqli->prepare("INSERT INTO reservation (account_id, name, timeslot, email,motif, date) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param('ssssss', $account_id, $name, $timeslot, $email, $motif, $date);
            $stmt->execute();
            $msg = "<div class='alert alert-success'>Booking Successfull</div>";
            $bookings[]=$timeslot;
            $stmt->close();
            $mysqli->close();
        }
    }

}


$duration = 30;
$cleanup = 0;
$start = "09:00";
$end = "17:00";

function timeslots($duration,$cleanup, $start, $end){
    $start = new DateTime($start);
    $end = new DateTime($end);
    $interval = new DateInterval("PT".$duration."M");
    $cleanupInterval = new DateInterval("PT".$cleanup."M");
    $slots = array();

    for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
        $endPeriod = clone $intStart;
        $endPeriod->add($interval);
        if($endPeriod>$end){
            break;
        }

        $slots[] = $intStart->format("H\Hi")." - ".$endPeriod->format("H\Hi");

    }

    return $slots;

}




?>
    <!doctype html>
<html lang="fr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
{{--    <link rel="stylesheet" href="/css/main.css">--}}
</head>

<body>
<div class="container mt-5" style="padding-top: 20px">
    <h1 class="text-center">Horaire du
        <?php
        setlocale(LC_TIME, "fr_FR", "French");
        echo ucwords(strftime('%A %d %B %G', strtotime($date)));
        ?></h1><hr>
    <div class="row">
        <div class="col-md-12">
            <?php echo isset($msg)?$msg:""; ?>
        </div>
        <?php $timeslots = timeslots($duration,$cleanup, $start, $end);
        foreach($timeslots as $ts){
        ?>
        <div class="col-md-3">
            <div class="form-group">
                <?php if(in_array($ts, $bookings)){?>
                <button class="btn btn-danger"><?php echo $ts; ?></button>
                <?php }else {?>
                <button class="btn btn-success book" value="<?php echo $ts; ?>" data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
                <?php } ?>

            </div>
        </div>
        <?php } ?>
    </div>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Rendez-vous pour :<br> <span id="slot"></span></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>

            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Horaire</label>
                                <input readonly type="text" class="form-control" id="timeslot" name="timeslot">
                            </div>

                            <input hidden type="text" class="form-control" name="account_name" value="{{ Auth::user()->id }}">

                            <div class="form-group">
                                <label for="">Nom</label>
                                <input required type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input required type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="">Motif</label>
                                <input required type="text" class="form-control" name="motif">
                            </div>
                            <div class="form-group pull-right">
                                <button name="submit" type="submit" class="btn btn-primary">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
{{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}
<script>
    
    $(".book").click(function(){
        var timeslot = $(this).attr('data-timeslot');
        $("#slot").html(timeslot);
        $("#timeslot").val(timeslot);
        $("#myModal").modal("show");
        
    });

    
</script>
</body>

</html>


@endsection
