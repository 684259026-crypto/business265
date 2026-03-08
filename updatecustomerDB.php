<?php
require_once('connect.php');

if (isset($_POST['CustomerID'])) {
    $sql = "UPDATE customer SET 
            Name = :Name, 
            Email = :Email, 
            OutstandingDebt = :Debt,
            CountryCode = :CCode
            WHERE CustomerID = :ID";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':Name', $_POST['Name']);
    $stmt->bindParam(':Email', $_POST['Email']);
    $stmt->bindParam(':Debt', $_POST['OutstandingDebt']);
    $stmt->bindParam(':CCode', $_POST['CountryCode']);
    $stmt->bindParam(':ID', $_POST['CustomerID']);

    echo '
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">';

    if ($stmt->execute()) {
        echo '
        <script>
        $(document).ready(function(){
            swal({
                title: "สำเร็จ!",
                text: "แก้ไขข้อมูลเรียบร้อยแล้ว",
                type: "success",
                timer: 2000,
                showConfirmButton: false
              }, function(){
                    window.location.href = "index_stu.php";
              });
        });
        </script>';
    }
}
?>