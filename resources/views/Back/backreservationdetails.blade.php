@extends('layouts.app')

@section('content')

<body>
    <div class="container mt-5" style="padding-top: 20px">
<?php 

    $date = $_GET['date'];
    $heure = $_GET['heure'];

    // echo $date;
    // echo $heure;

    $bdd = new PDO('mysql:host=localhost;dbname=digicars', 'root','');

    $req = $bdd->prepare("SELECT * FROM reservation WHERE date = '$date' AND timeslot = '$heure' ");
    $req->execute();
    

    if(isset($_POST['submit2'])){
    $account_id = $_POST['account_id'];
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $timeslot = $heure;
    $motif = $_POST['motif'];
    $updatedate = $date;
    
    $req = $bdd->prepare("UPDATE reservation SET name = '$name', email = '$email', motif = '$motif'  WHERE id = '$id' ");
    $req->execute();
    ?>
    <script>
        window.location = "http://127.0.0.1:8000/admin/backreservations/valider";
    </script>
    <?php
    }

    if(isset($_POST['delete'])){
        $id = $_POST['id'];
        $req = $bdd->prepare("DELETE FROM reservation WHERE id = '$id' ");
        $req->execute();
    ?>
    <script>
        window.location = "http://127.0.0.1:8000/admin/backreservations/dates";
    </script>
    <?php
    }

?>




        <div class="row">
            <div class="col-md-12">
                <form action="" method="post">
                    @csrf
                    <?php 
                        while($data = $req->fetch(PDO::FETCH_OBJ)):
                        ?>
                        <div class="form-group">
                            <label for="">Date</label>
                            <input readonly type="text" value="<?php echo $date ?>" class="form-control" id="timeslot" name="date">
                        </div>
            
                        <div class="form-group">
                            <label for="">Horaire</label>
                            <input readonly type="text" value="<?php echo $heure ?>" class="form-control" id="timeslot" name="timeslot">
                        </div>
            
                        <input hidden type="text" class="form-control" name="account_id" value="<?php echo $data->account_id ?>">
                        <input hidden type="text" class="form-control" name="id" value="<?php echo $data->id ?>">
            
                        <div class="form-group">
                            <label for="">Nom</label>
                            <input required type="text" class="form-control" value="<?php echo $data->name ?>" name="name">
                        </div>
                        
                        <div class="form-group">
                            <label for="">Email</label>
                            <input required type="email" class="form-control" value="<?php echo $data->email ?>" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Motif</label>
                            <select name="motif" class="form-control" required>
                                <option value="Conseil" <?php if($data->motif == "Conseil"){ echo "selected"; } ?>>Conseil</option>
                                <option value="Achat" <?php if($data->motif == "Achat"){ echo "selected";} ?> >Achat</option>
                                <option value="Location" <?php if($data->motif == "Location"){ echo "selected"; } ?>>Location</option>
                            </select>
                        </div>
                        
                        <?php
                        endwhile;
                    ?>
                    <div class="form-group pull-right">
                        <button name="delete" type="submit" class="btn btn-danger">Supprimer</button>

                        <button name="submit2" type="submit" class="btn btn-primary">Valider</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
@endsection
