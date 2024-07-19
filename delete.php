<?php
$servername = "sql5.freesqldatabase.com";
$username = "sql5720782";
$password = "D9hNbL89Gb";
$dbname = "sql5720782";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les données JSON envoyées par la requête
    $data = json_decode(file_get_contents('php://input'), true);
    $id = $data['id'];

    if ($id) {
        // Préparer la requête de suppression
        $stmt = $conn->prepare("DELETE FROM abonnements WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécuter la requête
        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => $stmt->errorInfo()]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "ID manquant"]);
    }
} catch (PDOException $e) {
    echo json_encode(["success" => false, "error" => "Erreur de connexion: " . $e->getMessage()]);
}

// Fermer la connexion
$conn = null;
?>
