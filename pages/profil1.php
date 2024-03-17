<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/home.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
<nav>
        <header>
            <h1>Easy Hire</h1>
            <input type="search" id="search" name="search" placeholder="Recherche">
            <button type="submit"><i class='bx bx-search-alt-2'></i></button>
        </header>
        <ul>
            <li>
                <div>

                    <a href="./home.php" class="x">
                        <i class='bx bxs-home'></i>
                        Acceuil
                    </a>
                </div>
            </li>
            <li>
                <div>

                    <a href="#res"><i class='bx bx-male-female'></i>Reseau</a>
                </div>
            </li>
            <li>
                <div>

                    <a href="emplois.php"><i class='bx bxs-briefcase'></i>Offre d'emplois</a>
                </div>
            </li>
            <li>
                <div>

                    <a href="#msg"><i class='bx bxs-chat'></i>Messagerie</a>
                </div>
            </li>
            <li>
                <div>

                    <a href="#notif"><i class='bx bxs-bell'></i>Notification</a>
                </div>
            </li>
            <li>
                <div name='mouse-test'>
                    <a href="#" id="parametre"> <i class='bx bxs-cog'></i>Parametre</a>
                    <div id="menu" class="menu">
                        <a href="profil1.php">Profil</a>
                        <a href="#">Aide et assistance</a>
                        <a href="#">Donner votre avis</a>
                        <a href="./login.php">Se déconnecter</a>
                    </div>
                    <script>
                        var parametre = document.getElementById("parametre");
                        var menu = document.getElementById("menu");
                        parametre.addEventListener("mouseover", toggleMenu);
                        menu.addEventListener("mouseleave", hide);
                        function toggleMenu() {
                            var displayStyle = window.getComputedStyle(menu).getPropertyValue("display");
                            if (displayStyle === "none") {
                                menu.style.display = "block";
                            } else {
                                menu.style.display = "none";
                            }
                        }
                        function hide() {
                            menu.style.display = "none";
                        }
                    </script>
                </div>
            </li>
        </ul>
    </nav>
      <main>
        
      </main>

                       
</body>
</html>