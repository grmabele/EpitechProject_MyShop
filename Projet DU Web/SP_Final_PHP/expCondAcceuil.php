<?php
include("connectDb.inc.php");

$query = "SELECT experiencesCond.idExpCond, experiencesCond.date, experiencesCond.heureDepart, experiencesCond.heureArrivee, experiencesCond.KmParcouru, lesManoeuvres.manoeuvre, lesMeteos.meteo, lesTrajets.trajet 
FROM `experiencesCond`
JOIN lesManoeuvres USING (idManoeuvre)
JOIN lesMeteos USING (idMeteo)
JOIN lesTrajets USING (idTrajet)
 
WHERE 1";

$result = mysqli_query($link,$query);

//echo mysqli_num_rows($result);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
<style>
        body{background: #bdc3c7; align-items: center; margin-left: 60px; margin-right: 60px;
            font-family: verdana, sans-serif;}
        table {table-layout: auto; width: 100%; border: 5px solid #0F8E9F; border-collapse: collapse; background: #d9ebed; text-align: center;}
        th, td { border: 2px solid #0F8E9F; padding: 10px;}
</style>
</head>
<body>
<header class="py-4">
    <nav class="navbar navbar-expand-md fixed-top navbar-light bg-light"> 
    <div class="container shadow p-2 mb-0 bg-body rounded">
        <a class="navbar-brand text-uppercase fw-bold" href="#"><span class="bg-info bg-gradient p-1 rounded-3 text-light">Ma</span> Conduite
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
        aria-controls="navbarNav" aria-expanded="false" aria-label="toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="expCondCreation.php?idExpCond=0">[ CRÉATION EXPÉRIENCE ]</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="javascript:localStorage.removeItem('experienceConduites');">[ EFFACER TOUT ]</a>
                </li>
            </ul>
        </div>
    </div>
    </nav>   
</header>

<section class="col-12 my-2 text-md-center mb-5 mt-5">
<h1>Mes expériences de conduite</h1>
</section>      
<section id="main"></section>
    <table>
        <thead><tr><th>N°</th><th>Date</th><th>Heure départ</th><th>Heure arrivée</th><th>Km parcouru</th><th>manoeuvre</th><th>meteo<th>trajet</th><th>commentaire</th></th><th>Edit</th><th>Suppr.</th></thead>

        <tbody>
            <?php
            while ($var=mysqli_fetch_assoc($result)) {
              //var_dump($var);
              extract($var);
                echo "<tr>";
                //echo "<td>$idExpCond</td>";
                echo "<td>$date</td>";
                echo "<td>$heureDepart</td>";
                echo "<td>$heureArrivee</td>";
                echo "<td>$KmParcouru</td>";
                echo "<td>{$var['manoeuvre']}</td>";
                echo "<td>{$var['meteo']}</td>";
                echo "<td>{$var['trajet']}</td>";
                echo "<td>$commentaire</td>";
                echo "<td></td>";
                echo "<td></td>";
                echo "</tr>";
            }// fin while
            ?>
        </tbody>
    </table>
</body>
</html>

