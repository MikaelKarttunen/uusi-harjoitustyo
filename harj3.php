<?php
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $pw);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $hakuehto1 = 'arvo1';
    $hakuehto2 = 'arvo2';

    $sql = "SELECT * FROM taulun_nimi WHERE sarake1 = :hakuehto1 OR sarake2 = :hakuehto2";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':hakuehto1', $hakuehto1);
    $stmt->bindParam(':hakuehto2', $hakuehto2);

    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($results);
} catch(PDOException $e) {
    echo "Virhe: " . $e->getMessage();
}

$conn = null;
?>
