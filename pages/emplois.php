<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style6.css">
    <script src="https://kit.fontawesome.com/1eff5ac3a2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <header id="header" class="header_box_shadow">
        <nav class="nav_bar_profil">
            <div class="logo_search_bar">
                <h2>Eazy.he</h2>
                <div class="search_bar">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input class="search_bar_input" type="text" placeholder="Recherche">
                </div>
            </div>
            <div class="icons_bar_profils job_icons_bar_profile">
                <ul class="icons_links_profil job_icons_links_nav ">
                    <li class="icon_link home_icon"><a href="index.html"><i class="fa-solid fa-house"></i>
                            <p>Accueil</p>
                        </a></li>
                    <li class="icon_link"><a href="reseaux.html"><i class="fa-solid fa-user-group"></i><span>
                                <p>Reseaux</p>
                            </span></a></li>
                    <li class="icon_link  after_element"><a href="emplois.html"><i
                                class="fa-solid fa-briefcase"></i><span>
                                <p>Emplois</p>
                            </span></a></li>
                    <li class="icon_link"><a href="messagerie.html"><i class="fa-solid fa-comment-dots"></i><span>
                                <p>Messagerie</p>
                            </span></a></li>
                    <li class="icon_link  "><a href="notification.html"><i class="fa-solid fa-bell"></i><span>
                                <p>Notifications</p>
                            </span></a></li>
                    <li class="icon_link me" id="profil_button">
                        <a href="#" id="link_ckeck_pro"><img id="my_profil" src="../img/alae linekdin.png" alt=""><span>
                                <p>Vous<i class="fa-solid fa-caret-down"></i></p>
                            </span></a>
                        <div class="profil_link" id="menu_profil">
                            <div class="profil_name_job">
                                <img class="post_photo_profil" src="../img/alae linekdin.png" alt="#">
                                <div class="name_and_job">
                                    <h2>alae ghnia</h2>
                                    <p>Genie informatique</p>
                                </div>
                            </div>
                            <div class="see_my_profil"><a href="profile.php">Voir le profil </a></div>
                            <div class="account">
                                <h4>Compte</h4>
                                <p><a href="#">Passer à Premium</a></p>
                                <p class="option"><a href="#">Préférence et confidentialité </a></p>
                                <p class="option"><a href="#">Aide</a></p>
                                <p class="option"><a href="#">Langue</a></p>
                            </div>
                            <div class="account">
                                <h4>Gérer</h4>
                                <p><a href="#">Poste et activité</a></p>
                                <p class="option"><a href="#">Compte offre d'emplois</a></p>
                            </div>
                            <div class="log_out">
                                <p>Déconnexion</p>
                            </div>
                        </div>
                    </li>
                </ul>

                <ul id="second_icons_links_nav">
                    <li class="grid_products"><a href="#"><img class="grid_icons" src="./css/images/grid.png" alt="#">
                            <span>
                                <P id="product_header_text">Produits <i class="fa-solid fa-caret-down"></i></P>
                            </span></a></li>

                    <li class="new_job_plus"><a href="#"><i class="fa-solid fa-circle-plus"></i><span>
                                <P>Publier une offre d'emploi</P>
                            </span><span class="responsive_text_job_header">Publier une offre <br> d'emploi</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main class="job_page">
        <section class="left_job_container">
            <div class="left_job_div">
                <p><i class="fa-solid fa-bookmark"></i><a href="#">Mes offres d"emplois</a></p>
                <p><i class="fa-solid fa-bell"></i><a href="#">Alertes Emplois</a></p>
                <p><i class="fa-solid fa-money-bill"></i><a href="#">Salaire</a></p>
                <p><i class="fa-solid fa-clipboard"></i><a href="#">Évaluations des compétences</a></p>
                <p><i class="fa-brands fa-youtube"></i><a href="#">Conseils pour les personnes en recherche de poste</a>
                </p>
                <p><i class="fa-solid fa-gear"></i><a href="#">Préférences de candidature</a></p>
            </div>
            <div class="add_job"> <i class="fa-solid fa-file-pen"></i><a href="#">Publier une offre <br> d’emploi
                    gratuite</a>
            </div>
        </section>

        <!-- ------------center box--------------- -->
        <section class="center_job_container">
            <div class="left_job_div responsive_box_job">
                <p><i class="fa-solid fa-bookmark"></i><a href="#">Mes offres d"emplois</a></p>
            </div>

            <div class="preview_job_search">
                <h2>Recherches d’emplois récentes <span>Effacer</span></h2>
                <p>Stagiaire développeur web <span>(21 nouvelle)</span> <br> <span class="country_name">Morocco</span>
                </p>
                <p>Stagiaire en développement Web<span>(2 nouvelle(s))</span> <br><span
                        class="country_name">Algerie</span> </p>
                <p>stagiaire front end <span>(13 nouvelle(s))</span><br><span class="country_name">France</span> </p>
            </div>
            <div class="see_more_job">
                <p>Voir plus <i class="fa-solid fa-angle-down"></i></p>
            </div>

            <div class="job_oportunity first_oportunity">
                <h2>Opportunités en télétravail</h2>
                <p>Parce que vous avez manifesté votre intérêt pour le télétravail</p>
                <div class="company_job">
                    <img class="company_job_photo" src="../img/js logo2.png" alt="#">
                    <div class="job_description">
                        <h6><a href="#">Dev coding intern</a> </h6>
                        <p><a href="#">Senior Dev </a> <br>
                            Casa</p>
                        <div class="photo_pro_text">
                            <i class="fa-solid fa-bullseye"></i>
                            <p>Votre profil correspond à cette offre</p>
                        </div>
                        <span> il y a 6 heures</span>
                    </div>
                    <i class="fa-solid fa-eye-slash"></i>
                    <i class="fa-solid fa-bookmark"></i>
                </div>
            </div>

            <div class="job_oportunity">
                <div class="company_job">
                    <img class="company_job_photo" src="../img/js image.png" alt="#">
                    <div class="job_description">
                        <h6><a href="#">Product Design (UX/UI) <br> 2024 (fev) </a> </h6>
                        <p><a href="#">Chef </a> <br>
                            Rabat, </p>
                        <div class="photo_pro_text">
                            <i class="fa-solid fa-bullseye"></i>
                            <p> Votre profil correspond à cette offre</p>
                        </div>
                        <span> il y a 8 heures</span>
                    </div>
                    <i class="fa-solid fa-eye-slash"></i>
                    <i class="fa-solid fa-bookmark"></i>
                </div>
            </div>

            <div class="job_oportunity">
                <div class="company_job">
                    <img class="company_job_photo" src="../img/logo2.png" alt="#">
                    <div class="job_description">
                        <h6><a href="#">Dev Mobile</a> </h6>
                        <p><a href="#">Dev Inc.</a> <br> Fes, ON (À distance)</p>
                        <div class="photo_pro_text">
                            <i class="fa-solid fa-bullseye"></i>
                            <p>Votre profil correspond à cette offre</p>
                        </div>
                        <span> il y a 10 heures</span>
                    </div>
                    <i class="fa-solid fa-eye-slash"></i>
                    <i class="fa-solid fa-bookmark"></i>
                </div>
            </div>

            <div class="job_oportunity">
                <div class="company_job">
                    <img class="company_job_photo" src="../img/logo2.png" alt="#">
                    <div class="job_description">
                        <h6><a href="#">Linux/Unix</a> </h6>
                        <p><a href="#">GNU.INC </a> <br>
                            Settat,</p>
                        <div class="photo_pro_text">
                            <i class="fa-solid fa-bullseye"></i>
                            <p> Votre profil correspond à cette offre</p>
                        </div>
                        <span> il y a 12 heures</span>
                    </div>
                    <i class="fa-solid fa-eye-slash"></i>
                    <i class="fa-solid fa-bookmark"></i>
                </div>
            </div>
            <div class="see_more_job">
                <p>Tout voir </p>
            </div>
        </section>


        <!-- ------------right box--------------- -->

        <section class="right_job_container">
            <aside class="pub_img_text">
                <div class="all_links">
                    <a href="#"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos asperiores numquam
                        distinctio saepe voluptatibus expedita iure dicta at, repellendus eligendi? </a><br>
                    <span>ALAE GHNIA © 2024</span>
                </div>
            </aside>
        </section>
    </main>
</body>

</html>