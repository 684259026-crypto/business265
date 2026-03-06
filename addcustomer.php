<?php
if (isset($_POST['CustomerID']) && isset($_POST['Name'])):
    echo "<br>" . $_POST['CustomerID'] . $_POST['OutstandingDebt'];
    $_POST['CountryCode'] . $_POST['OutstandingDebt'];

    require 'connect.php';

    $sql = "insert into customer values(:CustomerID, :Name, :Birthdate, :Email, :CountryCode, :OutstandingDebt)";

    $stmt = $conn->prepare($sql);
    $stmt->bindparam(':CustomerID', $_POST['CustomerID']);
    $stmt->bindparam(':Name', $_POST['Name']);
    $stmt->bindparam(':Birthdate', $_POST['Birthdate']);
    $stmt->bindparam(':Email', $_POST['Email']);
    $stmt->bindparam(':CountryCode', $_POST['CountryCode']);
    $stmt->bindparam(':OutstandingDebt', $_POST['OutstandingDebt']);


    if ($stmt->execute()):
        $message = 'Suscessfully add new Customer';
    else :
        $message = 'fail to add new Customer';
    endif;
    echo $message;
    $conn = null;
endif;
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <form action="addcustomer.php" method="post">
        <label for="lname">รหัสนักศึกษา:</label><br>
        <input type="text" placeholder="CustomerID" name="CustomerID"><br>
        <label for="lname">Name:</label><br>
        <input type="text" placeholder="Name" name="Name"><br><br>
        <label for="lname">วันเกิด:</label><br>
        <input type="date" placeholder="Birthdate" name="Birthdate"><br><br>
        <label for="lname">อีเมล:</label><br>
        <input type="text" placeholder="Email" name="Email"><br><br>
        <label for="lname">ประเทศ:</label><br>
        <input type="text" placeholder="CountryCode" name="CountryCode"><br><br>
        <label for="lname">ยอดหนี้:</label><br>
        <input type="text" placeholder="OutstandingDebt" name="OutstandingDebt"><br><br>
        <input type="submit" value="Submit">
    </form>



</body>

</html>