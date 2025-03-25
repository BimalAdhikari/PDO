<?php
require 'db.php';

try {
    if (isset($_GET['id']) && !empty($_GET['id'])) {
        // bestaat het product?
        $selectSql = "SELECT * FROM producten WHERE product_code=?";
        $stmt = $pdo->prepare($selectSql);
        $stmt->execute([$_GET['id']]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            // verwijder het product
            $deleteSql = "DELETE FROM producten WHERE product_code=?";
            $deleteStmt = $pdo->prepare($deleteSql);
            $deleteStmt->execute([$_GET['id']]);
            echo "Product successfully deleted.";
        } else {
            // melding als het product niet bestaat
            echo "No product found with the specified ID.";
            header("Refresh: 10; url=select.php");
        }
    } else {
        // melding als de id parameter ontbreekt
        echo "Invalid or missing 'id' parameter.";
    }
} 
catch (PDOException $e) {
    // melding als er een fout optreedt
    echo "Er is een fout opgetreden: " . $e->getMessage() . "<br>";
}

// stuurt je terug naar de select pagina
header("Refresh: 10; url=select.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <script>
        var count = 10;
        var interval = setInterval(function() {
            count--;
            document.getElementById('countdown').innerText = count;
            if (count === 0) {
                clearInterval(interval);
            }
        }, 1000);
    </script>

    <style>
        #countdown {
            font-size: 300px;
            font-weight: bold;
            text-align: center;
            margin-top: 50px;
        }
    </style>
    
    <div id="countdown">10</div>
</body>
</html>