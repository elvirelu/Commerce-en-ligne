<?php
    require_once('../includes/dbcon.inc.php');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemple</title>
    <link rel="stylesheet" href="../client/utilitaires/bootstrap-5.3.0-alpha1-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../client/css/style.css">
    <script src="../client/utilitaires/jquery-3.6.3.min.js"></script>
    <script src="../client/utilitaires/bootstrap-5.3.0-alpha1-dist/js/bootstrap.min.js"></script>
    <script src="../client/js/global.js"></script>
</head>
<body>
    <h2>ENREGISTREMENT D'UN MEMBRE</h2> 
        <?php
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $courriel = $_POST['courriel'];
            $motdepass = $_POST['motdepass'];
            $sexe = $_POST['sexe'];
            $daten = $_POST['daten'];

            $role = "M";
            $staut = "A";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $stmt = $conn->prepare("INSERT INTO membres VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $nom, $prenom, $courriel, $sexe, $daten);
            $stmt->execute();
            $stmt->close();

            $stmt = $conn->prepare("INSERT INTO connexion VALUES (?, ?, ?, ?)");
            $stmt->bind_param("ssss", $courriel, $motdepass, $role, $staut);
            $stmt->execute();
            $stmt->close();

            $conn->close();
            echo "<h3>Vous êtes bien enregistré</h3>";
        ?>
    <br>
    <a href="../../index.php">Retour à la page d'accueil</a> 
</body>
</html>