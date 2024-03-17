<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<body>
<header class="header">
        <nav class="nav">
            <a href="#" class="nav_logo">eazy.he</a>
            <ul class="nav_items">
                <li class="nav_item">
                    <a href="../pages/home.php" class="linkn">Home</a>
                    <a href="../Homepages/Apropos.html" class="linkn">About</a>
                    <a href="../Homepages/contactez.html" class="linkn">contact</a>
                </li>
            </ul>
        </nav>
    </header>
<?php

$textArray = [];


if(isset($_POST['submit'])) {
    
    if(!empty($_FILES["pdf_file"]["name"])) {
        
        $fileName = basename($_FILES["pdf_file"]["name"]);
        $fileType = pathinfo($fileName, PATHINFO_EXTENSION);

        
        $allowTypes = array('pdf');
        if(in_array($fileType, $allowTypes)) {
            
            include 'vendor/autoload.php';

            
            $parser = new \Smalot\PdfParser\Parser();

            
            $file = $_FILES["pdf_file"]["tmp_name"];

            
            $pdf = $parser->parseFile($file);

            
            $text = $pdf->getText();

            $textArray = explode("\n",$text);
            //$textArray = str_word_count($text, 1);
        } else {
            $statusMsg = '<p>only PDF file </p>';
        }
    } else {
        $statusMsg = '<p>Please select a PDF file </p>';
    }
} // Votre tableau de texte en PHP (à définir)

    $array2 = [];
    $array3 = [];
    $array4 = [];
    $array5 = [];
    $mot;
    $exp;
    $copm;
    $certif;
    for ($i = 0; $i < count($textArray); $i++) {
        if ($textArray[$i] == 'Competences : ') {
            $k = $i;
            $j = 0;
            $i++;
            while ($textArray[$i] != " ") {
                $array2[$j] = $textArray[$i];
                $i++;
                $j++;
            }
            break;
        }
    }
     //donee array2 a un string 
     $copm = implode(", ", $array2);

    for ($i = 0; $i < count($textArray); $i++) {
        if ($textArray[$i] == 'Duree d’ Experience : ') {
            $k = $i;
            $j = 0;
            $i++;
            while ($textArray[$i] != " ") {
                $array3[$j] = $textArray[$i];
                $i++;
                $j++;
            }
            $exp=$array3[0];
            break;
        }
    }

    for ($i = 0; $i < count($textArray); $i++) {
        if ($textArray[$i] == 'Certeficat : ') {
            $k = $i;
            $j = 0;
            $i++;
            while ($textArray[$i] != " ") {
                $array4[$j] = $textArray[$i];
                $i++;
                $j++;
            }
            break;
        }
    }

    //donee array4 a un string 
    $certif = implode(", ", $array4);


    for ($i = 0; $i < count($textArray); $i++) {
        if ($textArray[$i] == 'Education : ') {
            $k = $i;
            $j = 0;
            $i++;
            while ($textArray[$i] != " ") {
                for ($x = 0; $x < count($textArray); $x++) {
                    $array5[$j] = explode(" ", $textArray[$i]);
                }
                $mot = $array5[0][0];
                $i++;
                $j++;
                break;
            }
            break;
        }
    }
   
  //  <!--********************************************-->//

?>
<?php 

class cv {
    public $idc;
    public $competence;
    public $experience;
    public $certificat;
    public $diplome;

    public function __construct($competence,$experience,$certificat,$diplome, $idc){
            $this->competence=$competence;
            $this->experience=$experience;
            $this->certificat=$certificat;
            $this->diplome=$diplome;
            $this->idc=$idc;
    }
    public function estValide(){
        return !empty($this->competence)||!empty($this->experience)||!empty($this->certificat)||!empty($this->diplome);
    }

}



//affichage depuit la base de donne//
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

   /* foreach ($cours as $c){
        echo $c['competence'];
        echo $c['ann_exp'];
        echo $c['certificat'];
        echo $c['diplom'];
        echo $c['idc'];
    }*/
    //

$cv1=NULL;
session_start();

if(isset($_POST['submit'])){
    ini_set('display_errors', '0');
    $competence1=$_POST['competances'];
    $experience1=$_POST['experience'];
    $certificat1=$_POST['certificat'];
    $diplome1=$_POST['diplome'];
    $idc1 = $_SESSION['idx'];
    $cv1=new cv($competence1,$experience1,$certificat1, $diplome1,$idc1);
    
    if(!$cv1->estValide()){
        echo "<h1>Verifier les champs</h1>";
    }else {
       $sql="INSERT INTO lire_cv(competence,ann_exp,certificat,diplom,idc) VALUES (:competence,:experience,:certificat,:diplome,:idc)";
       $stmt=$pdo->prepare($sql);
       if($stmt){
        $stmt->bindParam(':idc',$idc1);
        $stmt->bindParam(':competence',$competence1);
        $stmt->bindParam(':experience',$experience1);
        $stmt->bindParam(':certificat',$certificat1);
        $stmt->bindParam(':diplome',$diplome1);

        $stmt->execute();
        if($stmt->rowcount()>0){
            echo "<h1>les donnes sant inseres avec succes</h1>";
        }
        else {
            echo "erreur lors de l'execution de la requete";
        }
        $stmt->closeCursor();

       }
       
    }

}
?>

    <!--********************************************-->
    <section class="home">
    <form method="post"  class="content" action="pdftotext.php">
        <div class="upl">
        <div class="cl1">
        <label for="competances">Competance</label>
        <textarea  cols="30" rows="5"class="form-control" type="textarea"  name="competances"  ><?php echo $copm;?></textarea>
        </div >
        <br><br>
        <div class="cl2">
        <label for="experience">Experience</label>
        <input class="form-control" type="textarea"  name="experience" value="<?php echo $exp;?>">
        </div>
       <br><br>
       <div class="cl3">
       <label for="certificat">Certificat</label>
        <textarea  cols="30" rows="5"class="form-control" type="textarea"  name="certificat" ><?php echo $certif;?></textarea>
       </div>
        <br><br>
        <div class="cl4">
        <label for="diplome">Diplome</label>
        <input class="form-control" type="textarea"  name="diplome" value="<?php echo $mot ; ?>">
        </div>
        <br><br>
        <button type="submit" class="btn btn-primary btn2" name="submit">Confirmer</button>
        </div>
        
    </form> 
</section>
<style>
    *{
        padding:0;
        margin:0;
        font-family: "Poppins", sans-serif;
    }
    body{
        background-image:url(../img/674.jpg);
        background-size: cover;
        background-position: center;
        text-align:center;
    }
    .header{
    position: fixed;
    height: 60px;
    width: 100%;
    
    z-index: 100;
    padding: 0 20px;
}
.nav{
    max-width: 1100px;
    width: 100%;
    margin: 0 auto;
}
.nav,.nav_item{
    display: flex;
    height: 100%;
    align-items: center;
    justify-content: space-between;
    
}
.nav_logo{
    font-size: 25px;
}
.nav_item{
    column-gap: 25px;
}
.linkn:hover{
    color: blue;
}
.nav_logo,.linkn{
    color: white;
}
   .upl{
    text-align:center;
    margin:80px;
    background-color: rgba(255, 255, 255, 0.575);
    width:70%;
    border-radius:5px ;
    border: 2px solid #005af0;
    padding: 80px;
   }
   input {
    border:2px solid gray;
    border-radius:10px;
    height: 40px;
    width:250px;
    font:inherit;
    outline:0;
   }
   h1{
    padding:50px;
   }
   button{
    border:2px solid gray;
    border-radius:10px;
    height: 40px;
    width:150px;
    font:inherit;
    
   }
   button:hover{
    background-color: #005af0;
   }
   textarea:focus,input:focus{
    border: 2px solid #005af0;
   }
   textarea{
    border:2px solid gray;
    border-radius:10px;
    width:250px;
    font:inherit;
    outline:0;
   }
   .cl1,.cl2,.cl3,.cl4{
    display:flex;
    align-items: center;
    justify-content: space-evenly;
   }
   label{
    text-decoration:underline;
   }

</style>

</body>
</html>
