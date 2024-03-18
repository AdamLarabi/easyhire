<?php
@include 'config.php';

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST['pub'])) {
    header("Location: home.php");
}


$sql = " SELECT * FROM candidat where idc!='{$_SESSION['idx']}'";
$all = mysqli_query($conn, $sql);


//pour stockée les postes dans bd
if (isset ($_POST['pub'])) {
    $nom = $_SESSION['prenom'];
    $prenom = $_SESSION['nom'];
    $com = $nom . ' ' . $prenom;
    $file = $_FILES['image']['name'];
    $textposte = $_POST['textposte'];
    $idx = $_SESSION['idx'];
    $insert = "INSERT INTO poste (nom_prenom, paragraphe, document, idX) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insert);
    mysqli_stmt_bind_param($stmt, "sssi", $com, $textposte, $file, $idx);
    mysqli_stmt_execute($stmt);

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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

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

                    <a href="./home.php" class="x">
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
                        <a href="./login.php">Se déconnecter</a>
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
                <?php
                    if($_SESSION["idx"]>=10000){
                            echo '<button style ="padding:10px; background:#2fa3c79b; border-radius:10px;" border:2px solide #2fa3c79b;;> <a href="view.php" style="color:black;" class="more-details">Dashboard</a></button>';
                        }?>
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
                    $suivi = false; // Par défaut, le candidat n'est pas suivi
                    // Exécutez une requête pour vérifier si le candidat est suivi ou non
                    $sql_suivi = "SELECT * FROM follow WHERE follower = ? AND following = ?";
                    $stmt_suivi = mysqli_prepare($conn, $sql_suivi);
                    $fullnameee = $_SESSION['prenom'] . " " . $_SESSION['nom'];
                    $fullnameee2 = $row["prenom"] . " " . $row["nom"];
                    mysqli_stmt_bind_param($stmt_suivi, "ss", $fullnameee, $fullnameee2);
                    mysqli_stmt_execute($stmt_suivi);
                    $result_suivi = mysqli_stmt_get_result($stmt_suivi);
                    if (mysqli_num_rows($result_suivi) > 0) {
                        $suivi = true; // Le candidat est suivi
                    }
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
                            <form method="get">
                                <button class="suivre" data-idc="<?php echo $row["idc"]; ?>">
                                    <?php if ($suivi) {
                                        echo "<i class='bx bx-user-check'></i>suivi";
                                    } else {
                                        echo "<i class='bx bx-user-plus'>suivre";
                                    }
                                    ?>
                                    </i>

                                </button>
                            </form>
                        </div>
                    </div>
                    <?php
                }

                if (isset ($_GET['idc'])) {
                    $requetee = "SELECT prenom ,nom from candidat where idc={$_GET['idc']}";
                    $q0 = mysqli_query($conn, $requetee);
                    $row0 = mysqli_fetch_assoc($q0);
                    $follower = $_SESSION['prenom'] . " " . $_SESSION['nom'];
                    $following = $row0['prenom'] . " " . $row0['nom'];

                    if (isset ($_GET['suivre']) && $_GET['suivre'] === 'true') {
                        // Si 'suivre' est défini et égal à 'true', insérer l'entrée dans la table 'follow'
                        $sql = "INSERT INTO follow (follower, following) VALUES (?, ?)";
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, "ss", $follower, $following);
                        $result = mysqli_stmt_execute($stmt);
                    } else {
                        // Sinon, si 'suivre' n'est pas défini ou n'est pas égal à 'true', supprimer l'entrée correspondante de la table 'follow'
                        $sql = "DELETE FROM follow WHERE follower = ? AND following = ?";
                        $stmt = mysqli_prepare($conn, $sql);
                        mysqli_stmt_bind_param($stmt, "ss", $follower, $following);
                        $result = mysqli_stmt_execute($stmt);
                    }

                }
                ?>

                <script>
                    document.querySelectorAll('.suivre').forEach(button => {
                        button.addEventListener('click', function (event) {
                            event.preventDefault();
                            var idc = button.getAttribute('data-idc');
                            var suivre = button.innerHTML.includes("suivre");
                            // Envoyer une requête AJAX pour suivre ou arrêter de suivre l'utilisateur en fonction de l'état actuel
                            var xhr = new XMLHttpRequest();
                            xhr.open('GET', 'home.php?idc=' + idc + '&suivre=' + (suivre ? 'true' : 'false'), true);
                            xhr.onreadystatechange = function () {
                                if (xhr.readyState == 4 && xhr.status == 200) {
                                    //console.log(xhr.responseText); // Afficher la réponse du serveur
                                    // Mettre à jour le libellé du bouton en fonction de la réponse
                                    button.innerHTML = suivre ? "<i class='bx bx-user-check'></i>suivi" : "<i class='bx bx-user-plus'>suivre";
                                }
                            };
                            xhr.send();
                        });
                    });
                </script>
            </div>
        </section>
    </main>

    <?php

    $req = "SELECT * from poste order by id_poste desc";
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
                FROM candidat
                WHERE {$row['idX']}=idc)
                UNION
                (SELECT image
                FROM  recruteur
                WHERE IDR={$row['idX']})
                ";

                $req_poste = "
                (SELECT poste
                FROM candidat
                WHERE {$row['idX']}=idc)
                UNION
                (SELECT poste
                FROM  recruteur
                WHERE IDR={$row['idX']})
                ";

                $resultat1 = mysqli_query($conn, $req_image_x_poste);
                $resultat2 = mysqli_query($conn, $req_poste);

                if (mysqli_num_rows($resultat1) > 0) {
                    $row_YES = mysqli_fetch_assoc($resultat1);
                    $image = $row_YES['image'];
                } else {
                    echo "Aucune image trouvée pour ce poste.";
                }

                if (mysqli_num_rows($resultat2) > 0) {
                    $row_poste = mysqli_fetch_assoc($resultat2);
                    $Post = $row_poste['poste'];
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
                                <p name='post_description'>
                                    <?php echo $Post ?>
                                </p>
                            </div>
                            <div class='etat' style="cursor: pointer;">
                                <?php
                                $x_name = $_SESSION['prenom'] . " " . $_SESSION['nom'];
                                $etat_follow = "
                                SELECT COUNT(*) FROM FOLLOW 
                                WHERE follower = '$x_name' 
                                AND following = '{$row['nom_prenom']}'
                                ";
                                $res = mysqli_query($conn, $etat_follow);

                                if ($res) {
                                    $ma_ligne = mysqli_fetch_array($res);
                                    $count = $ma_ligne[0];

                                    if ($count != 0) {
                                        echo "<p class='etat-f'>• Suivi</p>";
                                    } else {
                                        echo "<p class='etat-f'>• Suivre</p>";
                                    }
                                } else {

                                    echo "Erreur dans la requête SQL : " . mysqli_error($conn);
                                }
                                ?>
                                <script>
                                    document.querySelectorAll('.etat-f').forEach(paragraph => {
                                        paragraph.addEventListener("click", function () {
                                            var suivre = paragraph.innerHTML.includes("Suivi");
                                            paragraph.innerHTML = suivre ? "• Suivre" : "• Suivi";
                                            paragraph.focus();
                                        });
                                    });
                                </script>
                            </div>

                            <script>
                                document.querySelectorAll('.discussion').forEach(button => {
                                    button.addEventListener('click', function (event) {
                                        event.preventDefault();
                                        var idposte = button.getAttribute('data-idx');

                                        // Vérifier si idx est défini
                                        if (idposte) {
                                            var xhr = new XMLHttpRequest();
                                            xhr.open('GET', 'home.php?idx=' + idposte, true);
                                            xhr.onreadystatechange = function () {
                                                if (xhr.readyState == 4 && xhr.status == 200) {
                                                    console.log("validee pour le poste avec l'ID : " + idposte); // Afficher la réponse du serveur spécifique au poste
                                                }
                                            };
                                            xhr.send();
                                        } else {
                                            console.log("ID non défini dans l'URL");
                                        }
                                    });
                                });

                            </script>
                            <?php
                            $recepteur = "x";
                            if (isset ($_POST['discuter']) && $_POST['post_Id'] == $row['id_poste']) {
                                $msg = mysqli_real_escape_string($conn, $_POST['textmsg']);
                                $emetteur = $_SESSION['prenom'] . " " . $_SESSION['nom'];
                                $idp = $row['id_poste'];
                                $recepteur = $row['nom_prenom'];
                                $insert = "INSERT INTO messagerie (emetteur, recepteur, msg) VALUES ('$emetteur','$recepteur', '$msg')";
                                $qqq = mysqli_query($conn, $insert);

                                if (!$qqq) {
                                    echo "Erreur lors de l'insertion du commentaire: " . mysqli_error($conn);
                                } else {
                                    echo
                                        "inserted"
                                    ;
                                }
                                // $comment = '';
                            }
                            ?>


                            <div class="fnt">
                                <div class="fnt-cnt">
                                    <span class="close closex">x</span>
                                    <form method="post">
                                        <label for="">
                                            <?php echo $recepteur; ?>
                                        </label>
                                        <textarea class="area" name="textmsg" placeholder=" Ecrire votre msg ici "></textarea>
                                        <button name="discuter" type="submit" data-idx="<?php echo $row["id_poste"]; ?>"
                                            class="discussion">Envoyer</button>
                                        <input type='hidden' name='post_Id' value='<?php echo $row['id_poste']; ?>'>

                                    </form>
                                </div>
                            </div>
                            <main id="span-id">
                                <span nom="span-id">
                                    <button id="offset" name="offset" class='bx bx-paper-plane' onclick=displaywin()></button>
                                </span>
                            </main>
                        </div>
                        <script>
                            // Votre code JavaScript ici
                            var offset = document.getElementById("offset");
                            var fnt = document.querySelector(".fnt");

                            function displaywin() {
                                fnt.style.display = "block";
                            }

                            offset.addEventListener("click", displaywin);

                            var close = document.querySelector(".closex");
                            close.addEventListener("click", function () {
                                fnt.style.display = "none";
                            });
                        </script>

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
                                <i class='bx bx-comment xx'></i>
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
                                    if (isset ($_POST['commenter']) && $_POST['post_id'] == $row['id_poste']) {
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
    <script>
    // Sélection du bouton par son ID
    

    // Ajout d'un écouteur d'événement pour le clic sur le bouton
    function buttooon() {
        // Redirection vers la page souhaitée (remplacez "nouvelle_page.html" par l'URL de votre page de tableau de bord)
        window.location.href = "view.php";
    };
</script>
    <script src=" ../js/home.js"></script>
    <script src=" ../js/Like.js"></script>
</body>

</html>