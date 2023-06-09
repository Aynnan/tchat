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

// Démarrer la session PHP
session_start();

// Récupérer les données du formulaire de connexion
$email = $_POST['email'];
$password = $_POST['password'];

// Vérifier les informations de connexion
$sql = "SELECT * FROM account WHERE email = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Les informations de connexion sont valides
    $_SESSION['email'] = $email; // Définir la variable de session
    $conn->close();
    header("Location: index.php"); // Redirection vers index.php
    exit(); // Terminer le script
} else {
    // Les informations de connexion sont invalides
    echo "Identifiants incorrects";
}

// Fermer la connexion à la base de données
$conn->close();
?>
