<?php

require 'C:/Users/itach/Documents/Hitema/Projet Automobile/DigiCars/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

$url = "$_SERVER[REQUEST_URI]";
$idParse = explode('/', $url);
$id = $idParse[3];

$link = mysqli_connect("localhost", "root", "", "digicars");
$sql = "SELECT * FROM echanges AS e INNER JOIN users AS u ON e.id_client = u.id INNER JOIN vehicules AS v ON e.id_vehicule = v.id WHERE e.id = '$id';";
$querySelect = mysqli_query($link, $sql);

while($row = mysqli_fetch_assoc($querySelect)) {

    // Informations client
    $id_client = $row['id_client'];
    $name = $row['name'];
    $email = $row['email'];

    // Informations véhicule
    $id_vehicule = $row['id_vehicule'];
    $marque = $row['marque'];
    $modele = $row['modele'];
    $annee = $row['annee'];
    $energie = $row['energie'];
    $boite = $row['bdv'];
    $exterieur = $row['ce'];
    $interieur = $row['ci'];
    $puissance_din = $row['puissancedin'];
    $puissance_fiscale = $row['puissancefiscale'];
    $portes = $row['portes'];
    $places = $row['places'];
    $prix = $row['prix'];
    $description = $row['description'];
    $option_1 = $row['option1'];
    $option_2 = $row['option2'];
    $option_3 = $row['option3'];
    $option_4 = $row['option4'];

    // Informations devis
    $quantite = $row['quantite'];
    $total = $row['total'];

    $sql = "SELECT * FROM echanges WHERE id = '$id';";
    $querySelect = mysqli_query($link, $sql);

    while($data = mysqli_fetch_assoc($querySelect)) {
        $date = $data['created_at'];
    }

    $site = array(
        "id" => 1,
        "address" => "88 Boulevard Gallieni\n92130 - Issy-les-Moulineaux",
        "tel" => "01.02.03.04.05",
        "email" => "contact@digicars.com"
    );

    if($id_client !== "") {
        $client = array(
            "id" => "$id_client",
            "name" => "$name",
            "email" => "$email",
        );
    }

    if($id_vehicule !== "") {
        $tasks[] = array(
            "id" => "$id_vehicule",
            "marque" => "$marque",
            "modele" => "$modele",
            "annee" => "$annee",
            "description" => "$marque $modele de $annee<br>$energie | $boite | Extérieur : $exterieur | Intérieur : $interieur | $puissance_din ch<br>$portes portes | $places places",
            "prix" => "$prix",
            "quantite" => "$quantite"
        );

        if($option_1 !== NULL) {
            $tasks[] = array(
                "description" => "Option 1 : $option_1",
                "prix" => "0",
                "quantite" => "1"
            );
        }

        if($option_2 !== NULL) {
            $tasks[] = array(
                "description" => "Option 2 : $option_2",
                "prix" => "0",
                "quantite" => "1"
            );
        }

        if($option_3 !== NULL) {
            $tasks[] = array(
                "description" => "Option 3 : $option_3",
                "prix" => "0",
                "quantite" => "1"
            );
        }

        if($option_4 !== NULL) {
            $tasks[] = array(
                "description" => "Option 4 : $option_4",
                "prix" => "0",
                "quantite" => "1"
            );
        }
    }

    ob_start();

    ?>
    <style type="text/css">
        table {
            width: 100%;
            color: #717375;
            font-family: helvetica;
            line-height: 5mm;
            border-collapse: collapse;
        }
        h2  { margin: 0; padding: 0; }
        p { margin: 5px; }

        .border th {
            border: 1px solid #000;
            color: white;
            background: #000;
            padding: 5px;
            font-weight: normal;
            font-size: 14px;
            text-align: center; }
        .border td {
            border: 1px solid #CFD1D2;
            padding: 5px 10px;
            text-align: center;
        }
        .no-border {
            border-right: 1px solid #CFD1D2;
            border-left: none;
            border-top: none;
            border-bottom: none;
        }
        .space { padding-top: 250px; }

        .10p { width: 10%; } .15p { width: 15%; }
        .25p { width: 25%; } .50p { width: 50%; }
        .60p { width: 60%; } .75p { width: 75%; }
    </style>

    <page backtop="10mm" backleft="10mm" backright="10mm" backbottom="10mm" footer="page;">

        <page_footer>
            <hr />
            <p>Fait a Issy-les-Moulineaux, le <?php echo date("d/m/y", strtotime($date)); ?></p>
            <p>Signature du client :</p>
            <p>&nbsp;</p>
        </page_footer>

        <table style="vertical-align: top;">
            <tr>
                <td class="75p">
                    <p style="font-weight: bold; font-size: 32px; text-transform: uppercase; line-height: 80px; color: black;">Digi<em style="font-style: normal; color: #31d900; font-weight: bold;">Cars</em></p>
                    <?php echo nl2br($site['address']); ?><br />
                    <strong>Téléphone : </strong><?php echo $site['tel']; ?><br />
                    <strong>Email : </strong><?php echo $site['email']; ?>
                </td>
                <td class="25p">
                    <?php echo 'ID Client : ' . $client['id']; ?><br />
                    <strong><?php echo $client['name']; ?></strong><br />
                    <?php echo $client['email']; ?>
                </td>
            </tr>
        </table>

        <table style="margin-top: 50px;">
            <tr>
                <td class="50p"><h2>Devis n°<?=$id?></h2></td>
                <td class="50p" style="text-align: right;">Emis le <?php echo date("d/m/y", strtotime($date)); ?></td>
            </tr>
        </table>

        <table style="margin-top: 30px; max-width: 100%" class="border">
            <thead>
            <tr>
                <th class="75p">Description</th>
                <th class="10p">Quantité</th>
                <th class="15p">Montant</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tasks as $task): ?>
            <tr>
                <td><?php echo $task['description']; ?></td>
                <td><?php echo $task['quantite']; ?></td>
                <td><?php echo $task['prix']; ?> &euro;</td>
            </tr>
            <?php endforeach ?>

            <tr>
                <td class="space"></td>
                <td></td>
                <td></td>
            </tr>

            <tr>
                <td colspan="1" class="no-border"></td>
                <td style="text-align: center;" rowspan="3"><strong>Total:</strong></td>
                <td>HT : <?php echo $total*0.8; ?> &euro;</td>
            </tr>
            <tr>
                <td colspan="1" class="no-border"></td>
                <td>TVA : <?php echo $total*0.2; ?> &euro;</td>
            </tr>
            <tr>
                <td colspan="1" class="no-border"></td>
                <td>TTC : <?php echo $total; ?> &euro;</td>
            </tr>
            </tbody>
        </table>

    </page>

<?php
$content = ob_get_clean();
try
{
    $pdf = new HTML2PDF('P', 'A4', 'fr');
    $pdf->pdf->SetDisplayMode('fullpage');
    $pdf->pdf->SetTitle('Devis n°'."$id".'.pdf');
    $pdf->writeHTML($content);
    $pdf->Output('Devis n°'."$id".'.pdf');
    die();
}
catch(HTML2PDF_exception $e)
{
    die($e.''. __LINE__ );
}

}
?>

