<?php

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

}
include($_SERVER['DOCUMENT_ROOT'].'/lib/html2pdf.php');

$user = array(
    "id" => 1,
    "address" => "79 Avenue Georges Clémenceau\nNanterre 92000 -",
    "rcs" => "42091194300032",
    "tva" => "FR26420911943",
    "tel" => "+33147259796"
);

$client = array(
    "id" => 1,
    "firstname" => "Luc",
    "lastname" => "Kennedy",
    "mail" => "luc.kennedy@gmail.com",
    "portable" => "06.32.23.15.58",
    "address" => "5 Avenue du Boulevard Maréchal Juin\n14000 Caen",
    "infos" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium eos tempora, magni delectus porro cum labore eligendi."
);

$project = array(
    "id" => 1,
    "name" => "Création d'un Portfolio",
    "status" => 1,
    "infos" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Praesentium eos tempora, magni delectus porro cum labore eligendi.",
    "created" => 1,
    "paid" => false,
    "client_id" => 1,
    "user_id" => 1
);

$tasks[] = array(
    "id" => 1,
    "ref" => "96ER1",
    "description" => "Veille technologique",
    "price" => 200,
    "quantity" => 1,
    "project_id" => 1
);

$tasks[] = array(
    "id" => 2,
    "ref" => "152DE",
    "description" => "Création et intégration d'un thème pour Wordpress",
    "price" => 500,
    "quantity" => 1,
    "project_id" => 1
);

$tasks[] = array(
    "id" => 3,
    "ref" => "25365",
    "description" => "Développement d'un plugin Wordpress sur mesure pour le client",
    "price" => 1000,
    "quantity" => 1,
    "project_id" => 1
);

ob_start();
$total = 0;
$total_tva = 0;
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
        <p>Fait a Paris, le <?php echo date("d/m/y"); ?></p>
        <p>Signature du particulier, suivie de la mension manuscrite "bon pour accord".</p>
        <p>&nbsp;</p>
    </page_footer>

    <table style="vertical-align: top;">
        <tr>
            <td class="75p">
                <div class="img">
                    <img src="images/logo.jpg" alt="logo" style="width: 350px;">
                </div>
                <?php echo nl2br($user['address']); ?><br />
                <strong>R.C.S. : </strong> <?php echo $user['rcs']; ?><br />
                <strong>TVA Intracommunautaire : </strong><?php echo $user['tva']; ?><br />
                <strong>Tél. : </strong><?php echo $user['tel']; ?>
            </td>
            <td class="25p">
                <strong><?php echo $client['firstname']." ".$client['lastname']; ?></strong><br />
                <?php echo nl2br($client['address']); ?><br />
            </td>
        </tr>
    </table>

    <table style="margin-top: 50px;">
        <tr>
            <td class="50p"><h2>Devis n°14</h2></td>
            <td class="50p" style="text-align: right;">Emis le <?php echo date("d/m/y"); ?></td>
        </tr>
        <tr>
            <td style="padding-top: 15px;" colspan="2"><strong>Objectif:</strong> <?php echo $project['name']; ?></td>
        </tr>
    </table>

    <table style="margin-top: 30px;"class="border">
        <thead>
        <tr>
            <th class="50p">Description</th>
            <th class="10p">Quantité</th>
            <th class="20p">Prix Unitaire</th>
            <th class="20p">Montant</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tasks as $task): ?>
        <tr>
            <td><?php echo $task['description']; ?></td>
            <td><?php echo $task['quantity']; ?></td>
            <td><?php echo $task['price']; ?> &euro;</td>
            <td><?php
                $price_tva = $task['price']*1.2;
                echo $price_tva;
                ?>
                &euro;</td>

            <?php
            $total += $task['price'];
            $total_tva += $price_tva;
            ?>
        </tr>
        <?php endforeach ?>

        <tr>
            <td class="space"></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>

        <tr>
            <td colspan="2" class="no-border"></td>
            <td style="text-align: center;" rowspan="3"><strong>Total:</strong></td>
            <td>HT : <?php echo $total; ?> &euro;</td>
        </tr>
        <tr>
            <td colspan="2" class="no-border"></td>
            <td>TVA : <?php echo ($total_tva - $total); ?> &euro;</td>
        </tr>
        <tr>
            <td colspan="2" class="no-border"></td>
            <td>TTC : <?php echo $total_tva; ?> &euro;</td>
        </tr>
        </tbody>
    </table>

</page>

<?php
$content = ob_get_clean();
try {
    $pdf = new HTML2PDF("p","A4","fr");
    $pdf->pdf->SetAuthor('DOE John');
    $pdf->pdf->SetTitle('Devis 14');
    $pdf->pdf->SetSubject('Création d\'un Portfolio');
    $pdf->pdf->SetKeywords('HTML2PDF, Devis, PHP');
    $pdf->writeHTML($content);
    $pdf->Output('Devis.pdf');
    // $pdf->Output('Devis.pdf', 'D');
} catch (HTML2PDF_exception $e) {
    die($e);
}


?>

