<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    * {

      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'popins', sans-serif;
    }

    body {

      min-height: 500px;
      background-image: url("674.jpg");
      background-size: cover;

    }

    div.test {
      display: flex;
      align-items: center;
      justify-content: center;
    }

    @keyframes fadeIn {
      0% {
        opacity: 0;
      }

      100% {
        opacity: 1;
      }
    }

    section {
      transform: translateY(200px);
      margin-right: 20px;
      max-width: 700px;
      background-color: #fff;
      border: 2px solid rgba(0, 0, 0, 0.5);
      border-radius: 20px;
      padding: 2rem 3rem;
      animation: fadeIn 1s ease-in-out forwards;


    }

    .head {
      color: #fff;
      background: linear-gradient(to right, blue 30%, #fff);
      text-align: left;
      transform: translate(5px);
      padding-left: 5px;
    }

    button {
      width: 40%;
      height: 40px;
      border-radius: 40px;
      background-color: rgb(70, 51, 180);
      ;
      color: #fff;
      border: none;
      outline: none;
      cursor: pointer;
      font-size: 1rem;
      font-weight: 600;
      transition: all 0.4s ease;
      translate: 160px 5px;

    }

    button:hover {
      background-color: blue;
      color: black;
    }
  </style>
</head>

<body>
  <h1 class="head">Easy hire</h1>
  <div class="test">
    <form action="" method="POST">
      <section>
        <h3>Merci pour votre inscription,vos donnés est bien enregistré: <br> </h3><br>

        <button name="retour">retour à l'acceuil</button>
      </section>
    </form>
    <?php
    if (isset($_POST['retour'])) {
      header("location:login.php");
    } ?>
  </div>
</body>

</html>