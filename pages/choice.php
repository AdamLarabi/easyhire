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
            background-image: url("../img/674.jpg");
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
            transform: translateY(160px);
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
            width: 30%;
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
            translate: 250px 5px;

        }

        button:hover {
            background-color: blue;
            color: black;
        }

        p {
            font-size: large;
            color: #000000;
            font-family: 'poppins';
        }

        label {
            font-family: 'poppins';
            font-size: 20px;
        }

        input[type="radio"] {
            accent-color: blue;
        }
    </style>
</head>

<body>
    <h1 class="head">Easy hire</h1>
    <div class="test">
        <form action="" method="POST">
            <section>
                <p>Veuillez choisir votre fonctionnalité briévement: <br> </p><br>
                <input type="radio" name="r1" id="1" value="1"><label for="1"> Recruteur</label><br><br>
                <input type="radio" name="r1" id="2" value="2"><label for="2"> Candidat</label><br><br>
                <button type="submit" name="valid">je valide</button>
            </section>
        </form>
    </div>
    <?php
    if (isset($_POST['valid'])) {
        if (isset($_POST['r1'])) {
            $id_input = $_POST['r1'];
            if ($id_input == '1') {
                header("Location: inscriptionRecrut.php");
                exit;
            } else {
                header("location: inscriptionCandidat.php");
                exit;
            }
        } else {

            echo "<pre>     <span style='color: red; font-size:20px;translate:0 100px;'><u>!!!!Veuillez de sélectionner une option.</u></span></pre>";
        }
    }
    ?>


</body>

</html>