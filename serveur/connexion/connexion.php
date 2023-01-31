<?php
    session_start();
    require_once('../includes/dbcon.inc.php');

    function obtenirPhotoMembre($idm){
        global $conn;
        $stmt = $conn->prepare("SELECT photo FROM membres WHERE idm = ?");
        $stmt->bind_param("i", $idm);
        $stmt->execute();
        $result = $stmt->get_result();
        $ligne = $result->fetch_object();
        return $ligne->photo;
    }

    $courriel = $_POST['courrielcon'];
    $motdepass = $_POST['motdepasscon'];

    $stmt = $conn->prepare("SELECT * FROM connexion WHERE courriel=?");
    $stmt->bind_param("s", $courriel);
    $stmt->execute();
    // $stmt->store_result();
    // $stmt->bind_result($resultM,$resultR);
    // $nrows = $stmt->num_rows;
    // $stmt->fetch();
    // if($nrows == 0){
    //     $msg = "Courriel $courriel ne exist pas";
    //     header('Location: ../../index.php?msg='.$msg);
    //     exit; // Obligatoire
    // }
    $result = $stmt->get_result();
	if(!$ligne = $result->fetch_object()){//Si pas trouvé
        mysqli_close($conn);
        $msg = "Courriel $courriel ne exist pas";
        header('Location: ../../index.php?msg='.$msg);
        exit;
    }
    else if ($ligne->motdepass == $motdepass) {
        $idm = $ligne->idm;
        if($ligne->statut == "A"){
            $_SESSION['courriel'] = $courriel;
            $_SESSION['role'] = $ligne->role;
            if($ligne->role == "M"){
                $photo = obtenirPhotoMembre($idm);
                $_SESSION['photo'] = $photo;
                header("Location: ../membres/membre.php");
                exit;
            }
            else  if($ligne->role == "A"){
                header("Location: ../admin/admin.php");
                exit;
            }
        }
    }
    else{
        $msg = "Mot de pass ne est pas correct";
        header('Location: ../../index.php?msg='.$msg);
        exit; // Obligatoire
    }
    $stmt->free_result();
    $stmt->close();
    $conn->close();            
?>
