<?php
$servername = "sql5.freesqldatabase.com";
$username = "sql5720782";
$password = "D9hNbL89Gb";
$dbname = "sql5720782";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les données du formulaire
    $cin = $_POST['cin'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $abonnement = $_POST['abonnement'];
    $prix = $_POST['prix'];
    
    // Vérification de l'option photo
    if (isset($_POST['photoBase64'])) {
        $photoData = $_POST['photoBase64'];
        // Extraire les données binaires de l'image
        list($type, $photoData) = explode(';', $photoData);
        list(, $photoData) = explode(',', $photoData);
        $photoData = base64_decode($photoData);
    } elseif (isset($_FILES['photo']) && $_FILES['photo']['error'] == UPLOAD_ERR_OK) {
        $photoData = file_get_contents($_FILES['photo']['tmp_name']);
    } else {
        echo "Erreur lors du téléchargement de la photo.";
        exit;
    }

    // Vérifier si le CIN existe déjà
    $check_query = "SELECT * FROM abonnements WHERE cin = :cin";
    $check_stmt = $conn->prepare($check_query);
    $check_stmt->bindParam(':cin', $cin);
    $check_stmt->execute();

    if ($check_stmt->rowCount() > 0) {
        echo "Erreur: Un abonnement avec ce numéro de CIN existe déjà.";
    } else {
        // Préparer la requête d'insertion SQL
        $insert_query = "INSERT INTO abonnements (cin, nom, prenom, telephone, abonnement, prix, photo) 
                         VALUES (:cin, :nom, :prenom, :telephone, :abonnement, :prix, :photo)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bindParam(':cin', $cin);
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':prenom', $prenom);
        $stmt->bindParam(':telephone', $telephone);
        $stmt->bindParam(':abonnement', $abonnement);
        $stmt->bindParam(':prix', $prix);
        $stmt->bindParam(':photo', $photoData, PDO::PARAM_LOB); // Insérer les données binaires

        if ($stmt->execute()) {
            echo "Nouvel enregistrement créé avec succès.";
        } else {
            echo "Erreur lors de l'insertion des données : " . implode(", ", $stmt->errorInfo());
        }
    }

} catch(PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$conn = null;
?>
