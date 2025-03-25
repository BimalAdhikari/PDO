<?php

echo "<style>

table {
    width: 100%;
    background: linear-gradient(to bottom,rgb(7, 171, 146),rgb(0, 68, 170));
}

table, th, td {
    border: 1px solid;
    padding: 10px;
    text-align: center;
    font-weight: 900;
}

th, td {
    width: auto;
}

a {
    width: 100px;
    height: 50px;
    color: white;
    padding: 6px;
    border-radius: 5px;
    text-decoration: none;  
}

.edit_button {
    background-color: blue;
}

.edit_button:hover {
    background-color: #3273a8;
}

.delete_button {
    background-color: red;
}


.delete_button:hover {
 background-color:rgb(216, 30, 39);
}

h1 {
    text-align: center;
}

</style>";


require 'db.php';

$sql = "SELECT * FROM producten";
$rows = $pdo->query($sql)->fetchAll();

echo "<h1>Producten overzicht</h1>";
echo    "<table>  
            <tr>
                <th>Product code</th>
                <th>Naam</th>
                <th>Prijs per stuk</th>
                <th>Omschrijving</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>";

foreach ($rows as $row) {

    $product_code = $row['product_code'];
    $product_naam = $row['product_naam'];
    $prijs_per_stuk = $row['prijs_per_stuk'];
    $omschrijving = $row['omschrijving'];

    echo  "<tr>
                <td> $product_code </td>
                <td> $product_naam </td>
                <td> $prijs_per_stuk </td>
                <td> $omschrijving </td>
                <td> <a href='update.php?id=$product_code' class='edit_button'>Edit</a> </td>
                <td> <a href='delete.php?id=$product_code' class='delete_button'>Delete</a> </td>
            </tr>";
}

echo "</table>";

?>