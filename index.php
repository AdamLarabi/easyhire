<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emploi</title>
    <link rel="stylesheet" href="css/Accueil.css">
</head>

<body>
    <header>
        <ul>
            <li>
                <h1>Easy.<span>hire</span></h1>
            </li>
            <li>
                <form action="">
                    <input name="submit" type="submit" value="Se connecter" style="cursor:pointer;" />
            </li>
            </form>
        </ul>
    </header>
    <section class="page1">
        <section class="titre">
            <div>
                <h1>Trouvez les meilleurs offres d'emploi qui vous corresponde</h1>
            </div>
        </section>
        <section class="container">
            <div>
                <button><img src="img/icon-ent.jpeg" alt="Entreprise" height="50"><b>Entreprise</b></button>
            </div>
            <div>
                <button><img src="img/icon-emp.jpeg" alt="Employer" height="50"><b>Employer</b></button>
            </div>
        </section>
    </section>
    <section class="page2">
        <h2>Entreprise recrutant maintenant</h2>
        <section class="container1">
            <div>
                <img src="img/icon-Adria.png" height="60" width="70" alt="Adria">
                <br>
                <button>S'abonner</button>
                <h4>Adria</h4>
            </div>
            <div>
                <img src="img/icon-anapec.png" height="60" alt="Anapec">
                <br>
                <button>S'abonner</button>
                <h4>Anapec</h4>
            </div>
            <div>
                <img src="img/icon-cih.png" height="60" alt="CIH Bank">
                <br>
                <button>S'abonner</button>
                <h4>CIH Bank</h4>
            </div>
            <div>
                <img src="img/icon-Hps.png" height="60" width="70" alt="HPS">
                <br>
                <button>S'abonner</button>
                <h4>HPS</h4>
            </div>
            <div>
                <img src="img/icon-Maroc-telecom.png" height="60" alt="Maroc Telecom">
                <br>
                <button>S'abonner</button>
                <h4>Maroc Telecom</h4>
            </div>
            <div>
                <img src="img/icon-orange.png" height="60" alt="Orange">
                <br>
                <button>S'abonner</button>
                <h4>Orange</h4>
            </div>
        </section>
    </section>
    <section class="page3">
        <h2>Comment cela apere-t-il?</h2>
        <section class="container2">
            <div>
                <img src="img/image-sinscrire.png" alt="s'inscrire" height="180">
                <h3>Incrivez vous et chargez votre CV seulement une fois</h3>
            </div>
            <div>
                <img src="img/icon-suivie.jpeg" alt="suivie" height="180">
                <h3>suivez tous les entreprise qui vous interesse</h3>
            </div>
            <div>
                <img src="img/icon-contacter.png" alt="contacter" height="180">
                <h3>contactez les RH d'une manière facile</h3>
            </div>
        </section>
    </section>
    <footer>
        <h3>suivez nous</h3>
        <section class="container3">
            <img src="img/icon-facebook.png" alt="facebook-icon" height="30">
            <img src="img/icon-insta.png" alt="instagram-icon" height="30">
            <img src="img/icon-twitter.png" alt="twitter-icon" height="30">
            <img src="img/icon-linkedin.png" alt="linkedin-icon" height="30">
        </section>
        <p>&copy copyright 2024 Easyhire.Tous les drois reservez.</p>
    </footer>
</body>

</html>
<?php
if (isset($_GET['submit'])) {
    header("location:pages/login.php");
}