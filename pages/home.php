<?php
@include 'config.php';

session_start();

$sql = ' SELECT * FROM candidat';
$all = mysqli_query($conn, $sql);

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['commenter'])) {
    header("Location: {$_SERVER['REQUEST_URI']}");
}


//pour stockée les postes dans bd
if (isset($_POST['pub'])) {
    $query_max_id = "SELECT MAX(id_poste) AS max_id FROM poste";
    $result_max_id = mysqli_query($conn, $query_max_id);
    $row_max_id = mysqli_fetch_assoc($result_max_id);
    $id = $row_max_id['max_id'] + 1;
    $nom = $_SESSION['prenom'];
    $prenom = $_SESSION['nom'];
    $com = $nom . ' ' . $prenom;
    $file = $_FILES['image']['name'];
    $textposte = $_POST['textposte'];
    $idx = $_SESSION['idx'];
    $insert = "INSERT INTO poste  VALUES ('$id','$com', '$textposte', '$file', '$idx')";

    $q = mysqli_query($conn, $insert);
    if ($q) {
        $upload_path = "uploads/";
        move_uploaded_file($_FILES['image']['tmp_name'], $upload_path . $file);
    }
}

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
                <div name='mouse-test'>
                    <a href="#" id="parametre"> <i class='bx bxs-cog'></i>Parametre</a>
                    <div id="menu" class="menu">
                        <a href="profile.php">Profil</a>
                        <a href="#">Aide et assistance</a>
                        <a href="#">Donner votre avis</a>
                        <a href="#apres">Se déconnecter</a>
                    </div>
                    <script>
                        var parametre = document.getElementById("parametre");
                        var menu = document.getElementById("menu");
                        parametre.addEventListener("mouseover", toggleMenu);
                        menu.addEventListener("mouseleave", hide);
                        function toggleMenu() {
                            var displayStyle = window.getComputedStyle(menu).getPropertyValue("display");
                            if (displayStyle === "none") {
                                menu.style.display = "block";
                            } else {
                                menu.style.display = "none";
                            }
                        }
                        function hide() {
                            menu.style.display = "none";
                        }
                    </script>
                </div>
            </li>
        </ul>
    </nav>
    <main>
        <section id="Profil">
            <div class="content">
                <div class="project-card">
                    <div class="project-image">
                        <?php
                        $id = $_SESSION['idx'];

                        $req1 = "SELECT image from recruteur where IDR=$id";
                        $q1 = mysqli_query($conn, $req1);
                        $req2 = "SELECT image from candidat where idc=$id";
                        $q2 = mysqli_query($conn, $req2);

                        if (mysqli_num_rows($q1) > 0) {
                            $row_i = mysqli_fetch_assoc($q1);
                            echo "<img src='uploads/" . $row_i['image'] . "' style='width:100%;height:170px;'>";
                        } else if (mysqli_num_rows($q2) > 0) {
                            $row_i = mysqli_fetch_assoc($q2);
                            echo "<image src='uploads/" . $row_i['image'] . "' style='width:100%;height:170px;'>";
                        } else {
                            echo "Aucune image trouvée pour cet utilisateur.";
                        }

                        ?>

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
                        <img name="image" src="<?php echo "uploads/" . $row_i['image'] ?>" />
                    </div>
                    <div id="fenetre" class="fenetre">
                        <div class="fenetre-content">
                            <span class="close" onclick="afficherConfirmation()">x</span>
                            <form action="" method="POST" enctype="multipart/form-data">
                                <textarea id="content" class="area" name="textposte"
                                    placeholder=" De quoi souhaitez-vous discuter"></textarea>
                                <label for="fileInput" class="custom-file-upload">Choisir un fichier</label>
                                <input type="file" id="fileInput" class="fenetre-file" name="image">
                                <button onclick="publishPost()" name="pub" type="submit">Publier</button>
                            </form>
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
                            <img src="<?php echo "uploads/" . $row['image'] ?>" name="bdd_image" alt="">
                        </div>
                        <div class="exp-txt">
                            <h4 name="bdd_nom">
                                <?php echo $row["prenom"] . " " . $row["nom"]; ?>
                            </h4>
                            <p name="bdd_description">
                                <?php echo $row["poste"];
                                ?>
                            </p>
                            <form method="post">
                                <button name="suivre" class="suivre"><i class='bx bx-user-plus'></i>Suivre</button>
                            </form>
                        </div>
                    </div>


                    <?php
                }
                if (isset($_POST['suivre'])) {
                    $follower = $follower = $_SESSION['prenom'] . " " . $_SESSION['nom'];
                    $following = $row["prenom"] . " " . $row["nom"];

                    $sql = "INSERT INTO follow (follower, following) VALUES (?, ?)";

                    $stmt = mysqli_prepare($conn, $sql);

                    mysqli_stmt_bind_param($stmt, "ss", $follower, $following);
                    $result = mysqli_stmt_execute($stmt);
                }
                ?>
                <script>

                    document.querySelectorAll('.suivre').forEach(button => {
                        button.addEventListener('click', function () {
                            this.innerHTML = "<i class='bx bx-check'></i>Suivi"
                            event.preventDefault();
                        });
                    });

                </script>
            </div>
        </section>
    </main>

    <?php

    $req = "SELECT * from poste";
    $q = mysqli_query($conn, $req);
    if (mysqli_num_rows($q) == 0) {

        echo "Aucun résultat trouvé.";
    } else {
        try {

            while ($row = mysqli_fetch_array($q)) {
                $nom_prenom = $row['nom_prenom'];

                $parts = explode(" ", $nom_prenom);

                $prenom = $parts[0];
                $nom = $parts[1];
                $req_image_x_poste = "
                (SELECT image
                FROM poste, candidat
                WHERE prenom='{$prenom}'
                and nom='{$nom}'
                and idX=idc)
                UNION
                (SELECT image
                FROM poste, recruteur
                WHERE prenom='{$prenom}'
                and nom='{$nom}'
                and IDR=idx)
                ";

                $resultat = mysqli_query($conn, $req_image_x_poste);

                if (mysqli_num_rows($resultat) > 0) {
                    $row_YES = mysqli_fetch_assoc($resultat);
                    $image = $row_YES['image'];
                } else {
                    echo "Aucune image trouvée pour ce poste.";
                }
                ?>
                <article>
                    <div class='article'>
                        <div class='art'>
                            <div class='art-img'>
                                <?php echo "<img src='uploads/" . $image . "' style='width:50%;height:8vh; name='post_image''> ";
                                ?>
                            </div>
                            <div class='art-txt'>
                                <h4 name='post_nom'>
                                    <?php echo $row['nom_prenom'] ?>
                                </h4>
                                <p name='post_description'>Developper</p>
                            </div>
                            <div class='etat'>
                                <p>• followed</p>
                                <!-- button de follow -->
                            </div>
                        </div>
                        <div class='art-pub'>
                            <div class='pub-p'>
                                <p name='post_pub_parag'>
                                    <?php echo $row['paragraphe'] ?>
                                </p> <br>
                                <?php echo "<img src='uploads/{$row['document']}' class='my-3' 
                                style='width:400px;height:400px;transform:translateX(20px); position: relative; z-index: -1;'>"; ?>
                            </div>
                        </div>
                        <div class='seperator'>
                        </div>
                        <div class='analytics'>
                            <button id="like" class='data likeBtn'>
                                <i class='bx bx-heart'></i>
                                <span id="likes" class="likes">0</span>
                            </button>
                            <?php $reqqq = $conn->query("SELECT COUNT(*) FROM commentaire WHERE idp = " . $row['id_poste']);
                            $count = $reqqq->fetch_row()[0]; ?>
                            <button class='data'>
                                <i class='bx bx-comment'></i>
                                <span>
                                    <?php echo $count ?>
                                </span>
                            </button>
                        </div>
                        <div class='art-comment '>
                            <div class=' comment'>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                    <?php
                                    $reqq = "SELECT * FROM commentaire WHERE idp = " . $row['id_poste'];
                                    $qq = mysqli_query($conn, $reqq);
                                    while ($roww = mysqli_fetch_array($qq)) {
                                        echo '<div class="commentaire_design"><p>'
                                            . $roww['contenue'] .
                                            '</p></div>';
                                    }
                                    if (isset($_POST['commenter']) && $_POST['post_id'] == $row['id_poste']) {
                                        $comment = mysqli_real_escape_string($conn, $_POST['comment']);
                                        $idx = $_SESSION['idx'];
                                        $idp = $row['id_poste'];
                                        $query_max_id = "SELECT MAX(idc) AS max_id FROM commentaire";
                                        $result_max_id = mysqli_query($conn, $query_max_id);

                                        $row_max_id = mysqli_fetch_assoc($result_max_id);
                                        $id = $row_max_id['max_id'] + 1;

                                        $insert = "INSERT INTO commentaire (idc, idx, contenue, idp) VALUES ('$id','$idx', '$comment', '$idp')";
                                        $qqq = mysqli_query($conn, $insert);

                                        if (!$qqq) {
                                            echo "Erreur lors de l'insertion du commentaire: " . mysqli_error($conn);
                                        } else {
                                            echo '<div>'
                                                . $comment .
                                                '</div>';
                                        }
                                        // $comment = '';
                                    }
                                    ?>
                                    <div class="comment-aux">
                                        <input type='text' placeholder='Ajouter un commentaire' name='comment'>
                                        <input type='hidden' name='post_id' value='<?php echo $row['id_poste']; ?>'>
                                        <button class='data drop-box' name='commenter'>
                                            <i class='bx bxs-send'></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div> <br>
                    </div>
                </article>
                <br>
                <?php
            }
        } catch (Exception $e) {
            echo $e->getMessage();

        }
        // mysqli_close($conn);
    }


    ?>
    <footer>
        <p>&copy; 2024 Easy Hire. All rights reserved.</p>
    </footer>

    <script src=" ../js/home.js"></script>
    <script src=" ../js/Like.js"></script>
</body>

</html>