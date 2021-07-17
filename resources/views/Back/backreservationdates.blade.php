@extends('layouts.app')

@section('content')
    <section class="section section-bg" id="call-to-action" style="background-image: url({{ asset('assets/images/banner-image-1-1920x500.jpg') }})">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="cta-content">
                        <br>
                        <br>
                        <h2>Réservez-<em>un créneau</em></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php

    function build_calendar($month, $year) {
        $mysqli = new mysqli('localhost', 'root', '', 'digicars');
        // $stmt = $mysqli->prepare("select * from bookings where MONTH(date) = ? AND YEAR(date) = ?");
        // $stmt->bind_param('ss', $month, $year);
        // $bookings = array();
        // if($stmt->execute()){
        //     $result = $stmt->get_result();
        //     if($result->num_rows>0){
        //         while($row = $result->fetch_assoc()){
        //             $bookings[] = $row['date'];
        //         }

        //         $stmt->close();
        //     }
        // }


        // Create array containing abbreviations of days of week.
        $daysOfWeek = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');

        // What is the first day of the month in question?
        $firstDayOfMonth = mktime(0,0,0,$month,1,$year);

        // How many days does this month contain?
        $numberDays = date('t',$firstDayOfMonth);

        // Retrieve some information about the first day of the
        // month in question.
        $dateComponents = getdate($firstDayOfMonth);

        // What is the name of the month in question?
        $monthName = $dateComponents['month'];
        $monthName = str_replace(
            array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'),
            array('Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'),
            $monthName
        );

        // What is the index value (0-6) of the first day of the
        // month in question.
        $dayOfWeek = $dateComponents['wday'];
        if($dayOfWeek == 0){
            $dayOfWeek = 6;
        }else{
            $dayOfWeek = $dayOfWeek-1;
        }

        // Create the table tag opener and day headers

        $datetoday = date('Y-m-d');
        setlocale (LC_TIME, 'fr_FR.utf8','fra');
        $currentMonth = ucfirst(strftime("%B"));


        $calendar = "<table class='table table-bordered'>";
        $calendar .= "<center><h2 style='font-size: 32px;font-weight: 700;text-transform: uppercase;' class='mb-2'>$monthName $year</h2>";
        $calendar.= "<a class='btn btn-xs btn-primary' style='border-radius:50%;' href='?month=".date('m', mktime(0, 0, 0, $month-1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month-1, 1, $year))."'><i class='fas fa-arrow-left'></i></a> ";

        $calendar.= " <a class='btn btn-xs btn-primary' href='?month=".date('m')."&year=".date('Y')."'>Aujourd'hui</a> ";

        $calendar.= "<a class='btn btn-xs btn-primary' style='border-radius:50%;' href='?month=".date('m', mktime(0, 0, 0, $month+1, 1, $year))."&year=".date('Y', mktime(0, 0, 0, $month+1, 1, $year))."'><i class='fas fa-arrow-right'></i></a></center><br>";



        $calendar .= "<tr>";

        // Create the calendar headers

        foreach($daysOfWeek as $day) {
            $calendar .= "<th  class='header text-center' style='background-color:#31d900;color:#FFFFFF;border:none;'>$day</th>";
        }

        // Create the rest of the calendar

        // Initiate the day counter, starting with the 1st.

        $currentDay = 1;

        $calendar .= "</tr><tr>";

        // The variable $dayOfWeek is used to
        // ensure that the calendar
        // display consists of exactly 7 columns.

        if ($dayOfWeek > 0) {
            for($k=0;$k<$dayOfWeek;$k++){
                $calendar .= "<td  class='empty'></td>";

            }
        }


        $month = str_pad($month, 2, "0", STR_PAD_LEFT);

        while ($currentDay <= $numberDays) {

            // Seventh column (Saturday) reached. Start a new row.

            if ($dayOfWeek == 7) {

                $dayOfWeek = 0;
                $calendar .= "</tr><tr>";

            }

            $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
            $date = "$year-$month-$currentDayRel";

            $dayname = strtolower(date('l', strtotime($date)));
            $eventNum = 0;
            $today = $date==date('Y-m-d')? "today" : "";
            if($dayname=="saturday" || $dayname=="sunday" ){
                $calendar.="<td class='$today'><h4 class='mb-3'>$currentDay</h4> <button class='btn btn-secondary btn-xs'>Fermé</button>";
            }elseif($date<date('Y-m-d')){
                $calendar.="<td><h4 class='mb-3'>$currentDay</h4> <button class='btn btn-secondary disabled btn-xs'>Passé</button>";
            }else{


                $totalbookings = checkSlots($mysqli, $date);
                if($totalbookings == 16){
                    $calendar.="<td class='$today'><h4 class='mb-3'>$currentDay</h4> <a href='#' class='btn btn-warning btn-xs'>Complet</a>";
                }else{
                    ?>
                    @auth
                    <?php
                        $calendar.="<td class='$today'><h4 class='mb-3'>$currentDay</h4> <a href='heures?date=".$date."' class='btn btn-success btn-xs'>Disponible</a>";
                    ?>
                    @endauth
                    @guest
                        <?php
                        $calendar.="<td class='$today'><h4 class='mb-3'>$currentDay</h4> <a href='http://127.0.0.1:8000/login' class='btn btn-success btn-xs'>Disponible</a>";

                        ?>
                    @endguest
                    <?php

                }

            }




            $calendar .="</td>";
            // Increment counters

            $currentDay++;
            $dayOfWeek++;

        }



        // Complete the row of the last week in month, if necessary

        if ($dayOfWeek != 7) {

            $remainingDays = 7 - $dayOfWeek;
            for($l=0;$l<$remainingDays;$l++){
                $calendar .= "<td class='empty'></td>";

            }

        }

        $calendar .= "</tr>";

        $calendar .= "</table>";

        echo $calendar;

    }

    function checkSlots($mysqli, $date){
        $stmt = $mysqli->prepare("select * from reservation where date = ?");
        $stmt->bind_param('s', $date);
        $totalbookings = 0;
        if($stmt->execute()){
            $result = $stmt->get_result();
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $totalbookings++;
                }

                $stmt->close();
            }
        }

        return $totalbookings;
    }

    ?>

    <html lang="fr">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
        <style>
            @media only screen and (max-width: 760px),
            (min-device-width: 802px) and (max-device-width: 1020px) {

                /* Force table to not be like tables anymore */
                table, thead, tbody, th, td, tr {
                    display: block;

                }



                .empty {
                    display: none;
                }

                /* Hide table headers (but not display: none;, for accessibility) */
                th {
                    position: absolute;
                    top: -9999px;
                    left: -9999px;
                }

                tr {
                    border: 1px solid #31d900;
                }

                td {
                    /* Behave  like a "row" */
                    border: none;
                    border-bottom: 1px solid #31d900;
                    position: relative;
                    padding-left: 50%;
                }



                /*
            Label the data
            */
                td:nth-of-type(1):before {
                    content: "Sunday";
                }
                td:nth-of-type(2):before {
                    content: "Monday";
                }
                td:nth-of-type(3):before {
                    content: "Tuesday";
                }
                td:nth-of-type(4):before {
                    content: "Wednesday";
                }
                td:nth-of-type(5):before {
                    content: "Thursday";
                }
                td:nth-of-type(6):before {
                    content: "Friday";
                }
                td:nth-of-type(7):before {
                    content: "Saturday";
                }


            }

            /* Smartphones (portrait and landscape) ----------- */

            @media only screen and (min-device-width: 320px) and (max-device-width: 480px) {
                body {
                    padding: 0;
                    margin: 0;
                }
            }

            /* iPads (portrait and landscape) ----------- */

            @media only screen and (min-device-width: 802px) and (max-device-width: 1020px) {
                body {
                    width: 495px;
                }
            }

            @media (min-width:641px) {
                table {
                    table-layout: fixed;
                    background: rgb(245, 245, 245);
                }
                td {
                    width: 33%;
                }
            }

            /*.row{*/
            /*    margin-top: 20px;*/
            /*}*/

            .today{

                background:#3cff00;
            }



        </style>
    </head>

    <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <?php
                $dateComponents = getdate();
                if(isset($_GET['month']) && isset($_GET['year'])){
                    $month = $_GET['month'];
                    $year = $_GET['year'];
                }else{
                    $month = $dateComponents['mon'];
                    $year = $dateComponents['year'];
                }
                echo build_calendar($month,$year);
                ?>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/772e7ca8e4.js" crossorigin="anonymous"></script>

    </body>

    </html>

@endsection
