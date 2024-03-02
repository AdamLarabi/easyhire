<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style2.css">
    <title>Document</title>
</head>

<body>
    <h1 class="head">Easy hire</h1>
    <div class="test">
        <form action="" method="POST">
            <section class="se1">
                <h2><u>information personnel:</u></h2><br><br>
                <div><label for="">Prénom: </label> <label for="" class="ldroite">Nom: </label><br>
                    <div> <input type="text" name="Prenom" required size="30" placeholder="prénom"> <input type="text"
                            required name="Nom" class="droite" placeholder="nom"></div> <br><br></br>
                    <div> <label for="">date de naissance: </label> <label for="" class="ladresse">Adresse: </label>
                    </div><br>
                    <div> <input type="date" name="date" required id="" size="30"> <input type="text" required
                            name="adress" class="droite" placeholder="adresse"></div><br><br></br>
                    <div><label for="">email: </label> <label for="" class="ltel">Telephone: </label></div><br>
                    <div> <input type="email" name="email" required id="" size="30" placeholder="xemple@gmail.com">
                        <input type="tel" required name="tele" class="droite" placeholder="06-xx-xx-xx-xx">
                    </div>
                    <br><br></br>
                    <div> <label for="">password: </label> <label for="" class="lconf">confirmation de password:
                        </label></div><br>
                    <div> <input type="password" name="password" required id="password" size="30"
                            placeholder="mot de passe"> <input type="password" required id="confirmPassword" name="conf"
                            class="droite" placeholder="votre mot de passe"></div><br><br></br>
                    <div> <label for="">diplome: </label> <label for="" class="ldroite">Année d'obtention: </label>
                    </div><br>
                    <div> <input type="text" name="diplome" id="" size="30" required placeholder="votre diplome"> <input
                            type="text" required name="ann" class="droite" placeholder="Année"></div><br><br></br>
                    <div> <label for="">département: </label> <label for="" class="lposte">Poste: </label></div><br>
                    <div> <input type="text" name="depar" required size="30" placeholder="département"> <input
                            type="text" required name="Poste" class="droite" placeholder="Poste"></div><br><br></br>
                    <div> <button type="reset">annuler</button><label for=""> </label><button type="submit"
                            onclick="checkPassword()" name="submit">enregistrer</button></div>
            </section>
        </form>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            function checkPassword() {
                var password = document.getElementById("password").value;
                var confirmPassword = document.getElementById("confirmPassword").value;

                if (password === confirmPassword) {

                } else {
                    alert("Les mots de passe ne correspondent pas.");
                    event.preventDefault();
                }
            }
        })
    </script>
    <?php


    if (isset($_POST['submit'])) {
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'inscription';
        $conn = mysqli_connect($host, $user, $pass, $db);

        if (!$conn) {
            die("Échec de la connexion : " . mysqli_connect_error());
        }

        $query_max_id = "SELECT MAX(idc) AS max_id FROM candidat";
        $result_max_id = mysqli_query($conn, $query_max_id);
        $row_max_id = mysqli_fetch_assoc($result_max_id);
        $id = $row_max_id['max_id'] + 1;

        $prenom = mysqli_real_escape_string($conn, $_POST['Prenom']);
        $nom = mysqli_real_escape_string($conn, $_POST['Nom']);
        $daten = mysqli_real_escape_string($conn, $_POST['date']);
        $address = mysqli_real_escape_string($conn, $_POST['adress']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $telep = mysqli_real_escape_string($conn, $_POST['tele']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $conpass = mysqli_real_escape_string($conn, $_POST['conf']);
        $an = mysqli_real_escape_string($conn, $_POST['ann']);
        $diplome = mysqli_real_escape_string($conn, $_POST['diplome']);
        $depa = mysqli_real_escape_string($conn, $_POST['depar']);
        $pos = mysqli_real_escape_string($conn, $_POST['Poste']);

        $insert1 = "INSERT INTO candidat VALUES ($id, '$prenom', '$nom', '$daten', '$address', '$email', '$telep', '$password', '$conpass', '$an', '$diplome', '$depa', '$pos')";
        $q = mysqli_query($conn, $insert1);
        if ($q) {
            header("location:valideInscript.php");
        } else {
            echo "<pre>          


    <h3 style='color: red;margin-left:350px;'><u>probléme détecté:svp vérifier vos champs!!!!</u></h3></pre>";
        }
        $insert2 = "INSERT INTO login VALUES ($id,'$email','$password')";
        $qu = mysqli_query($conn, $insert2);

        mysqli_close($conn);
    }
    ?>


</body>

</html>