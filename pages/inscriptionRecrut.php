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
                <label for="">Prénom: </label> <label for="" class="ldroite">Nom: </label><br>
                <input type="text" name="Prenom" required size="30" placeholder="prénom"> <input type="text" required
                    name="Nom" class="droite" placeholder="nom"><br><br></br>
                <label for="">date de naissance: </label> <label for="" class="ladresse">Adresse: </label><br>
                <input type="date" name="date" required id="" size="30"> <input type="text" required name="adress"
                    class="droite" placeholder="adresse"><br><br></br>
                <label for="">email: </label> <label for="" class="ltel">Telephone: </label><br>
                <input type="email" required name="email" id="" size="30" placeholder="xemple@gmail.com"> <input
                    type="tel" required name="tele" class="droite" placeholder="06-xx-xx-xx-xx"><br><br></br>
                <label for="">password: </label> <label for="" class="lconf">confirmation de password: </label><br>
                <input type="password" required name="password" id="password" size="30" placeholder="mot de passe">
                <input type="password" id="confirmPassword" required name="conf" class="droite"
                    placeholder="votre mot de passe"><br><br></br>
                <label for="">societé: </label> <label for="" class="ldroite">département: </label><br>
                <input type="text" name="societe" required size="30" placeholder="societé adherée"> <input type="text"
                    required name="depart" class="droite" placeholder="département"><br><br></br>
                <label for="">spécialité: </label> <label for="" class="lposte1">Poste: </label><br>
                <input type="text" name="specia" required size="30" placeholder="votre spécialité"> <input type="text"
                    required name="Poste" class="droite" placeholder="Poste"><br><br></br>
                <button type="reset">annuler</button><label for=""> </label><button type="submit" name="submit"
                    onclick="checkPassword()">enregistrer</button>
            </section>
        </form>
    </div>
    <script>
        function checkPassword() {
            var password = document.getElementById("password").value;
            var confirmPassword = document.getElementById("confirmPassword").value;

            if (password === confirmPassword) {
                alert("Les mots de passe correspondent.");
            } else {
                alert("Les mots de passe ne correspondent pas.");
            }
        }
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


        $query_max_id = "SELECT MAX(IDR) AS max_id FROM recruteur";
        $result_max_id = mysqli_query($conn, $query_max_id);
        $row_max_id = mysqli_fetch_assoc($result_max_id);
        $id = $row_max_id['max_id'] + 1;
        $query_init_id = "select COUNT(*) AS count FROM recruteur";
        $result_init_id = mysqli_query($conn, $query_init_id);
        $row_init_id = mysqli_fetch_assoc($result_init_id);
        if ($row_init_id['count'] == 0) {
            $id = "100000";
        }
        $prenom = mysqli_real_escape_string($conn, $_POST['Prenom']);
        $nom = mysqli_real_escape_string($conn, $_POST['Nom']);
        $daten = mysqli_real_escape_string($conn, $_POST['date']);
        $address = mysqli_real_escape_string($conn, $_POST['adress']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $telep = mysqli_real_escape_string($conn, $_POST['tele']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $conpass = mysqli_real_escape_string($conn, $_POST['conf']);
        $societe = mysqli_real_escape_string($conn, $_POST['societe']);
        $depa = mysqli_real_escape_string($conn, $_POST['depart']);
        $special = mysqli_real_escape_string($conn, $_POST['specia']);
        $pos = mysqli_real_escape_string($conn, $_POST['Poste']);

        $insert1 = "INSERT INTO recruteur VALUES ($id, '$prenom', '$nom', '$daten', '$address', '$email', '$telep', '$password', '$conpass', '$societe', '$depa','$special', '$pos')";
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