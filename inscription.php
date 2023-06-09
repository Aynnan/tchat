<?php
// Connexion à la base de données
$servername = "localhost";
$username = "id20873518_username";
$password = "13371337Aa!";
$dbname = "id20873518_mydb";

$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("La connexion à la base de données a échoué: " . $conn->connect_error);
}

// Récupérer les données du formulaire d'inscription
$email = $_POST['email'];
$password = $_POST['password'];

// Préparer la requête SQL avec des paramètres
$sql = "INSERT INTO account (email, password) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);

// Exécuter la requête préparée
if ($stmt->execute()) {
    // Redirection vers la page login.html
    header("Location: login.html");
    exit(); // Assurez-vous d'arrêter l'exécution du script après la redirection
} else {
    echo "Erreur lors de l'inscription: " . $conn->error;
}

// Fermer la requête et la connexion à la base de données
$stmt->close();
$conn->close();
?>
