<?php
    /*include('DB.php');
    $notifications_name =  $_POST["notifications_name"];
    $message            =  $_POST["message"];
    $date               =  date('Y-m-d');
    $heure              =  date('H:i:s');

    $insert_query = "INSERT INTO inf(notifications_name,message,active,date,heure)VALUES('".$notifications_name."','".$message."','1',$date,$heure)";
    
    $result = mysqli_query($connection,$insert_query);*/
// Inclure la connexion à la base de données
include('DB.php');

// Récupérer les données POST
$notifications_name = $_POST["notifications_name"];
$message = $_POST["message"];

// Obtenir la date et l'heure actuelles
$date = date('Y-m-d');  // Format date
$heure = date('H:i:s'); // Format time

// Requête préparée pour insérer les données
$insert_query = "INSERT INTO inf (notifications_name, message, active, date, heure) VALUES (?, ?, ?, ?, ?)";

// Créer la requête préparée
$stmt = mysqli_prepare($connection, $insert_query);

// Vérifier si la préparation a réussi
if ($stmt) {
    // Définir les paramètres
    $active = "1"; // Par défaut, active = 1

    // Lier les paramètres de la requête préparée
    mysqli_stmt_bind_param($stmt, 'sssss', $notifications_name, $message, $active, $date, $heure);

    // Exécuter la requête
    $success = mysqli_stmt_execute($stmt);

    // Vérifier si l'insertion a réussi
    if ($success) {
        echo "Les données ont été insérées avec succès.";
    } else {
        echo "Erreur lors de l'insertion des données.";
    }

    // Fermer le statement
    mysqli_stmt_close($stmt);
} else {
    echo "Erreur lors de la préparation de la requête.";
}

// Fermer la connexion
mysqli_close($connection);
?>

