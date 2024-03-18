<?php
/* 
@include 'config.php';

    $x = "SELECT lire_cv.* FROM lire_cv WHERE idc = {$_SESSION['idx']} ";
    $result = $conn->query($x);
    while($row = $result->fetch_assoc()) {
       
        $colonne1 = $row['competence'];
        $colonne2 = $row['ann_exp'];
        $colonne2 = $row['certificat'];
        $colonne2 = $row['diplom'];
        echo  $colonne1." ". $colonne2." ". $colonne3." ". $colonne4;
    }*/
    session_start();

    ini_set('display_errors', '0');
    //pour les chapms2
    $servername = "localhost";
$username = "root";
$password = "";
$dbname = "inscription";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Préparation et exécution de la requête SQL
$sql = "SELECT lire_cv.* FROM lire_cv WHERE idc = {$_SESSION['idx']}";
$result = $conn->query($sql);

// Vérifier si des résultats sont retournés
if ($result->num_rows > 0) {
    // Parcourir chaque ligne de résultat
    while($row = $result->fetch_assoc()) {
        // Accéder aux colonnes de chaque lign
        $colonne1 = $row['competence'];
        $colonne2 = $row['ann_exp'];
        $colonne3 = $row['certificat'];
        $colonne4 = $row['diplom'];
        //immmporotant
        $kle=$row['idc'];
        // Et ainsi de suite pour toutes les colonnes nécessaires
        // Vous pouvez traiter les données ici, les afficher ou les stocker dans des variables
    }
 
} else {
  //  echo "Aucun résultat trouvé.";
}

//pour les chapms1
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "inscription";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion a échoué : " . $conn->connect_error);
}

// Préparation et exécution de la requête SQL
$sql = "SELECT candidat.* FROM candidat WHERE idc = {$_SESSION['idx']}";
$result = $conn->query($sql);

// Vérifier si des résultats sont retournés
if ($result->num_rows > 0) {
    // Parcourir chaque ligne de résultat
    while($row = $result->fetch_assoc()) {
        // Accéder aux colonnes de chaque ligne
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $poste = $row['poste'];
        $address = $row['adresse'];
        $tele = $row['telephone'];
        // Et ainsi de suite pour toutes les colonnes nécessaires
        // Vous pouvez traiter les données ici, les afficher ou les stocker dans des variables
    }
 
} else {
    echo "Aucun résultat trouvé.";
}

/******************************************** */  
              ?>

                     
<?php

if(isset($_POST['submit'])){
    // Vérifier si les données POST sont définies
   if(isset($_POST['nom'], $_POST['prenom'], $_POST['post'], $_POST['address'], $_POST['telephone'], $_POST['competances'], $_POST['experience'], $_POST['certificat'], $_POST['diplome'])){
        // Récupérer les valeurs des champs POST
        $nom1 = $_POST['nom'];
        $prenom1 = $_POST['prenom'];
        $post1 = $_POST['post'];
        $address1 = $_POST['address'];
        $telephone1 = $_POST['telephone'];
        $competence1 = $_POST['competances'];
        $experience1 = $_POST['experience'];
        $certificat1 = $_POST['certificat'];
        $diplome1 = $_POST['diplome'];
        $idc1 = $_SESSION['idx'];

        // Requête d'insertion
        $dsn = "mysql:host=localhost;dbname=inscription";
    $username = "root";
    $password = "";
    try {
        $pdo = new PDO($dsn, $username, $password);
    /* echo "Données stockées avec succès dans la base de données.";*/
    } catch (PDOException $e) {
        echo "Erreur lors de la connexion à la base de données : " . $e->getMessage();
    }

        $req="SELECT * FROM lire_cv";
        $stm=$pdo->prepare($req);
        $stm->execute();
        $cours=$stm->fetchAll(PDO::FETCH_ASSOC);
        //
    if($kle!=""){
        $sql = "UPDATE lire_cv
        SET competence = :competence,
        ann_exp = :experience,
        certificat = :certificat,
        diplom = :diplome
        WHERE idc = :idc";
    }
    else{
        $sql = "INSERT INTO lire_cv(competence, ann_exp, certificat, diplom, idc) VALUES (:competence, :experience, :certificat, :diplome, :idc)";
    }

        //
        $stmt = $pdo->prepare($sql);
        if($stmt){
            // Liaison des valeurs avec les paramètres de la requête INSERT
            $stmt->bindParam(':idc', $idc1);
            $stmt->bindParam(':competence', $competence1);
            $stmt->bindParam(':experience', $experience1);
            $stmt->bindParam(':certificat', $certificat1);
            $stmt->bindParam(':diplome', $diplome1);

            // Exécution de la requête INSERT
            $stmt->execute();
            if($stmt->rowCount() > 0){
                echo "<h1>Modification bien fait</h1>";
            } else {
               // echo "Erreur lors de l'exécution de la requête d'insertion".$kle;
            }
            // Fermer le curseur
            $stmt->closeCursor();
        }
            // Requête de mise à jour
            $sql1 = "UPDATE candidat
                    SET nom = :nom,
                        prenom = :prenom,
                        poste = :poste,
                        adresse = :adresse,
                        telephone = :telephone
                    WHERE idc = :idc";

            $stmt1 = $pdo->prepare($sql1);
            if($stmt1){
                // Liaison des valeurs avec les paramètres de la requête UPDATE
                $stmt1->bindParam(':nom', $nom1);
                $stmt1->bindParam(':prenom', $prenom1);
                $stmt1->bindParam(':poste', $post1);
                $stmt1->bindParam(':adresse', $address1);
                $stmt1->bindParam(':telephone', $telephone1);
                $stmt1->bindParam(':idc', $idc1);

                // Exécution de la requête UPDATE
                $stmt1->execute();
                // Pas besoin de vérifier rowCount() pour UPDATE car elle retourne 0 si aucune ligne n'est affectée

                // Fermer le curseur
                $stmt1->closeCursor();
            } else {
               // echo "Erreur lors de la préparation de la requête de mise à jour";
            }
        } else {
           // echo "Erreur lors de la préparation de la requête d'insertion";
        }
        header("location:profile.php");
    } else {
       // echo "Tous les champs POST ne sont pas définis";
    }




/*************************************************** */
// Fermer la connexion
$conn->close();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="../css/style5.css">
    <title>Document</title>
</head>
<body>
    <?php  
    ?>
  <header class="header"> 
    <nav class="nav">
        <a href="#" class="nav_logo">eazy.he</a>

        <ul class="nav_items">
            <li class="nav_item">
                <a href="#" class="linkn">Home</a>
                <a href="#" class="linkn">About</a>
                <a href="#" class="linkn">contact</a>
            </li>
        </ul>
    </nav>
</header>   
  
   <section class="home">
    <div class="container">
        
        <header>registration</header>
        <form  method="post" >
            <div class="form first">
                <div class="details personnal">
                    <span class="title">Person details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Prenom</label>
                            <input type="text" placeholder="Votre Prenom" name="prenom" value="<?php echo  $prenom;?>" >
                        </div>
                        <div class="input-field">
                            <label>Nom</label>
                            <input type="text" placeholder="Votre Nom" name="nom" value="<?php echo  $nom;?>">
                        </div>
                        <div class="input-field">
                            <label>Post</label>
                            <input type="text" placeholder="Post" name="post" value="<?php echo   $poste?>">
                        </div>
                        <div class="input-field">
                            <label>Adresse</label>
                            <input type="text" placeholder="Adresse" name="address" value="<?php echo $address ;?>">
                        </div>
                        
                        <div class="input-field">
                            <label>NºTelephone</label>
                            <input type="text" placeholder="NºTelephone" name="telephone" value="<?php echo $tele;?>">
                        </div>
                        
                    </div>
                   
                    
                    
                    
                </div>

                <div class="details ID">
                    <span class="title">prof details</span>
                    <div class="fields">
                        <div class="input-field">
                            <label>Competances</label>
                            <input type="text" placeholder="Competances" name="competances" value="<?php echo $colonne1;?>">
                        </div>
                        <div class="input-field">
                            <label>Annee d'experinance</label>
                            <input type="text" placeholder="Annee d'experinance" name="experience" value="<?php echo $colonne2;?>">
                        </div>
                        <div class="input-field">
                            <label>Certificat</label>
                            <input type="text" placeholder="Certificat" name="certificat" value="<?php echo $colonne3;?>">
                        </div>
                        <div class="input-field">
                            <label>Diplome</label>
                            <input type="text" placeholder="Diplome" name="diplome" value="<?php echo $colonne4;?>">
                        </div>
                        <!--<div class="input-field">
                            <label>Fonctionalite</label>
                            <input type="text" placeholder="Fonctionalite" name="Fonctionalite">
                        </div>
                        <div class="input-field">
                            <label>Date D'embauche</label>
                            <input type="date" placeholder="embauche" name="embauche">
                        </div>-->
                    </div>
                 <!--  <button class="next">
                    <span class="btn">Next</span>
                    <i class="uil uil-navigator"></i>
                   </button>-->
                   <button type="submit" class="next" name="submit">submit</button>
                   <!--<input type="submit" name="submit" class="next" value="submit">
                                <span class="btn">submit</span>
                                <i class="uil uil-navigator"></i>-->
                            
                    
                  
                    
                    
                </div>
            </div>

            
                
                 <!--   <span class="title">Person details</span>
                    
                        <div class="card form second">
                         <div class="card2">
                            <h3>Uploader Votre Cv</h3>
                            <div class="drop_box">
                              <header>
                                <h4>Select File here</h4>
                              </header>
                              <p>Files Supported: PDF, TEXT, DOC , DOCX</p>
                              <input type="file" hidden accept=".doc,.docx,.pdf" id="fileID" style="display:none;">
                              <button class="btn2">Choose File</button>
                            </div>
                         </div>
                        <div class="butn">
                            <div class="backbtn">
                                <i class="uil uil-navigator"></i>
                                <span class="btn">Back</span>
                                
                            </div>
                               <button class="next">
                                <span class="btn">submit</span>
                                <i class="uil uil-navigator"></i>
                               </button>
                           </div> 
                        </div>
                       
-->
                    
       
                   
                    
                    
                    
                
                
                   
            
        </form>
    </div>
   </section>

  <!--<script src="../js/java.js"></script>-->
</body>
</html>