<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["arvo1_rivi1"], $_POST["arvo2_rivi1"], $_POST["arvo1_rivi2"], $_POST["arvo2_rivi2"])) {


        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $conn->beginTransaction();

            $sql = "INSERT INTO taulun_nimi (sarake1, sarake2) VALUES (:arvo1_rivi1, :arvo2_rivi1), (:arvo1_rivi2, :arvo2_rivi2)";
            $stmt = $conn->prepare($sql);

            $stmt->bindParam(':arvo1_rivi1', $_POST["arvo1_rivi1"]);
            $stmt->bindParam(':arvo2_rivi1', $_POST["arvo2_rivi1"]);
            $stmt->bindParam(':arvo1_rivi2', $_POST["arvo1_rivi2"]);
            $stmt->bindParam(':arvo2_rivi2', $_POST["arvo2_rivi2"]);

            $stmt->execute();

            $conn->commit();
            echo "Uudet rivit lisätty onnistuneesti.";
        } catch(PDOException $e) {
            $conn->rollBack();
            echo "Virhe: " . $e->getMessage();
        }

        $conn = null;
    } else {
        echo "Puuttuvia parametreja.";
    }
} else {
    echo "Virheellinen pyyntö.";
}
?>
