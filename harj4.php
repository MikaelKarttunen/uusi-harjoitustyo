<?php

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $conn->beginTransaction();

    $sql1 = "INSERT INTO taulu1 (sarake1, sarake2) VALUES (:arvo1, :arvo2)";
    $stmt1 = $conn->prepare($sql1);
    $stmt1->bindParam(':arvo1', $arvo1);
    $stmt1->bindParam(':arvo2', $arvo2);
    $arvo1 = 'arvo1';
    $arvo2 = 'arvo2';
    $stmt1->execute();

    $sql2 = "UPDATE taulu2 SET sarake1 = :arvo3 WHERE id = :id";
    $stmt2 = $conn->prepare($sql2);
    $stmt2->bindParam(':arvo3', $arvo3);
    $stmt2->bindParam(':id', $id);
    $arvo3 = 'uusi_arvo';
    $id = 1;
    $stmt2->execute();

    $conn->commit();
    echo "Tiedot päivitetty onnistuneesti.";
} catch(PDOException $e) {
    $conn->rollBack();
    echo "Virhe: " . $e->getMessage();
}

$conn = null;
?>
