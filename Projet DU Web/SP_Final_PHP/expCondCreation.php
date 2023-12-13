<?php
include("connectDb.inc.php");

/*echo "<pre>";
print_r($_GET);
echo "</pre>";
*/

if(array_key_exists('idExpCond', $_GET) and is_numeric($_GET['idExpCond'])){

    $idExpCond = intval($_GET['idExpCond']);
    } else {
        exit();
    }

$query = "SELECT * FROM `lesManoeuvres`, `lesMeteos`, `lesTrajets`";
$result = mysqli_query($link,$query);

$listeManoeuvre = array();
$listeMeteo = array();
$listeTrajet = array();

while($var = mysqli_fetch_assoc($result)){
    $listeManoeuvre[$var['idManoeuvre']] = $var['manoeuvre'];
    $listeMeteo[$var['idMeteo']] = $var['meteo'];
    $listeTrajet[$var['idTrajet']] = $var['trajet'];
}// fin while  


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Importation Google Fonts --->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <!--Importation Google Fonts --->

    <title>Document</title>
<style>

  /********************************/
  /*      Mise en page            */
  /*         body                 */
  /********************************/

    body{font-family: Verdana; font-size: 12pt;}  
  *,
  ::before,
  ::after {
    box-sizing: border-box;
    padding: 0;
  }
  body {
    min-height: 100vh;
    font-family: sans-serif;
    background: #d9d9d9;
    padding: clamp(20px, 5vw, 50px) 20px 10px;
  }
  @media (max-width: 700px) {

  .container #expConduiteForm .question .input{
  flex-direction: column;
  align-items: flex-start;
  }

  .container #expConduiteForm .input label {
  margin-bottom: 5px;
  }
  .container  #expConduiteForm textarea {
  flex-direction: row;
  }
  }
  /* Fin de mise en page body */

  /********************************/
  /*      Mise en page            */
  /*         titre h1             */
  /********************************/

  h1 {
    font-family: sans-serif;
    font-size: 40px;
    margin-bottom: 40px;
    font-weight: 400;
    letter-spacing: 2px;
    text-align: center;
    color: #0e0e0e;
  }

  h1 span {
    font-weight: 800;
  }
  /* Fin de mise en page h1 */

  /********************************/
  /*      Mise en page input      */
  /*     label et select          */
  /********************************/

  .question > div {
    margin: 10px 0;
    display: flex;
    align-items: center;
  }
  .input span{font-size: 18px;}
  .appt {
    display: inline-block;
    width: 300px;
  }
  input[type="time"],
  input[type="number"],
  input[type="date"] {
    width: 300px;
    height: 25px;
  }
  input[type="text"] {
    width: 300px;
  }
  select {
    width: 300px;
    height: 25px;
  }
  /* Fin de mise en page input, label et select */


  /********************************/
  /*      Mise en page            */
  /*      Commentaire             */
  /********************************/

  .container {
    max-width: 800px;
    margin: 0 auto;
  }
  .question {
    padding: 25px;
    margin: 20px 0;
    border-radius: 5px;
    background: #d9ebed;
    box-shadow: 0 5px 10px rgba(104, 104, 104, 0.5);
  }
  .question h4 {
    font-size: 24px;
    font-weight: 500;
    margin-bottom: 20px;
  }
  textarea {
    width: 300px;
    height: 150px;
  }
  /* Fin de mise en page commentaire */

  /********************************/
  /*      Mise en page            */
  /*        button                */
  /********************************/

  form button {
    display: block;
    margin: 20px auto;
    border-radius: 5px;
    background: #fff;
    min-width: 200px;
    padding: 15px 5px;
    font-size: 20px;
    cursor: pointer;
    border: none;
    box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
  }
  form button:hover {
    background: #d9ebed;
  }
  /* Fin de mise en page bouton */

</style>
</head>
<body>
    <!--Titre de l'application --->

    <h1>
        <span>Fiche</span>
        expérience de conduite accompagné. ✅
    </h1> 

    <!--div qui regroupe tout le formulaire --->

    <div class="container">
        <form action="expCondCreationmaj.php" method="post">
        <input type="hidden" name="idExpCond" value="<?php echo $idExpCond; ?>">  
        
        
            <!--Premier bloc du formulaire --->

            <div class = "question">
                <h4>Information sur le trajet</h4> 

                   
                <div class="input">
                    <label for="idDate"><span class="appt">Date :</span></label>
                    <input type="date" name="trip-date" id="idDate" value="yyy-MM-dd" min="2023-01-01" max="2030-12-31" required>
                </div>

                <div class="input"> <!--Champ heure de départ --->
                    <label for="heureDepart"><span class="appt">Heure départ :</span></label>
                    <input type="time" name="debut" id="heureDepart">
                </div>

                <div class="input"> <!--Champ heure d'arrivée --->
                    <label for="heureArrivee"><span class="appt">Heure arrivée :</span></label>
                    <input type="time" name="fin" id="heureArrivee" min="9:00" max="18:00" required> 
                </div>

                <div class="input">  <!--Champ kilomètre parcourus --->
                    <label for="km"><span class="appt">Kilomètre parcourus (km):</span></label>
                    <input type="text" name="kilometre" id="km">
                </div> 

                <div class="input"> <!--Champ manoeuvres --->
                    <span class="appt">Manoeuvres</span><select size="1" name="idManoeuvre" required>
                        <option value="">-- Choix --</option>
                        <?php
                            foreach ($listeManoeuvre as $keyIdManoeuvre => $valueManoeuvre) {
                                echo "<option value=\"$keyIdManoeuvre\">$valueManoeuvre</option>\n";
                            }
                        ?>
                    </select> 
                </div>

                <div class="input"> <!--Champ méteo --->
                    <span class="appt">Méteo</span><select class="select" id="idMeteo" required>
                        <option value="">-- Choix --</option>
                        <?php
                            foreach ($listeMeteo as $keyIdMeteo => $valueMeteo) {
                                echo "<option value=\"$keyIdMeteo\">$valueMeteo</option>\n";
                            }
                        ?>
                    </select>
                </div>


                <div class="input"> <!--Champ trajet --->
                    <span class="appt">Trajet</span><select class="select" id="idTrajet" required>
                        <option value="">-- Choix --</option>
                        <?php
                            foreach ($listeTrajet as $keyIdTrajet => $valueTrajet) {
                                echo "<option value=\"$keyIdTrajet\">$valueTrajet</option>\n";
                            }
                        ?>
                    </select>
                </div>  

            </div> 

            <!--Deuxième bloc du formulaire --->

            <div class="question"> <!--Champ commentaire --->
                <h4><span>Commentaires :</span></h4>
                <textarea name="commentaire" id="comment" placeholder="Mettez votre commentaire ici"></textarea>
            </div> 
            
            <!--Button du formulaire --->

            <button>Envoyer</button>   

        </form>  
    </div>      
</body>
</html>















