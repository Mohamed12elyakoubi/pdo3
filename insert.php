<?php
$host = 'localhost:3307';
$db   = 'Winkel';
$user = 'root';
$pass = 'test';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try 
{
     $pdo = new PDO($dsn, $user, $pass, $options);
} 
catch (\PDOException $e) 
{
     throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

if (isset($_POST['submit'])) {

    // $naam = $_POST["product_naam"];
    // $prijs = $_POST["prijs_per_stuk"];
    // $omschrijving = $_POST["omschrijving"];
    
    $sql = "INSERT INTO producten 
    VALUES (null, :product_naam, :prijs_per_stuk, :omschrijving)";

    $stmt = $pdo->prepare($sql);
        $data = [
        'product_naam' => $naam,
        'prijs_per_stuk' => $prijs,
        'omschrijving' => $omschrijving,
    ];
    $stmt->execute($data);
}

?>

<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

</head>

<body>

    <form method="POST">
    <label>Product naam: </label>
        <input type="text" name="product_naam"> <br>
    <label>Prijs per stuk: </label>
        <input type="int" name="prijs_per_stuk"> <br>
    <label>omschrijving</label>
        <input type="text" name="omschrijving"> <br>
        <input type="submit" name="submit">
    </form>
</body>

</html>