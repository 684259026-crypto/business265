<?php

use LDAP\Result;

require "connect.php";

if (isset($_GET["CustomerID"])) {
    $cid = $_GET["CustomerID"];
    $sql = "SELECT * From customer where CustomerID = :customerID ";
    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':customerID', $cid);

    $stmt->execute();

    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    while ($row = $stmt->fetch()) {
        echo $row['CustomerID'] . ' ' . $row['Name'] . "<br/>";
    }
    $conn = null;
}
