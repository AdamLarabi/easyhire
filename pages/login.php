<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../css/style.css">

</head>

<body>
  <h1 class="head">Easy hire</h1>
  <div class="test">
    <form action="" method='POST'>
      <section class="a">
        <h1>login</h1>
        <div class="box">
          <ion-icon name="mail-outline"></ion-icon>
          <input type="email" required name="email" value="<?php if (isset ($_COOKIE['login'])) {
            echo "{$_COOKIE['login']}";
          } ?>">
          <label for="">Email</label>
        </div>
        <div class="box">
          <ion-icon name="lock"></ion-icon>
          <input type="password" required name="password" value="<?php if (isset ($_COOKIE['password'])) {
            echo "{$_COOKIE['password']}";
          } ?>">
          <label for="">password</label>
        </div>
        <div class="forgot">
          <input type="checkbox" id="remember" name="remember" <?php if (isset ($_COOKIE['check'])) {
            echo 'checked';
          } ?>>
          <label for="remember">remember me</label>
        </div>
        <button name="valide">log in</button>

        <div class="r">
          <p>si vous n'avez de compte <a href="choice.php">s'inscrire</a></p>
        </div>

      </section>
    </form>
  </div>

  <?php
  $host = 'localhost';
  $user = 'root';
  $pass = '';
  $db = 'inscription';
  $conn = mysqli_connect($host, $user, $pass, $db);

  if (!$conn) {
    die ("Échec de la connexion : " . mysqli_connect_error());
  }
  session_start();

  if (isset ($_POST['valide'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];


    $stmt = $conn->prepare("SELECT id_log,email,password FROM login WHERE email = ?");

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      //table candidat
      $st1 = $conn->prepare("SELECT * FROM candidat WHERE email = ?");
      $st1->bind_param("s", $email);
      $st1->execute();
      $res1 = $st1->get_result();
      if ($res1->num_rows > 0) {
        $ligne1 = $res1->fetch_assoc();
      }
      //table recruteur
      $st2 = $conn->prepare("SELECT * FROM recruteur WHERE email = ?");
      $st2->bind_param("s", $email);
      $st2->execute();
      $res2 = $st2->get_result();
      if ($res2->num_rows > 0) {
        $ligne2 = $res2->fetch_assoc();
      }
      //back to test
      $id = $row['id_log'];
      if ($password == $row['password'] && $email == $row['email']) {
        if (isset ($_POST['remember']) && $_POST['remember'] === 'on') {
          setcookie('login', $email, time() + (30 * 24 * 3600), "/");
          setcookie('password', $password, time() + (30 * 24 * 3600), "/");
          setcookie('check', "on", time() + (30 * 24 * 3600), "/");
        } else {
          setcookie('login', "", time() - 1, "/");
          setcookie('password', "", time() - 1, "/");
          setcookie('check', "", time() - 1, "/");
        }
        if ($id >= 100000) {//recruteur
          $_SESSION['prenom'] = $ligne2['prenom'];
          $_SESSION['nom'] = $ligne2['nom'];
          $_SESSION['image'] = $ligne2['image'];
          $_SESSION['poste'] = $ligne2['poste'];
          $_SESSION['idx'] = $ligne2['IDR'];
          $_SESSION['image'] = $ligne2['image'];
          header("location:home.php");
          exit();
        } else {//candidat
          $_SESSION['prenom'] = $ligne1['prenom'];
          $_SESSION['nom'] = $ligne1['nom'];
          $_SESSION['image'] = $ligne1['image'];
          $_SESSION['poste'] = $ligne1['poste'];
          $_SESSION['idx'] = $ligne1['idc'];
          $_SESSION['image'] = $ligne1['image'];
          header("location:home.php");
          exit();

        }
      } else {
        echo "<pre>          


        <h3 style='color: red;margin-left:350px;'><u>Utilisateur non trouvé:verifier votre email ou bien le mot de passe!!!!</u></h3></pre>";
      }

    } else {
      echo "<pre>          


  <h3 style='color: red;margin-left:350px;'><u>Utilisateur non trouvé:verifier votre email ou bien le mot de passe!!!!</u></h3></pre>";
    }
  }
  ?>




</body>

</html>