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
    <h2>CONNEXION</h2> 
        <?php
            $courriel = $_POST['courrielcon'];
            $motdepass = $_POST['motdepasscon'];

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            $stmt = $conn->prepare("SELECT motdepass, role FROM connexion WHERE courriel=?");
            $stmt->bind_param("s", $courriel);
            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($resultM,$resultR);
            $nrows = $stmt->num_rows;
            $stmt->fetch();
            if($nrows == 0){
              echo "le courriel n'exist pas";
            }
            else if($motdepass == $resultM){
                if($resultR == "A"){
                    header("Location: admin.php");
                }
                else{
                    header("Location: membre.php");
                }
            }
            else{
                echo "Mot de pass n'est pas correct";
            }
            $stmt->free_result();
            $stmt->close();
            $conn->close();            
        ?>
    <br>
    <a href="../../index.php">Retour à la page d'accueil</a> 
</body>
</html>