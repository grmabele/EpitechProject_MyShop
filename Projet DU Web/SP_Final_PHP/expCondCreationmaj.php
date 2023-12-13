<?php

include("connectDb.inc.php");

echo "<pre>";
print_r($_POST);
echo "</pre>";


if(array_key_exists('idExpCond', $_GET) and is_numeric($_GET['idExpCond'])){
	$idExpCond = intval($_POST['idExpCond']);
	$date = $_POST['date'];
	$heureDepart = $_POST['heureDepart'];
	$heureArrivee = $_POST['heureArrivee'];
	$kmParcouru = $_POST['kmParcouru'];
	$idManoeuvre = intval($_POST['idManoeuvre']);
	$idMeteo = intval($_POST['idMeteo']);
	$idTrajet = intval($_POST['idTrajet']);
} else {
	exit();
}

if($idExpCond==0){//Cas nouvelle experience de conduite
$query = "INSERT INTO experiencesCond VALUES(null,\"$date\", \"$heureDepart\", \"$heureArrivee\", \"$kmParcouru\", $idManoeuvre, $idMeteo, $idTrajet, 1)";

}

header("Location: expCondAcceuil.php");

?>