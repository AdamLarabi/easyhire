<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile Candidat</title>
  <link rel="stylesheet" href="../css/styleprofile.css" />
  <!-- Fichier CSS externe -->
</head>

<body>
  <header>
    <div class="container">
      <div class="header-content">
        <div class="logo">
          <img src="../img/logo.png" alt="Logo" />
        </div>
        <div class="title">
          <h4>EasyHire</h4>
        </div>
        <div class="navigation">
          <button class="btn">Accueil</button>
          <button class="btn">Gestion Compte</button>
        </div>
      </div>
    </div>
  </header>

  <div class="containerr">
    <div class="backgound">
      <div class="profile">
        <img src="../img/Photo.jpg" alt="Photo de profil" />
        <p classe="nom">Nom et Prenom</p>
        <p class="nom">Etudiant à la FST Settat, actuelement en licence</p>

      </div>
      <form method="POST" action="zoneCandide.php">
        <button class="btn change-photo" name="sub" type="submit">zone de candidature</button>
      </form>

      <div class="about-me">
        <h2><span class="underline">About Me :</span></h2>
        <textarea id="aboutMe" placeholder="Décrivez-vous..."></textarea>
      </div>
    </div>

    <div class="container-main">
      <div class="left">
        <div class="personal-info">
          <h2><span class="underline">Informations niveau1 :</span></h2>
          <input type="text" id="nom" placeholder="Nom" />
          <input type="text" id="prenom" placeholder="Prénom" />
          <input type="tel" id="telephone" placeholder="Téléphone" />
          <input type="email" id="email" placeholder="Email" />
        </div>
        <div class="other-info">
          <h2><span class="underline">Informations niveau 2 :</span></h2>
          <textarea id="formation" placeholder="Formation"></textarea><br /><br />
          <textarea id="experiences" placeholder="Expériences"></textarea><br /><br />
          <textarea id="competences" placeholder="Compétences"></textarea><br /><br />

          <select id="langues" multiple>
            <option value="francais">Français</option>
            <option value="arabes">Arabes</option>
            <option value="anglais">Anglais</option>
          </select>
        </div>
        <br /><br />
        <div class="buttons">
          <button class="btn edit-btn">Editer</button>
          <button class="btn save-btn" name="sube" type=>Enregistrer</button>
        </div>
      </div>

      <div class="right">
        <div class="job-suggestions">
          <h2><span class="underline">Suggestions d'emplois</span></h2>
          <!-- Conteneur scrollable pour les offres d'emplois -->
          <div class="job-offers">
            <!-- Structure de suggestion d'emploi -->
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
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="copywrite">
        <p>&copy; 2024 EasyHire. Tous droits réservés.</p>
        <p class="client">les comptes de notre Candidat :</p>
        <ul class="comptes">
          <a href=""><img src="../img/icon-insta.png" alt="instag"></a>
          <a href=""><img src="../img/icon-linkedin.png" alt="LInkedin"></a>
          <a href=""><img src="../img/icon-twitter.png" alt="twitter"></a>

        </ul>
      </div>
    </div>
  </footer>
</body>

</html>