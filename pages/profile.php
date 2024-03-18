<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css" />
  <title>Profile Candidat</title>
  <link rel="stylesheet" href=" ../css/styleprofile.css" />
  <!-- Fichier CSS externe -->
</head>

<body>
  <header>
    <div class="container">
      <div class="header-content">
        <div class="logo">
          <h4>Easy<span class="span">Hire</span></h4>
        </div>
        <div class="title">
        </div>
        <div class="navigation">
          <form action="./home.php">
            <button class="btn">Accueil</button>
          </form>

        </div>
      </div>
    </div>
  </header>

  <div class="containerr">
    <div class="backgound">
      <div class="profile">
        <img src="uploads/<?php echo $_SESSION['image']; ?>" alt="Photo de profil" />
        <p classe="nom">Nom et Prenom</p>
        <p class="nom">Etudiant à la FST Settat, actuelement en licence</p>
        <form action="./New.php">
          <button class="btn change-photo">Extract CV</button>
        </form>
        <ul class="comptes">
          <a href="https://facebook.com/" target="_black"><img src="../img/icon-insta.png" alt="instag" /></a>
          <a href="https://www.instagram.com/" target="_black"><img src="../img/icon-linkedin.png" alt="LInkedin" /></a>
          <a href="https://twitter.com/?lang=fr" target="_black"><img src="../img/icon-twitter.png" alt="twitter" /></a>
        </ul>
      </div>

      <div class="about-me">
        <h2><span class="underline">Infos :</span></h2>
        <textarea id="aboutMe" placeholder="Décrivez-vous..."></textarea>
      </div>
    </div>

    <div class="hhhh">

      <div class="personal-info">
        <h2><span class="underline">Mes Informations </span></h2>
        <input type="text" id="nom" placeholder="Nom" disabled value="<?php echo $_SESSION['nom']; ?>" />
        <input type="text" id="prenom" placeholder="Prénom" disabled value="<?php echo $_SESSION['prenom']; ?>" />
        <input type="tel" id="telephone" placeholder="Téléphone" disabled
          value="<?php echo $_SESSION['telephone']; ?>" />
        <input type="email" id="email" placeholder="Email" disabled value="<?php echo $_SESSION['email']; ?>" />
        <form action="../pages/zoneCandide.php">
          <button class="BTN">Plus d'info</button>
        </form>
      </div>
      <!--  <div class="other-info">
          <h2><span class="underline">Informations niveau 2 :</span></h2>
          <button id="btnCompetences" class="btn info-btn">Compétences</button><br /><br />
          <button id="btnFormation" class="btn info-btn">Formation</button><br /><br />
          <button id="btnExperiences" class="btn info-btn">Expériences </button><br /><br />



          <label>langues:</label> <br /><br />
          <select id="langues" multiple>
            <option value="francais">Français</option>
            <option value="arabe">Arabe</option>
            <option value="anglais">Anglais</option>
            <option value="espagnol">Espagnol</option>
            <option value="portugais">Portugais</option>
            <option value="allemand">Allemand</option>
            <option value="russe">Russe</option>
            <option value="hindi">Hindi</option>
          </select>
        </div>
        <br /><br />
        <div class="buttons">
          <button class="btn edit-btn">Editer</button>
          <button class="btn save-btn">Enregistrer</button>
        </div>
      </div>

      <div class="center-info">
        <h1>pour affichages des information N2 :</h1>
        <p>clique sur bouton pour visualiser!</p>

         Cette section sera mise à jour dynamiquement avec JavaScript -->

      <!--
      <div class="right">
        <div class="job-suggestions">
          <h2><span class="underline">Suggestions d'emplois!</span></h2>
         Conteneur scrollable pour les offres d'emplois 
          <div class="job-offers">
            Structure de suggestion d'emploi 
            <div class="job-offer">
              <img src="../img/image_recrut.avif" alt="Recruteur" />
              <div>
                <h4>Nom recruteur</h4>
                <p>Description de l'offre</p>
              </div>
            </div>
            <br />

            <div class="job-offer">
              <img src="../img/image_recrut.avif" alt="Recruteur" />
              <div>
                <h4>Nom recruteur</h4>
                <p>Description de l'offre</p>
              </div>
            </div>
            <br />

            <div class="job-offer">
              <img src="../img/image_recrut.avif" alt="Recruteur" />
              <div>
                <h4>Nom recruteur</h4>
                <p>Description de l'offre</p>
              </div>
            </div>
            <br />
          </div>
        </div>
        <br />
        <div class="job-suggestions">
          <h2><span class="underline">Connaissez-vous?!</span></h2>
           Conteneur scrollable pour les offres d'emplois
          <div class="job-offers">
          Structure de suggestion d'emploi 
            <div class="job-offer">
              <img src="../img/image_recrut.avif" alt="Recruteur" />
              <div>
                <h4>Nom</h4>
                <p>Description...</p>
              </div>
            </div>
            <br />

            <div class="job-offer">
              <img src="../img/image_recrut.avif" alt="Recruteur" />
              <div>
                <h4>Nom</h4>
                <p>Description...</p>
              </div>
            </div>
            <br />

            <div class="job-offer">
              <img src="../img/image_recrut.avif" alt="Recruteur" />
              <div>
                <h4>Nom</h4>
                <p>Description...</p>
              </div>
            </div>
            <br />
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="copywrite">
        <p>
        <h3>&copy;2024 EasyHire. Tous droits réservés.</h3>
        </p>
      </div>
    </div>
  </footer>-->

      <script
        src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>

      <script>
        new MultiSelectTag("langues"); // id
      </script>

      <script src=" ../js/Profile.js"></script>
      <style>
        .span {
          color: #007bff;
        }

        .hhhh {
          text-align: center;
          display: flex;
          justify-content: center;
          align-items: center;
        }

        .logo {
          font-size: 20px;
        }

        img {
          border: 2px solid white;
          border-radius: 10px;
        }
      </style>
</body>

</html>