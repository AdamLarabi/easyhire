<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/css/multi-select-tag.css"
    />
    <title>Profile Candidat</title>
    <link rel="stylesheet" href="../css/styleprofile.css" />
    <!-- Fichier CSS externe -->
  </head>
  <body>
    <header>
      <div class="container">
        <div class="header-content">
          <div class="logo">
            <img src="logo.png" alt="Logo" />
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
          <button class="btn change-photo">Editer</button>
          <ul class="comptes">
               <a href=""><img src="../img/icon-insta.png" alt="instag" /></a>
               <a href=""><img src="../img/icon-linkedin.png" alt="LInkedin"/></a>
               <a href=""><img src="../img/icon-twitter.png" alt="twitter" /></a>
          </ul>
        </div>

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
            <textarea id="formation" placeholder="Formation"></textarea
            ><br /><br />
            <textarea id="experiences" placeholder="Expériences"></textarea
            ><br /><br />
            <textarea id="competences" placeholder="Compétences"></textarea
            ><br /><br />
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

        <div class="right">
          <div class="job-suggestions">
            <h2><span class="underline">Suggestions d'emplois!</span></h2>
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
          <br />
          <div class="job-suggestions">
            <h2><span class="underline">Connaissez-vous?!</span></h2>
            <!-- Conteneur scrollable pour les offres d'emplois -->
            <div class="job-offers">
              <!-- Structure de suggestion d'emploi -->
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
          <p><h3>&copy;2024 EasyHire. Tous droits réservés.</h3></p>
        </div>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.1/dist/js/multi-select-tag.js"></script>

    <script>
      new MultiSelectTag("langues"); // id
    </script>
  </body>
</html>
