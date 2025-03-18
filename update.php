<?php

    // require het db.php in het bovenstaande bestand.
    require 'select.php';
    
    // Parameterwaarden definiëren
try {
    if (isset($_POST["submit_knop"])) {
        $product_naam = $_POST['product_naam'];
        $prijs_per_stuk = $_POST['prijs_per_stuk'];
        $omschrijving = $_POST['omschrijving'];
        $product_code = $_GET['id'];
    
        $sql = "UPDATE producten 
        SET product_naam = :product_naam, prijs_per_stuk = :prijs_per_stuk, omschrijving = :omschrijving 
        WHERE product_code = :product_code";

        $stmt = $pdo->prepare($sql);

        $placeholders = [
            "product_naam" => $product_naam,
            "prijs_per_stuk" => $prijs_per_stuk,
            "omschrijving" => $omschrijving,
            "product_code" => $product_code
        ];

        $stmt->execute($placeholders);

        // Query uitvoeren met execute
        if ($stmt) {
            echo "Record succesvol bijgewerkt.<br><br>";
            header("Refresh:3; url = select.php");
        } else {
            echo "Fout bij bijwerken van record.<br><br>";
        }
    } 
} 
catch (PDOException $e) {
    echo "Er is een fout opgetreden: " + $e->getMessage() + "<br>";
}
    

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <!-- Voeg 3 input fields in je formulier toe (product_naam, prijs_per_stuk, omschrijving) en een button. -->
    <form method="POST">
        <label for="product_naam">Naam:</label><br>
        <input type="text" name="product_naam" placeholder="Product naam" required pattern="[A-Za-z\s]+"> <br><br>

        <label for="prijs_per_stuk">Prijs:</label><br>
        <input type="number" name="prijs_per_stuk" step="0.01" required placeholder="5.99"><br><br>

        <label for="omschrijving">Omschrijving:</label><br>
        <input type="text" name="omschrijving" placeholder="Omschrijving" required pattern="[A-Za-z\s]+"><br><br>

        <input type="submit" name="submit_knop"><br><br>
    </form>
</body>
</html>