<?php
if (isset($_POST['CountryCode']) && isset($_POST['CountryName'])):


    require 'connect.php';

    $sql = "insert into country values(:CountryCode, :CountryName)";

    /** @var PDO $conn */
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':CountryCode', $_POST['CountryCode']);
    $stmt->bindParam(':CountryName', $_POST['CountryName']);

    if ($stmt->execute()):
        $message = 'Successfully added new Country';
    else :
        $message = 'Fail to add new Country';
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
    <title> Country</title>
</head>

<body>

    <form action="addcountry.php" method="post">

        <label>รหัสประเทศ :</label><br>
        <input type="text" placeholder="CountryCode" name="CountryCode" required><br><br>

        <label>ชื่อประเทศ:</label><br>
        <input type="text" placeholder="CountryName" name="CountryName" required><br><br>

        <input type="submit" value="Submit">

    </form>

</body>

</html>