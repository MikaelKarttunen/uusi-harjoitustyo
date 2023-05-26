<?php
$servername = "tietokantapalvelimen_nimi";
$username = "käyttäjänimi";
$password = "salasana";
$dbname = "tietokannan_nimi";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Virhe tietokantayhteydessä: " . $e->getMessage();
}
?>
