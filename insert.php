<?php

require 'db.php';

$pdo = new PDO($dsn, $username, $password, $options);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $product_naam = trim($_POST['product_naam']);
    $prijs_per_stuk = trim($_POST['prijs_per_stuk']);
    $omschrijving = trim($_POST['omschrijving']);

    if (empty($product_naam) || empty($prijs_per_stuk) || empty($omschrijving)) {
        echo "Alle velden zijn verplicht!";
    } else {
        try {
            $query = "INSERT INTO producten (product_naam, prijs_per_stuk, omschrijving) VALUES (:product_naam, :prijs_per_stuk, :omschrijving)";
            $stmt = $pdo->prepare($query);
            $winkel = [
                "product_naam" => $product_naam,
                "prijs_per_stuk" => $prijs_per_stuk,
                "omschrijving" => $omschrijving
            ];
            $stmt->execute($winkel);
            echo "Product is toegevoegd!";
        } catch (PDOException $e) {
            echo "Er is iets fout gegaan: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Winkel</title>
</head>
<body>
    <form method="post">
        <input type="text" name="product_naam" placeholder="Product naam" required>
        <input type="number" name="prijs_per_stuk" placeholder="Prijs per stuk" required>
        <input type="text" name="omschrijving" placeholder="Omschrijving" required>
        <button type="submit" name="knop">Voeg toe</button>
    </form>
</body>
</html>