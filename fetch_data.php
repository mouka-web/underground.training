<?php
// Informations de connexion à la base de données
$servername = "sql5.freesqldatabase.com";
$username = "sql5720782";
$password = "D9hNbL89Gb";
$dbname = "sql5720782";

try {
    // Créer une connexion PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Préparer la requête SQL pour récupérer les abonnements avec le champ `created_at` trié par date croissante
    $sql = "SELECT id, cin, nom, prenom, telephone, abonnement, prix, created_at FROM abonnements ORDER BY created_at ASC";
    $stmt = $conn->prepare($sql);
    
    // Exécuter la requête
    $stmt->execute();

    // Récupérer le résultat
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if (count($result) > 0) {
        // Sortie des données sous forme de texte
        foreach ($result as $row) {
            echo "{$row['cin']},{$row['nom']},{$row['prenom']},{$row['telephone']},{$row['abonnement']},{$row['prix']},{$row['created_at']},{$row['id']}\n";
        }
    } else {
        echo ""; // Aucune donnée disponible
    }

} catch (PDOException $e) {
    echo "Erreur de connexion ou de requête: " . $e->getMessage();
}

// Fermer la connexion
$conn = null;
?>
