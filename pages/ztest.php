<!DOCTYPE html>
<html>

<head>
    <title>Ajouter un candidat</title>
</head>

<body>
    <h2>Formulaire pour ajouter un candidat</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom"><br><br>

        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom"><br><br>

        <label for="poste">Poste :</label>
        <input type="text" id="poste" name="poste"><br><br>

        <label for="image">Image :</label>
        <input type="file" id="image" name="image"><br><br>

        <input type="submit" value="Ajouter">
    </form>
</body>

</html>

<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les valeurs du formulaire
    $prenom = $_POST["prenom"];
    $nom = $_POST["nom"];
    $poste = $_POST["poste"];

    // Vérifier si un fichier a été téléchargé
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        // Récupérer les informations sur le fichier
        $image_name = $_FILES["image"]["name"];
        $image_tmp_name = $_FILES["image"]["tmp_name"];

        // Déplacer le fichier téléchargé vers le répertoire de destination
        move_uploaded_file($image_tmp_name, "uploads/" . $image_name);

        // Connexion à la base de données
        $conn = new mysqli("localhost", "root", "", "inscription");

        // Vérifier la connexion
        if ($conn->connect_error) {
            die("Erreur de connexion à la base de données : " . $conn->connect_error);
        }

        // Préparer la requête SQL
        $sql = "INSERT INTO candidat (prenom, nom, poste, image) VALUES (?, ?, ?, ?)";

        // Préparer la déclaration SQL
        $stmt = $conn->prepare($sql);

        // Lier les paramètres
        $stmt->bind_param("ssss", $prenom, $nom, $poste, $image_name);

        // Exécuter la requête
        if ($stmt->execute()) {
            echo "Candidat ajouté avec succès.";
        } else {
            echo "Erreur lors de l'ajout du candidat : " . $conn->error;
        }

        // Fermer la connexion
        $stmt->close();
        $conn->close();
    } else {
        echo "Veuillez sélectionner une image.";
    }
}
?>