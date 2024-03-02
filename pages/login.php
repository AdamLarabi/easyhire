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
          <input type="email" required name="email">
          <label for="">Email</label>
        </div>
        <div class="box">
          <ion-icon name="lock"></ion-icon>
          <input type="password" required name="password">
          <label for="">password</label>
        </div>
        <div class="forgot">
          <input type="checkbox" name="" id="">
          <label for="">remember me</label>
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
    die("Échec de la connexion : " . mysqli_connect_error());
  }


  if (isset($_POST['valide'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id_log,email,password FROM login WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
      $row = $result->fetch_assoc();
      $id = $row['id_log'];
      if ($password == $row['password'] && $email == $row['email']) {
        if ($id >= 100000) {
          header("location:home.php");
          exit();
        } else {
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