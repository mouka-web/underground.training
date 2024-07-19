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

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $cin = $_POST['cin'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $telephone = $_POST['telephone'];
        $abonnement = $_POST['abonnement'];
        $prix = $_POST['prix'];
        
        // Date actuelle au format 'Y-m-d H:i:s'
        $created_at = date('Y-m-d H:i:s');

        // Gérer l'upload de l'image
        $photo = null;
        if (!empty($_FILES['photo']['tmp_name'])) {
            $photo = file_get_contents($_FILES['photo']['tmp_name']);
        } else {
            // Si aucune nouvelle photo, ne pas changer la photo
            $sql = "SELECT photo FROM abonnements WHERE id = :id";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $photo = $stmt->fetchColumn();
        }

        // Préparer la requête SQL pour mettre à jour l'abonnement
        $sql = "UPDATE abonnements SET cin = :cin, nom = :nom, prenom = :prenom, telephone = :telephone, abonnement = :abonnement, prix = :prix, photo = :photo, created_at = :created_at WHERE id = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':cin', $cin);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':abonnement', $abonnement);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':photo', $photo, PDO::PARAM_LOB);
        $stmt->bindParam(':created_at', $created_at);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);

        if ($stmt->execute()) {
            echo "Abonnement mis à jour avec succès.";
        } else {
            echo "Erreur lors de la mise à jour : " . implode(", ", $stmt->errorInfo());
        }
    }

} catch (PDOException $e) {
    echo "Erreur de connexion ou de requête : " . $e->getMessage();
}

// Fermer la connexion
$conn = null;
?>
