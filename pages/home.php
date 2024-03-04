<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'inscription';
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Échec de la connexion : " . mysqli_connect_error());
}
session_start();

$sql = ' SELECT * FROM candidat';
$all = mysqli_query($conn, $sql);
?>
<?php
//pour stockée les postes dans bd
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'inscription';
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("La connexion a échoué : " . mysqli_connect_error());
}

if(isset($_POST['pub'])) {
    $query_max_id = "SELECT MAX(id_poste) AS max_id FROM poste";
        $result_max_id = mysqli_query($conn, $query_max_id);
        $row_max_id = mysqli_fetch_assoc($result_max_id);
        $id = $row_max_id['max_id'] + 1;
    $nom = $_SESSION['prenom'] ;
    $prenom=$_SESSION['nom'];
    $com=$nom.''.$prenom;
    $file=$_FILES['image']['name'];
    $textposte = $_POST['textposte'];
    $insert = "INSERT INTO poste  VALUES ('$id','$com', '$textposte', '$file')";

    $q=mysqli_query($conn,$insert);
    if($q) {
       $upload_path = "uploads/"; 
        move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . $file);
    }
}mysqli_close($conn);   

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Easy Hire</title>
    <link rel="stylesheet" href="../css/home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <nav>
        <header>
            <h1>Easy Hire</h1>
            <input type="search" id="search" name="search" placeholder="Recherche">
            <button type="submit"><i class='bx bx-search-alt-2'></i></button>
        </header>
        <ul>
            <li>
                <div>

                    <a href="#ac" class="x">
                        <i class='bx bxs-home'></i>
                        Acceuil
                    </a>
                </div>
            </li>
            <li>
                <div>

                    <a href="#res"><i class='bx bx-male-female'></i>Reseau</a>
                </div>
            </li>
            <li>
                <div>

                    <a href="emplois.php"><i class='bx bxs-briefcase'></i>Offre d'emplois</a>
                </div>
            </li>
            <li>
                <div>

                    <a href="#msg"><i class='bx bxs-chat'></i>Messagerie</a>
                </div>
            </li>
            <li>
                <div>

                    <a href="#notif"><i class='bx bxs-bell'></i>Notification</a>
                </div>
            </li>
            <li>
                <div>

                    <a href="#para"><i class='bx bxs-cog'></i>Parametre</a>
                </div>
            </li>
        </ul>
    </nav>
    <main>
        <section id="Profil">
            <div class="content">
                <div class="project-card">
                    <div class="project-image">
                        <img name="image" src="<?php echo $_SESSION['image'] ?>" />
                    </div>
                    <div class="project-info">
                        <p class="project-category" name="nom">
                            <?php echo $_SESSION['prenom'] . " " . $_SESSION['nom'] ?>
                        </p>
                        <strong class="project-title">
                            <span name="description">
                                <?php echo $_SESSION['poste'] ?>
                            </span>
                            <br>
                            <a href="profile.php" class="more-details">Voir profile</a>
                        </strong>
                    </div>
                </div>
        </section>

        <section id="publication">
            <div class="publication-container">
                <div class="publication-post">
                    <div class="publication-image">
                        <img name="image" src="<?php $_SESSION['image'] ?>" />
                    </div>
                    <div id="fenetre" class="fenetre">
                        <div class="fenetre-content">
                            <span class="close" onclick="afficherConfirmation()">x</span>
                            <textarea id="content" class="area"
                                placeholder=" De quoi souhaitez-vous discuter"></textarea>
                            <label for="fileInput" class="custom-file-upload">Choisir un fichier</label>
                            <input type="file" id="fileInput" class="fenetre-file">
                            <button onclick="publishPost()">Publier</button>
                        </div>
                    </div>
                    <div id="confirmationModal" class=" abandonner">
                        <div class="abandonner-content">
                            <p>Êtes-vous sûr de vouloir abandonner ?</p>
                            <button class="fenetre-abandonner" onclick="abandonner()">Abandonner</button>
                            <button onclick="continuer()">Continuer</button>
                        </div>
                    </div>
                    <div>
                        <input type="text" placeholder="commencer un post" name="poste" onclick="openModal()">
                    </div>
                </div>
                <div class="publication-plus">
                    <ul>
                        <li>
                            <div>
                                <a href="#ac" class="x">
                                    <i class='bx bxs-image'>Media</i>
                                    <!-- <input type="file" name="" id=""> -->
                                </a>
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#res"><i class='bx bxs-calendar'>Events</i></a>
                                <!-- <input type="date" name="" id=""> -->
                            </div>
                        </li>
                        <li>
                            <div>
                                <a href="#" onclick="openModal();"><i class='bx bxs-edit-alt'>Poster</i></a>
                                <!-- ouvrir une petite fentre pour poster -->
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section id="experience">
            <div class="add">
                <h2>Ajouter a votre fil d'actualites :</h2>
                <?php
                while ($row = mysqli_fetch_assoc($all)) {
                    ?>

                    <div class="add-exp">
                        <div class="exp-img">
                            <img src="<?php echo $row["image"]; ?>" name="bdd_image" alt="">
                        </div>
                        <div class="exp-txt">
                            <h4 name="bdd_nom">
                                <?php echo $row["prenom"] . " " . $row["nom"]; ?>
                            </h4>
                            <p name="bdd_description">
                                <?php echo $row["poste"];
                                ?>
                            </p>
                            <button name="suivre"><i class='bx bx-user-plus'></i>Suivre</button>
                        </div>
                    </div>

                    <?php
                }
                ?>
            </div>
        </section>
    </main>



    <?php
   if(isset($_POST['pub'])){
 $host = 'localhost';
$user = 'root';
$pass = '';
$db = 'inscription';
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("La connexion a échoué : " . mysqli_connect_error());
}
$req="SELECT * from poste";
$q=mysqli_query($conn,$req);
if (mysqli_num_rows($q) == 0) {
    
    echo "Aucun résultat trouvé.";
} else {
    
while ($row = mysqli_fetch_array($q)){
   
    echo " <article>
    <div class='article'>
        <div class='art'>
            <div class='art-img'>
                <img src=' ../img/icon.png' alt='image of ppl' name='post_image'>
            </div>
            <div class='art-txt'>
                <h4 name='post_nom'>Adam Larabi</h4>
                <p name='post_description'>Developper</p>
            </div>
            <div class='etat'>
                <p>• followed</p>
                <!-- button de follow -->
            </div>
        </div>
        <div class='art-pub'>
            <div class='pub-p'>
            <p name='post_pub_parag'>" . $row['post'] . "</p> <br>
            <img src='uploads/".$row['image']."' class='my-3' style='width:400px;height:400px;transform:translateX(20px);'>
            </div>
            </div>
            <div class='seperator'>
            </div>
            <div class='analytics'>
                <button class='data'>
                    <i class='bx bx-heart'></i>
                    <span>2,5K</span>
                </button>
                <button class='data'>
                    <i class='bx bx-comment'></i>
                    <span>1224</span>
                </button>
                <button class='data'>
                    <i class='bx bx-share'></i>
                    <span>111</span>
                </button>
            </div>
            <div class='art-comment '>
                <div class=' comment'>
                    
                    <div>
                        <input type='text' placeholder='Ajouter un commentaire'>
                    </div>
                </div>
                <div class='comment-plus'>
                    <ul>
                        <li>
                            <div>
                                <a href='#ac' class='icon'>
                                    <i class='bx bxs-image'></i>
                                </a>
                            </div>
                        </li>
                        <li>
                            <div class='icon'>
                                <a href='#res'><i class='bx bxs-smile'></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div> <br> <br>
        </div>
                </article>";
} }
mysqli_close($conn);
   }
?>
    <!-- <form action="" method="POST"> <button class="btn save-btn" name="sube">Enregistrer</button></form>
    <?php
    /*if (isset($_POST['sube'])) {
        header("location:home.php");
    }*/
    ?> -->
    <footer>
        <p>&copy; 2024 Easy Hire. All rights reserved.</p>
    </footer>

    <script src="../js/home.js"></script>
</body>

</html>