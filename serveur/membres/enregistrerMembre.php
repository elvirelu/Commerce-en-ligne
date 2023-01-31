<?php
    require_once('../includes/dbcon.inc.php');

    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $courriel = $_POST['courriel'];
    $motdepass = $_POST['motdepass'];
    $sexe = $_POST['sexe'];
    $daten = $_POST['daten'];

    $dossier="photos/";
    $photo="avatar.jpg";
    if($_FILES['photo']['tmp_name']!==""){
        $nomPhoto=sha1($nom.time());
        //Upload de la photo
        $tmp = $_FILES['photo']['tmp_name'];
        $fichier= $_FILES['photo']['name'];
        $extension=strrchr($fichier,'.');
        @move_uploaded_file($tmp,$dossier.$nomPhoto.$extension);
        // Enlever le fichier temporaire chargé
        @unlink($tmp); //effacer le fichier temporaire
        $photo=$nomPhoto.$extension;
    }

    $stmt = $conn->prepare("SELECT courriel FROM membres WHERE courriel=?");
    $stmt->bind_param("s", $courriel);
    $stmt->execute();
    // $stmt->store_result();
    // $stmt->bind_result($result);
    // $nrows = $stmt->num_rows;
    // if($nrows != 0){
    //     $msg = "Courriel $courriel exist";
    //     header('Location: ../../index.php?msg='.$msg);
    //     exit; 
    // }
    $result = $stmt->get_result();
	if($ligne = $result->fetch_object()){
        mysqli_close($conn);
        $msg = "Courriel $courriel exist";
        header('Location: ../../index.php?msg='.$msg);
        exit;
    }
    else{
        $stmt = $conn->prepare("INSERT INTO membres VALUES (0, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $nom, $prenom, $courriel, $sexe, $daten, $photo);
        $stmt->execute();
        $idm = $conn->insert_id;
        $stmt->close();

        $stmt = $conn->prepare("INSERT INTO connexion VALUES (?, ?, ?, 'M', 'A')");
        $stmt->bind_param("iss", $idm, $courriel, $motdepass);
        $stmt->execute();
        $stmt->close();
        $conn->close();
        $msg = "Vous êtes bien enregistré";
        header('Location: ../../index.php?msg='.$msg);
        exit; 
    }
?>
